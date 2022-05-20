<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KasirPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::where('kasir_id', Auth::guard('kasir')->user()->id)->where('status', '0')->get();
        // dd($pelanggan);
        return view('kasir/pelanggan/index', [
            'title' => 'Daftar Pelanggan',
            'pelanggans' => $pelanggan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir/pelanggan/create', [
            'title' => 'Tambah Pelanggan'
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
            'kode'      => 'required | unique:pelanggans',
            'nama'      => 'required',
            'slug'      => 'required | unique:pelanggans',
            'alamat'    => 'required',
            'kontak'    => 'required',
            'kategori'  => 'required',
            // 'photo_toko'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);

        // $data['photo_toko'] = $request->file('photo_toko')->store('profile-toko');
        $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-toko');
        $data['user_id'] = Auth::user()->id;
        $data['kasir_id'] = Auth::guard('kasir')->user()->id;
        Pelanggan::create($data);
        return redirect('/kasir/pelanggan')->with('success', 'Pelanggan telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }

    // Fungsi Otomatisasi Slug
    public function pelangganSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pelanggan::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
