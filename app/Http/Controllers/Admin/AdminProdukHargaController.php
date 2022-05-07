<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProdukStok;
use App\Models\ProdukHarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminProdukHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = ProdukHarga::with('produk_stok')->get();
        // $stok = ProdukHarga::all();
        // $stok = DB::table('produk_stoks')
        //     ->join('produk_hargas', 'produk_stoks.id', '=', 'produk_hargas.stok_id')
        //     ->select('produk_hargas.*', 'produk_stoks.kode', 'produk_stoks.nama');
        // dd($stok);
        return view('admin/produk/harga/index', [
            'title' => 'Harga Produk',
            'stoks' => $stok
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/produk/harga/create', [
            'title' => 'Update Harga Produk',
            'stok' => ProdukStok::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'stok_id' => 'required',
            'slug' => 'required | unique:produk_hargas',
            'harga_terkini' => 'required',
            'harga_dasar' => 'required',
            'harga_supplier' => 'required',
            'margin_harga_supplier' => 'required',
            'harga_retail' => 'required',
            'margin_harga_retail' => 'required',
        ]);
        $data['user_id'] = Auth::user()->id;
        ProdukHarga::create($data);
        return redirect('/admin/produk/harga')->with('success', 'Harga telah diupdate!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukHarga  $harga
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukHarga $harga)
    {
        // $harga = ProdukHarga::with('produk_stok')->get();
        // $harga = ProdukHarga::all();
        // $harga = DB::table('produk_stoks')
        //     ->join('produk_hargas', 'produk_stoks.id', '=', 'produk_hargas.stok_id')
        //     ->select('produk_hargas.*', 'produk_stoks.kode', 'produk_stoks.nama');
        // dd($harga);
        // return view('admin/produk/harga/show', [
        // 'title' => "Tentang $harga",
        // 'harga' => $harga,
        // 'pelanggan' => $harga->pelanggan
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukHarga  $harga
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukHarga $harga)
    {
        // dd($harga);
        return view('admin/produk/harga/edit', [
            'title' => "Edit Produk",
            'harga' => $harga,
            'stok' => $harga->produk_stok
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukHarga  $harga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukHarga $harga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukHarga  $harga
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukHarga $harga)
    {
        //
    }
}
