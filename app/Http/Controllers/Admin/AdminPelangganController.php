<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agen;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pelanggan $status)
    {
        $toko = Pelanggan::where('status', '1')->get();
        $pelanggan = Pelanggan::where('status', '0')->get();
        return view('admin/pelanggan/index', [
            'title' => 'Data Pelanggan',
            'toko' => $toko,
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $data = Pelanggan::findOrFail($id);
        if ($data) {
            $data->status = true;
            $data->save();
            return redirect()->back()->with('success', 'Data Berhasil Di Approve');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pelanggan/tambah', [
            'title' => 'Tambah Pelanggan',
            // 'kasir' => $kasir,
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
        // $data = $request->validate([
        //     'kode'      => 'required | unique:pelanggans',
        //     'nama'      => 'required',
        //     'slug'      => 'required | unique:pelanggans',
        //     'email'     => 'required | email | max:255',
        //     'alamat'    => 'required',
        //     'username'  => 'required | unique:pelanggans',
        //     'password'  => 'required | min:2 | max:255',
        //     // 'kontak'    => 'required',
        //     'photo_toko'     => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        //     'photo_ktp'       => 'required | image | mimes:jpg,png,jpeg,gif,svg | max:2048',
        // ]);

        // $data['photo_toko'] = $request->file('photo_toko')->store('profile-kasir');
        // $data['photo_ktp'] = $request->file('photo_ktp')->store('ktp-kasir');
        // $data['password'] = Hash::make($data['password']);
        // $data['user_id'] = Auth::user()->id;
        // Pelanggan::create($data);
        // return redirect('/admin/pegawai/kasir')->with('success', 'pelanggan telah ditambah!');
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
