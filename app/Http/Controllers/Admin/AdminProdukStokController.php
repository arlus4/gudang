<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukStok;
use Illuminate\Http\Request;

class AdminProdukStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = ProdukStok::all();
        return view('admin/produk/stok/index', [
            'title' => 'Stok Produk',
            'stok' => $stok
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function harga(ProdukStok $stok)
    {
        // dd($stok);
        return view('admin/produk/stok/harga', [
            'title' => "Harga $stok->nama",
            'stok' => $stok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update_harga(Request $request, ProdukStok $stok)
    {
        $this->validate($request, [
            'harga_awal' => 'required'
        ]);
        $stok->update([
            'harga_awal' => $request->harga_awal
        ]);
        return redirect('admin/produk/stok')->with('success', 'Harga Berhasil Di Tambahkan');
    }
}
