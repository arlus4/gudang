<?php

namespace App\Http\Controllers\Kasir;

use App\Models\ProdukStok;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class KasirProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = ProdukStok::all();
        return view('kasir/produk/stok/index', [
            'title' => 'Stok Produk',
            'stok' => $stok,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir/produk/stok/create', [
            'title' => 'Tambah Stok Produk',
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
            'kode'      => 'required | unique:produk_stoks',
            'slug'      => 'required | unique:produk_stoks',
            'nama'      => 'required',
            'jumlah_produk' => 'required',
            'deskripsi'    => 'required',
            'photo_produk'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);

        $data['photo_produk'] = $request->file('photo_produk')->store('photo-produk');
        $data['kasir_id'] = Auth::guard('kasir')->user()->id;
        ProdukStok::create($data);
        return redirect('/kasir/produk/stok')->with('success', 'Produk telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukStok $stok)
    {
        return view('kasir/produk/stok/show', [
            'title' => 'Detail Stok Produk',
            'stok' => $stok,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukStok $stok)
    {
        return view('kasir/produk/stok/edit', [
            'title' => 'Edit Stok Produk',
            'stok' => $stok,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukStok $stok)
    {
        // $rules = [
        //     'nama'      => 'required',
        //     'alamat'    => 'required',
        // ];

        // if ($request->kode != $stok->kode) {
        //     $rules['kode'] = 'required|unique:agens';
        // }

        // if ($request->slug != $stok->slug) {
        //     $rules['slug'] = 'required|unique:agens';
        // }

        // $data = $request->validate($rules);

        // if ($request->file('photo_profil')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $data['photo_profil'] = $request->file('photo_profil')->store('profile-sales');
        // }

        // if ($request->file('photo_ktp')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-sales');
        // }

        // $data['user_id'] = Auth::user()->id;

        // ProdukStok::where('id', $stok->id)->update($data);

        // return redirect('/admin/pegawai/agen')->with('success', 'Data Sales Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukStok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukStok $stok)
    {
        if ($stok->photo_produk) {
            Storage::delete($stok->photo_produk);
        }
        ProdukStok::destroy($stok->id);
        return redirect('/kasir/produk/stok');
    }

    // Fungsi Otomatisasi Slug
    public function stokSlug(Request $request)
    {
        $slug = SlugService::createSlug(ProdukStok::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
