<?php

namespace App\Http\Controllers\Agen;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenPembayaranController extends Controller
{
    public function index()
    {
        $transaksi = Penjualan::where('agen_id', Auth::guard('agen')->user()->id)->get();
        // ->where('kategori_pembayaran', 'tempo')
        // ->where('approve', 1)->get();
        // dd($transaksi);
        $pembayaran = Penjualan::where('agen_id', Auth::guard('agen')->user()->id)->get();
        // ->where('kategori_pembayaran', 'cash')
        // ->where('approve', 1)->get();
        return view('agen/pembayaran/index', [
            'title' => 'Pembayaran',
            'transaksis' => $transaksi,
            'pembayarans' => $pembayaran
        ]);
    }

    public function bayar(Penjualan $pembayaran)
    {
        $pembayaran = Penjualan::where('agen_id', Auth::guard('agen')->user()->id)->where('kategori_pembayaran', 'tempo')->first();
        // dd($pembayaran);
        return view('agen/pembayaran/tagihan', [
            'title' => 'Pembayaran',
            'pembayaran' => $pembayaran
        ]);
    }
}
