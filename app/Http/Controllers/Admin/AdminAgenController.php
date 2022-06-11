<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::all();
        return view('admin/pegawai/agen/index', [
            'title' => 'Data Sales',
            'agen' => $agen,
            // 'chart' => $chart->build()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pegawai/agen/create', [
            'title' => 'Tambah Sales Baru',
            'agen' => Agen::where('user_id', auth()->user()->id)->get(),
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
            'kode'      => 'required | unique:agens',
            'nama'      => 'required',
            'slug'      => 'required | unique:agens',
            'email'     => 'required | email | max:255',
            'alamat'    => 'required',
            'username'  => 'required | unique:agens',
            'password'  => 'required | min:2 | max:255',
            'kontak'    => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'mulai_bekerja' => 'required',
            'photo_profil'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
            'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        ]);

        $data['photo_profil'] = $request->file('photo_profil')->store('profile-sales');
        $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-sales');
        $data['password'] = Hash::make($data['password']);
        $data['user_id'] = Auth::user()->id;
        Agen::create($data);
        return redirect('/admin/pegawai/agen')->with('success', 'Sales telah ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function show(Agen $agen)
    {
        return view('admin/pegawai/agen/show', [
            'title' => "Profil Sales $agen->nama",
            'agen' => $agen,
            // 'pelanggan' => $agen->pelanggan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function edit(Agen $agen)
    {
        return view('admin/pegawai/agen/edit', [
            'title' => "Edit Sales $agen->nama",
            'agen' => $agen,
            // 'pelanggan' => Pelanggan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agen $agen)
    {
        $rules = [
            'nama'      => 'required',
            'alamat'    => 'required',
        ];

        if ($request->kode != $agen->kode) {
            $rules['kode'] = 'required|unique:agens';
        }

        if ($request->slug != $agen->slug) {
            $rules['slug'] = 'required|unique:agens';
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

        Agen::where('id', $agen->id)->update($data);

        return redirect('/admin/pegawai/agen')->with('success', 'Data Sales Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agen  $agen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agen $agen)
    {
        if ($agen->photo_profil) {
            Storage::delete($agen->photo_profil);
        }
        if ($agen->photo_ktp) {
            Storage::delete($agen->photo_ktp);
        }
        Agen::destroy($agen->id);
        return redirect('/admin/pegawai/agen');
    }

    // Fungsi Otomatisasi Slug
    public function agenSlug(Request $request)
    {
        $slug = SlugService::createSlug(Agen::class, 'slug', $request->kode);
        return response()->json(['slug' => $slug]);
    }
}
