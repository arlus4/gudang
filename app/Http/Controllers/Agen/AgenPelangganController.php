<?php

namespace App\Http\Controllers\Agen;

use App\Models\Pelanggan;
use App\Models\ProdukHarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AgenPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $toko = Pelanggan::with(['agens', 'users'])->get();
        // dd($toko);
        $pelanggans = Pelanggan::where('agen_id', Auth::guard('agen')->user()->id)->where('status', '1')->get();
        $tokos = Pelanggan::where('agen_id', Auth::guard('agen')->user()->id)->where('status', '0')->get();
        return view('agen/pelanggan/index', [
            'title' => 'Daftar Pelanggan',
            'pelanggans' => $pelanggans,
            'tokos' => $tokos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agen/pelanggan/create', [
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
            'photo_toko'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);

        $data['photo_toko'] = $request->file('photo_toko')->store('profile-toko');
        $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-toko');
        $data['user_id'] = Auth::user()->id;
        $data['agen_id'] = Auth::guard('agen')->user()->id;
        Pelanggan::create($data);
        return redirect('/agen/pelanggan')->with('success', 'Pelanggan telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('agen/pelanggan/show', [
            'title' => 'Detail Pelanggan',
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('agen/pelanggan/edit', [
            'title' => "Ubah Pelanggan",
            'pelanggan' => $pelanggan,
        ]);
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
        if ($pelanggan->photo_toko) {
            Storage::delete($pelanggan->photo_toko);
        }
        if ($pelanggan->photo_ktp) {
            Storage::delete($pelanggan->photo_ktp);
        }
        Pelanggan::destroy($pelanggan->id);
        return redirect('/agen/pelanggan');
    }

    // Fungsi Otomatisasi Slug
    public function tokoSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pelanggan::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
