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
        $transaksi = Penjualan::where('agen_id', Auth::guard('agen')->user()->id)->where('kategori_pembayaran', 'tempo')->get();
        // dd($transaksi);
        $pembayaran = Penjualan::where('agen_id', Auth::guard('agen')->user()->id)->where('kategori_pembayaran', 'cash')->get();
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
