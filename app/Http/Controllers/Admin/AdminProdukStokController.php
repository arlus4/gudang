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
     * @param  \App\Models\ProdukStok  $produkStok
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukStok $produkStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukStok  $produkStok
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukStok $produkStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukStok  $produkStok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukStok $produkStok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukStok  $produkStok
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukStok $produkStok)
    {
        //
    }
}
