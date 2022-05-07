<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agen;
use App\Models\Kasir;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProdukStok;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Agen::count();
        $kasir = Kasir::count();
        $pelanggan = Pelanggan::count();
        $produk = ProdukStok::count();
        // $hutang_toko
        // $hutang_pabrik
        return view('admin/index', compact('pelanggan', 'kasir', 'sales', 'produk'));
    }
}
