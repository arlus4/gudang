<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Http\Controllers\Controller;

class KasirPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Penjualan::where([['kasir_id', NULL], ['approve', 1], ['accept', 0]])->get();
        // dd($pesanan);
        return view('kasir/produk/pesanan/index', [
            'title' => "Pesanan Masuk",
            'pesanans' => $pesanan
        ]);
    }

    public function accept(Penjualan $pesanan)
    {
        $pesanan->update([
            'accept' => 1,
        ]);
        return redirect()->back()->with('success', 'Pesanan berhasil diterima');
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
     * @param  \App\Models\Penjualan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $pesanan)
    {
        // dd($pesanan);
        $detail = PenjualanDetail::where('penjualan_id', $pesanan->id)->get();
        // dd($detail);
        return view('kasir/produk/pesanan/show', [
            'title' => "Invoice",
            'details' => $detail,
            'transaksi' => $pesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $pesanan)
    {
        //
    }
}
