<?php

namespace App\Http\Controllers\Kasir;

use App\Models\ProdukStok;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KasirKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir/produk/keluar/index', [
            'title' => 'Barang Keluar'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stoks = ProdukStok::all();
        return view('kasir/produk/keluar/create', [
            'title' => 'Tambah Barang Keluar',
            'stoks' => $stoks
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
            'nama' => 'required',
            'jumlah' => 'required',
            'tanggal_keluar' => 'required',
            'deskripsi' => 'required',
        ]);
        $data['kasir_id'] = Auth::guard('kasir')->user()->id;
        BarangKeluar::create($data);
        $stoks = ProdukStok::where('id', '=', $data['stok_id'])->decrement();

        return redirect('/kasir/produk/keluar')->with('success', 'Produk telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }

    // Fungsi Otomatisasi Slug
    public function keluarSlug(Request $request)
    {
        $slug = SlugService::createSlug(ProdukStok::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
