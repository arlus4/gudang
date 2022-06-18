<?php

namespace App\Http\Controllers\Agen;

use App\Models\Cash;
use App\Models\Tempo;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AgenPenjualanController extends Controller
{
    public function index()
    {
        $cash = Cash::where('approve', 1)->where('agen_id', Auth::guard('agen')->user()->id)->get();
        $tempo = Tempo::where('lunas', 1)->where('agen_id', Auth::guard('agen')->user()->id)->get();
        $transaksi = $cash->concat($tempo);
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
