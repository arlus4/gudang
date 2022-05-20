<?php

namespace App\Http\Controllers\Admin;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Penjualan::where('approve', '0')->get();
        $penjualan = Penjualan::where('approve', '1')->get();
        return view('admin/transaksi/pesanan/index', [
            'title' => "Daftar Pesanan",
            'pesanans' => $pesanan,
            'penjualans' => $penjualan
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
     * @param  \App\Models\Penjualan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $pesanan)
    {
        $detail = PenjualanDetail::where('penjualan_id', $pesanan->id)->get();
        // dd($detail);
        return view('admin/transaksi/pesanan/show', [
            'title' => 'Invoice',
            'details' => $detail,
            'transaksi' => $pesanan
        ]);
    }

    public function approve(Penjualan $pesanan)
    {
        $pesanan->update([
            'approve' => true,
        ]);
        return redirect()->back();
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
        Penjualan::destroy($pesanan->id);
        return redirect()->back();
    }
}
