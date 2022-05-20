<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agen;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Pelanggan::where('status', '1')->get();
        $pelanggans = Pelanggan::where('status', '0')->get();
        return view('admin/pelanggan/index', [
            'title' => 'Data Pelanggan',
            'toko' => $toko,
            'pelanggan' => $pelanggans
        ]);
    }

    public function tambahlimit(Pelanggan $pelanggan)
    {
        return view('admin/pelanggan/limit', [
            'title' => 'Tambah Limit Pelanggan',
            'pelanggan' => $pelanggan
        ]);
    }

    public function limit(Request $request, Pelanggan $pelanggan)
    {
        $this->validate($request, [
            'limit' => 'required',
            'status' => 'required'
        ]);
        $pelanggan->update([
            'limit' => $request->limit,
            'status' => $request->status
        ]);
        return redirect('admin/pelanggan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pelanggan/create', [
            'title' => 'Tambah Pelanggan',
            'agen' => Agen::all(),
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
            'slug'      => 'required | unique:pelanggans',
            'nama'      => 'required',
            'kontak'    => 'required',
            'kategori'  => 'required',
            'agen_id'   => 'required',
            'limit'     => 'required',
            'photo_toko'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'alamat'    => 'required',
            'status'    => 'required',
        ]);

        $data['photo_toko'] = $request->file('photo_toko')->store('profile-toko');
        $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-toko');
        Pelanggan::create($data);
        return redirect('/admin/pelanggan')->with('success', 'Pelanggan telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('admin/pelanggan/show', [
            'title' => 'Profile Pelanggan',
            'pelanggan' => $pelanggan
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
        return view('admin/pelanggan/edit', [
            'title' => "Ubah Data $pelanggan->nama",
            'pelanggan' => $pelanggan,
            'agens' => Agen::all(),
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
        $rules = [
            'nama'      => 'required',
            'alamat'    => 'required',
        ];

        if ($request->kode != $pelanggan->kode) {
            $rules['kode'] = 'required|unique:pelanggans';
        }

        if ($request->slug != $pelanggan->slug) {
            $rules['slug'] = 'required|unique:pelanggans';
        }

        $data = $request->validate($rules);

        if ($request->file('photo_profil')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['photo_profil'] = $request->file('photo_profil')->store('profile-sales');
        }

        if ($request->file('photo_ktp')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-sales');
        }

        $data['user_id'] = Auth::user()->id;

        Agen::where('id', $pelanggan->id)->update($data);

        return redirect('/admin/pegawai/agen')->with('success', 'Data Sales Berhasil dirubah');
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
        return redirect('/admin/pelanggan')->with('success', 'Data Berhasil Di Hapus');
    }

    // Fungsi Otomatisasi Slug
    public function pelangganSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pelanggan::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
