<?php

namespace App\Http\Controllers\Agen;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\ProdukHarga;
use Darryldecode\Cart\Cart;
use App\Models\ProdukReturn;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenProdukReturn extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function kembali(Penjualan $transaksi)
    {
        // dd($transaksi);
        $stoks = PenjualanDetail::where('penjualan_id', $transaksi->id)->get();
        // dd($stoks);
        return view('agen/return/edit', [
            'title' => "Return Produk $transaksi->invoice",
            'transaksi' => $transaksi,
            'stoks' => $stoks
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Penjualan::where([['approve', 1], ['accept', 1], ['agen_id', Auth::guard('agen')->user()->id]])->get();
        return view('agen/return/index', [
            'title' => 'Produk Return',
            'returns' => $produks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
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
     * @param  \App\Models\ProdukReturn  $return
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukReturn $return)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukReturn  $return
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukReturn $return)
    {
        return view('agen/return/edit', [
            'produk' => $return
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukReturn  $return
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukReturn $return)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukReturn  $return
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukReturn $return)
    {
        //
    }
}
