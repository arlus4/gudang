<?php

namespace App\Http\Controllers\Agen;

use App\Models\History;
use App\Models\Pelanggan;
use App\Models\Penjualan;
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

class AgenTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Penjualan::all();
        // dd($transaksi);
        return view('agen/transaksi/index', [
            'title' => "Daftar Pesanan",
            'transaksis' => $transaksi
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

        \Cart::session(Auth::guard('agen')->user())->condition($condition);
        $produks = \Cart::session(Auth::guard('agen')->user())->getcontent();
        // dd($produks);

        if (\Cart::isEmpty()) {
            $cart_data = [];
        } else {
            foreach ($produks as $produk) {
                $cart[] = [
                    'produkId' => $produk->id,
                    'name' => $produk->name,
                    'jumlah_produk' => $produk->quantity,
                    'harga_supplier' => $produk->price,
                    'subtotal' => $produk->getPriceSum(), // fungsi dari Cart
                    'created_at' => $produk->attributes['created_at'],
                ];
            }
            $cart_data = collect($cart)->sortBy('created_at');
            // dd($cart_data);
        }

        //total
        $sub_total = \Cart::session(Auth::guard('agen')->user())->getSubTotal();
        $total = \Cart::session(Auth::guard('agen')->user())->getTotal();

        $new_condition = \Cart::session(Auth::guard('agen')->user())->getCondition('pajak');
        $pajak = $new_condition->getCalculatedValue($sub_total);

        $data_total = [
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $pajak
        ];

        $stoks = ProdukHarga::all();
        $pelanggans = Pelanggan::where('agen_id', Auth::guard('agen')->user()->id)->where('status', '1')->get();
        return view('agen/transaksi/create', [
            'title' => "Buat Pesanan",
            'stoks' => $stoks,
            'pelanggans' => $pelanggans,
            'cart_datas' => $cart_data,
            'data_totals' => $data_total,
        ]);
    }

    public function addProduct($id)
    {
        $produks = ProdukHarga::find($id);
        $stoks = ProdukStok::find($id);
        // dd($stoks);
        // $pelanggans = Pelanggan::all();
        // dd($pelanggans);

        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);
        // dd($cek_item);

        if ($cek_item->isNotEmpty()) {
            if ($stoks->jumlah_produk == $cek_item[$id]->quantity) {
                return redirect()->back()->with('error', 'jumlah produk kurang');
            } else {
                \Cart::session(Auth::guard('agen')->user())->update($id, array(
                    'quantity' => 1
                ));
            }
        } else {
            \Cart::session(Auth::guard('agen')->user())->add(array(
                'id' => $id,
                'name'  => $stoks->nama,
                'price' => $produks->harga_supplier,
                'quantity' => 1,
                'attributes' => array(
                    // 'pelanggan_id' => $pelanggans->id,
                    'kode_produk' => $stoks->kode,
                    'created_at' => date('Y-m-d H:i:s'),
                )
            ));
        }
        return redirect()->back();
    }

    public function removeProduct($id)
    {
        \Cart::session(Auth::guard('agen')->user())->remove($id);
        return redirect()->back();
    }

    public function tambah($id)
    {
        $stoks = ProdukStok::find($id);

        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);
        if ($stoks->jumlah_produk == $cek_item[$id]->quantity) {
            return redirect()->back()->with('error', 'Jumlah Produk kurang!');
        } else {
            \Cart::session(Auth::guard('agen')->user())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => 1,
                )
            ));
            return redirect()->back();
        }
    }

    public function kurangi($id)
    {
        $produks = ProdukHarga::find($id);

        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);

        if ($cek_item[$id]->quantity == 1) {
            \Cart::session(Auth::guard('agen')->user())->remove($id);
        } else {
            \Cart::session(Auth::guard('agen')->user())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => -1
                )
            ));
        }
        return redirect()->back();
    }

    public function bayar()
    {
        $pelanggan_id = request()->pelanggan_id;
        // dd($pelanggans);
        $kategori_pembayaran = request()->kategori;
        // dd($kategori_pembayaran);
        $cart_total = \Cart::session(Auth::guard('agen')->user())->getTotal();
        // dd($cart_total);
        $bayar = request()->bayar;
        // dd($bayar);
        // $kembalian = (int)$bayar - (int)$cart_total;

        // if ($kategori_pembayaran == request()->kategori['tempo']) {
        //     dd($kategori_pembayaran);
        // }


        // if ($kembalian >= 0) {
        DB::beginTransaction();

        try {
            $all_cart = \Cart::session(Auth::guard('agen')->user())->getContent();
            // dd($all_cart);
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
                // dd($cart);
                $stoks = ProdukStok::find($cart['id']);
                if ($stoks->jumlah_produk == 0) {
                    return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
                }
                History::create([
                    'produk_id' => $cart['id'],
                    'agen_id' => Auth::guard('agen')->user()->id,
                    'jumlah_produk' => $stoks->jumlah_produk,
                    'ubah_produk' => -$cart['quantity'], // "-" simbol identifikasi untuk mengurangi stok
                    'tipe' => 'decrease from transaction'
                ]);
                $stoks->decrement('jumlah_produk', $cart['quantity']);
                // $cek = History::all();
                // dd($cek);
            }

            $id = IdGenerator::generate(['table' => 'penjualans', 'length' => 10, 'prefix' => 'INV-', 'field' => 'invoice']);
            $slug = IdGenerator::generate(['table' => 'penjualans', 'length' => 10, 'prefix' => 'inv-', 'field' => 'invoice']);
            // $pelanggans = Pelanggan::find($id);
            // dd($pelanggans);
            Penjualan::create([
                'agen_id' => Auth::guard('agen')->user()->id,
                'invoice' => $id,
                'slug' => $slug,
                'tanggal_pesan' => date("Y-m-d H:i:s", strtotime('now')),
                'pelanggan_id' => $pelanggan_id,
                'total_harga' => $cart_total,
                'kategori_pembayaran' => $kategori_pembayaran,
                'pembayaran' => $bayar,
            ]);
            // $cek = Penjualan::all();
            // dd($cek);

            $penjualan = Penjualan::latest()->first();
            foreach ($filterCart as $cart) {
                // dd($penjualan);
                PenjualanDetail::create([
                    'penjualan_id' => $penjualan->id,
                    'invoice' => $id,
                    'slug' => $slug,
                    'kode_produk' => $cart['kode_produk'],
                    'nama_produk' => $cart['name'],
                    'jumlah_produk' => $cart['quantity'],
                    'harga_produk' => $cart['price'],
                ]);
            }
            // $cek = PenjualanDetail::all();
            // dd($cek);

            \Cart::session(Auth::guard('agen')->user())->clear();
            DB::commit();
            return redirect()->back()->with('success', 'Transaksi Berhasi Tunggu Konfirmasi dari Admin');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
        }
        // }
        return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran gak valid');
    }

    public function clear()
    {
        \Cart::session(Auth::guard('agen')->user())->clear();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $transaksi)
    {
        // dd($transaksi);
        $detail = PenjualanDetail::where('penjualan_id', $transaksi->id)->get();
        return view('agen/transaksi/show', [
            'title' => 'Invoice',
            'details' => $detail,
            'transaksi' => $transaksi
        ]);
    }
}
