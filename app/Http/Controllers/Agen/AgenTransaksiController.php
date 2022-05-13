<?php

namespace App\Http\Controllers\Agen;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\ProdukHarga;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;

class AgenTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agen/transaksi/index', [
            'title' => "Daftar Pesanan"
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
        // dd($cart_data);

        $stoks = ProdukHarga::all();
        $pelanggans = Pelanggan::where('status', '1')->get();
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
        // dd($produks);

        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);

        // dd($cek_item);

        if ($cek_item->isNotEmpty()) {
            if ($produks->jumlah_produk == $cek_item[$id]->quantity) {
                return redirect()->back()->with('error', 'jumlah produk kurang');
            } else {
                \Cart::session(Auth::guard('agen')->user())->update($id, array(
                    'quantity' => 1
                ));
            }
        } else {
            \Cart::session(Auth::guard('agen')->user())->add(array(
                'id' => $id,
                'name'  => $produks->produk_stok->nama,
                'price' => $produks->harga_supplier,
                'quantity' => 1,
                'attributes' => array(
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
        $produks = ProdukHarga::find($id);

        $cart = \Cart::session(Auth::guard('agen')->user())->getcontent();
        $cek_item = $cart->whereIn('id', $id);
        if ($produks->jumlah_produk == $cek_item[$id]->quantity) {
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
        // 
    }

    public function clear()
    {
        \Cart::session(Auth::guard('agen')->user())->clear();
        return redirect()->back();
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
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
