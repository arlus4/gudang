<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProdukReturn;
use Illuminate\Http\Request;

class AdminProdukReturn extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pabrik()
    {
        return view('admin/produk/return/pabrik', [
            'title' => 'Return Produk Pabrik',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pelanggan()
    {
        return view('admin/produk/return/pelanggan', [
            'title' => 'Return Produk Pelanggan',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ProdukReturn  $produkReturn
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukReturn $produkReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukReturn  $produkReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukReturn $produkReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukReturn  $produkReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukReturn $produkReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukReturn  $produkReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukReturn $produkReturn)
    {
        //
    }
}
