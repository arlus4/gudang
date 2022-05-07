@extends('admin/layouts/main')
@section('admin/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/admin/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="/admin/pegawai/kasir">Daftar Kasir</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Form {{ $title }}</header>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <div class="row">
                            <form method="POST" action="/admin/pegawai/kasir/{{ $kasir->slug }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="kode">Kode Kasir</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $kasir->kode) }}" required auto-focus>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $kasir->slug) }}" required>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="form-group has-warning">
                                        <span class="help-block">Otomatis</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Kasir</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $kasir->nama) }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak', $kasir->kontak) }}" required>
                                    @error('kontak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label class="control-label col-md-3">Photo Kasir</label>
                                    <input type="file" class="default @error('photo_profil') is-invalid @enderror" id="photo_profil" name="photo_profil" multiple onchange="previewImage()">
                                    @error('photo_profil')
                                    <div class="invalid-feedback">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kartu Identitas Kasir</label>
                                    <input type="file" class="default @error('photo_ktp') is-invalid @enderror" id="photo_ktp" name="photo_ktp" multiple onchange="previewImage()">
                                    @error('photo_ktp')
                                    <div class="invalid-feedback">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <textarea name="alamat" id="alamat" class="form-control-textarea" rows="5" value="{{ old('alamat', $kasir->alamat) }}" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">Submit</button>
                                    {{-- <button type="button" class="btn btn-default">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->
<script>
    const kode = document.querySelector('#kode');
    const slug = document.querySelector('#slug');

    kode.addEventListener('change', function(){
        fetch('/admin/pegawai/kasir/kasirSlug?kode=' + kode.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection