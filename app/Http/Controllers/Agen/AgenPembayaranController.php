<?php

namespace App\Http\Controllers\Agen;

use App\Models\Tempo;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempos = Tempo::where('lunas', 0)->where('agen_id', Auth::guard('agen')->user()->id)->get();
        return view('agen/pembayaran/index', [
            'title' => 'Daftar Tagihan',
            'tempos' => $tempos
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
     * @param  \App\Models\Tempo  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Tempo $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tempo  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Tempo $pembayaran)
    {
        return view('agen/pembayaran/tagihan', [
            'title' => "Pembayaran $pembayaran->invoice",
            'pembayaran' => $pembayaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tempo  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempo $pembayaran)
    {
        // dd($request->all());
        $this->validate($request, [
            'jumlah_bayar' => 'required',
            'sisa_bayar' => 'required',
        ]);
        $pembayaran->update([
            'tanggal_bayar' => date("Y-m-d H:i:s", strtotime('now')),
            'jumlah_bayar' => $request->jumlah_bayar,
            'sisa_bayar' => $request->sisa_bayar,
            'approve' => 0
        ]);
        return redirect('/agen/pembayaran')->with('success', 'Pembayaran Berhasil Dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tempo  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tempo $pembayaran)
    {
        //
    }
}
