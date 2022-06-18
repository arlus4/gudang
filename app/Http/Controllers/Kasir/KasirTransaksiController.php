<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Cash;
use App\Models\History;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Pembayaran;
use App\Models\ProdukStok;
use App\Models\ProdukHarga;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KasirTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Penjualan::where('approve', false)->get();
        return view('kasir/transaksi/pesanan/index', [
            'title' => 'Data Transaksi',
            'transaksis' => $transaksi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pajak
        if (request()->tax) {
            $tax = "+10%";
        } else {
            $tax = "0%";
        }

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'pajak',
            'type' => 'tax', //tipenya apa
            'target' => 'total', //target kondisi ini apply ke mana (total, subtotal)
            'value' => $tax, //contoh -12% or -10 or +10 etc
            'order' => 1
        ));

        \Cart::session(Auth::guard('kasir')->user())->condition($condition);
        $produks = \Cart::session(Auth::guard('kasir')->user())->getcontent();

        if (\Cart::isEmpty()) {
            $cart_data = [];
        } else {
            foreach ($produks as $produk) {
                $cart[] = [
                    'produkId' => $produk->id,
                    'name' => $produk->name,
                    'jumlah_produk' => $produk->quantity,
                    'harga_retail' => $produk->price,
                    'subtotal' => $produk->getPriceSum(), // fungsi dari Cart
                    'created_at' => $produk->attributes['created_at'],
                ];
            }
            $cart_data = collect($cart)->sortBy('created_at');
        }

        //total
        $sub_total = \Cart::session(Auth::guard('kasir')->user())->getSubTotal();
        $total = \Cart::session(Auth::guard('kasir')->user())->getTotal();

        $new_condition = \Cart::session(Auth::guard('kasir')->user())->getCondition('pajak');
        $pajak = $new_condition->getCalculatedValue($sub_total);

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $pajak
        ];

        $stoks = ProdukHarga::all();
        $pelanggans = Pelanggan::where('kasir_id', Auth::guard('kasir')->user()->id)->where('status', '1')->get();
        return view('kasir/transaksi/pesanan/create', [
            'title' => 'Menu Transaksi',
            'stoks' => $stoks,
            'pelanggans' => $pelanggans,
            'cart_datas' => $cart_data,
            'data_totals' => $data_total,
        ]);
    }

    public function clear()
    {
        \Cart::session(Auth::guard('kasir')->user())->clear();
        return redirect()->back();
    }

    public function addProduct($id)
    {
        $produks = ProdukHarga::find($id);
        $stoks = ProdukStok::find($id);

        $cart = \Cart::session(Auth::guard('kasir')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);

        if ($cek_item->isNotEmpty()) {
            if ($stoks->jumlah_produk == $cek_item[$id]->quantity) {
                return redirect()->back()->with('error', 'jumlah produk kurang');
            } else {
                \Cart::session(Auth::guard('kasir')->user())->update($id, array(
                    'quantity' => 1
                ));
            }
        } else {
            \Cart::session(Auth::guard('kasir')->user())->add(array(
                'id' => $id,
                'name'  => $stoks->nama,
                'price' => $produks->harga_retail,
                'quantity' => 1,
                'attributes' => array(
                    'kode_produk' => $stoks->kode,
                    'created_at' => date('Y-m-d H:i:s'),
                )
            ));
        }
        return redirect()->back();
    }

    public function removeProduct($id)
    {
        \Cart::session(Auth::guard('kasir')->user())->remove($id);
        return redirect()->back();
    }

    public function tambah($id)
    {
        $jumlah_produk = request()->jumlah_produk;
        $stoks = ProdukStok::find($id);
        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);
        if ($stoks->jumlah_produk == $cek_item[$id]->quantity) {
            return redirect()->back()->with('error', 'Jumlah Produk kurang!');
        } else {
            \Cart::session(Auth::guard('agen')->user())->update($id, array(
                'quantity' => $jumlah_produk
            ));
            return redirect()->back();
        }
    }

    public function bayar()
    {
        $pelanggan_id = request()->pelanggan_id;
        $cart_total = \Cart::session(Auth::guard('kasir')->user())->getTotal();
        $bayar = request()->bayar;
        $kembalian = (int)$bayar - (int)$cart_total;
        // dd($kembalian);

        if ($kembalian >= 0) {
            DB::beginTransaction();
            try {
                $all_cart = \Cart::session(Auth::guard('kasir')->user())->getContent();
                $filterCart = $all_cart->map(function ($produk) {
                    return [
                        'id' => $produk->id,
                        'name' => $produk->name,
                        'price' => $produk->price,
                        'quantity' => $produk->quantity,
                        'kode_produk' => $produk->attributes->kode_produk
                    ];
                });
                // dd($filterCart);

                foreach ($filterCart as $cart) {
                    $stoks = ProdukStok::find($cart['id']);
                    if ($stoks->jumlah_produk == 0) {
                        return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
                    }
                    // dd($stoks);
                    History::create([
                        'produk_id' => $cart['id'],
                        'kasir_id' => Auth::guard('kasir')->user()->id,
                        'jumlah_produk' => $stoks->jumlah_produk,
                        'ubah_produk' => -$cart['quantity'], // "-" simbol identifikasi untuk mengurangi stok
                        'tipe' => 'decrease from transaction'
                    ]);
                    // $cek = History::latest()->first();
                    // dd($cek);
                    $stoks->decrement('jumlah_produk', $cart['quantity']);
                }

                $id = IdGenerator::generate(['table' => 'penjualans', 'length' => 10, 'prefix' => 'INV-', 'field' => 'invoice']);
                $slug = IdGenerator::generate(['table' => 'penjualans', 'length' => 10, 'prefix' => 'inv-', 'field' => 'invoice']);

                Penjualan::create([
                    'kasir_id' => Auth::guard('kasir')->user()->id,
                    'pelanggan_id' => $pelanggan_id,
                    'invoice' => $id,
                    'slug' => $slug,
                    'tanggal_penjualan' => date("Y-m-d H:i:s", strtotime('now')),
                    'total_harga' => $cart_total,
                    'kategori_pembayaran' => 'cash'
                ]);
                // $cek = Penjualan::latest()->first();
                // dd($cek);

                $penjualan = Penjualan::latest()->first();
                foreach ($filterCart as $cart) {
                    PenjualanDetail::create([
                        'penjualan_id' => $penjualan->id,
                        'stok_id' => $cart['id'],
                        'harga_id' => $cart['id'],
                        'invoice' => $id,
                        'slug' => $slug,
                        'kode_produk' => $cart['kode_produk'],
                        'nama_produk' => $cart['name'],
                        'jumlah_produk' => $cart['quantity'],
                        'harga_produk' => $cart['price'],
                    ]);
                }
                // $cek = PenjualanDetail::latest()->first();
                // dd($cek);

                Pembayaran::create([
                    'penjualan_id' => $penjualan->id,
                    'kasir_id' => Auth::guard('kasir')->user()->id,
                    'invoice' => $id,
                    'slug' => $slug,
                    'total_harga' => $cart_total,
                    'kategori_pembayaran' => 'cash',
                ]);
                $pembayaran = Pembayaran::latest()->first();
                // dd($pembayaran);

                Cash::create([
                    'pembayaran_id' => $pembayaran->id,
                    'kasir_id' => Auth::guard('kasir')->user()->id,
                    'invoice' => $id,
                    'slug' => $slug,
                    'tanggal_bayar' => date("Y-m-d H:i:s", strtotime('now')),
                    'total_harga' => $cart_total,
                    'jumlah_bayar' => $bayar,
                ]);
                // $cek = Cash::latest()->first();
                // dd($cek);

                \Cart::session(Auth::guard('kasir')->user())->clear();
                DB::commit();
                return redirect()->back()->with('success', 'Transaksi Berhasil dilakukan Tahu Coding | Klik History untuk print');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
            }
        }
        return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $transaksi)
    {
        $detail = PenjualanDetail::where('penjualan_id', $transaksi->id)->get();
        // dd($detail);
        return view('kasir/transaksi/show', [
            'title' => "Invoice",
            'details' => $detail,
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $transaksi)
    {
        //
    }
}
