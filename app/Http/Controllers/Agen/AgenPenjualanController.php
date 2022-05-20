<?php

namespace App\Http\Controllers\Agen;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgenPenjualanController extends Controller
{
    public function index()
    {
        $transaksi = Penjualan::where('approve', '1')->get();
        return view('agen/penjualan/index', [
            'title' => "Daftar Penjualan",
            'transaksis' => $transaksi
        ]);
    }

    public function invoice()
    {
        // 
    }
}
