<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kasir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = Kasir::all();
        return view('admin/pegawai/kasir/index', [
            'title' => 'Data Kasir',
            'kasir' => $kasir,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pegawai/kasir/create', [
            'title' => 'Tambah Kasir Baru',
            'kasir' => Kasir::where('user_id', auth()->user()->id)->get(),
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
            'kode'      => 'required | unique:kasirs',
            'nama'      => 'required',
            'slug'      => 'required | unique:kasirs',
            'email'     => 'required | email | max:255',
            'alamat'    => 'required',
            'username'  => 'required | unique:kasirs',
            'password'  => 'required | min:2 | max:255',
            'kontak'    => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'mulai_bekerja' => 'required',
            'photo_profil'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);

        $data['photo_profil'] = $request->file('photo_profil')->store('profile-kasir');
        $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-kasir');
        $data['password'] = Hash::make($data['password']);
        $data['user_id'] = Auth::user()->id;
        Kasir::create($data);
        return redirect('/admin/pegawai/kasir')->with('success', 'Kasir telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function show(Kasir $kasir)
    {
        return view('admin/pegawai/kasir/show', [
            'title' => "Profil Kasir $kasir->nama",
            'kasir' => $kasir,
            // 'pelanggan' => $kasir->pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function edit(Kasir $kasir)
    {
        return view('admin/pegawai/kasir/edit', [
            'title' => "Edit Sales $kasir->nama",
            'kasir' => $kasir,
            // 'pelanggan' => Pelanggan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kasir $kasir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasir  $kasir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasir $kasir)
    {
        if ($kasir->photo_profil) {
            Storage::delete($kasir->photo_profil);
        }
        if ($kasir->photo_ktp) {
            Storage::delete($kasir->photo_ktp);
        }
        Kasir::destroy($kasir->id);
        return redirect('/admin/pegawai/kasir');
    }

    // Fungsi Otomatisasi Slug
    public function kasirSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kasir::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
