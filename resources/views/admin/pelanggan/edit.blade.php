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
                    <li>
                        <a class="parent-item" href="/admin/pelanggan">Pelanggan</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
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
                            <form method="POST" action="/admin/pelanggan{{ $pelanggan->slug }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="kode">Kode Pelanggan</label>
                                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $pelanggan->kode) }}" required auto-focus>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $pelanggan->slug) }}" required>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kategori Pelanggan</label>
                                    <select class="form-select  select2" name="kategori" id="kategori" value="{{ old('kategori', $pelanggan->kategori) }}">
                                        <option value="">Pilih Kategori Pelanggan</option>
                                        <optgroup label="Kategori Pelanggan Terpilih">
                                        @if (old('kategori', $pelanggan->kategori) == $pelanggan->kategori)
                                                <option value="$pelanggan-kategori" selected>{{ ucwords($pelanggan->kategori) }}</option>
                                        </optgroup>
                                        <optgroup label="Kategori Pelanggan yang Tersedia">
                                                <option value="supplier">Supplier</option>
                                                <option value="retail">Retail</option>
                                            @endif
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak', $pelanggan->kontak) }}" required>
                                    @error('kontak')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Sales </label>
                                    <select class="form-select select2" name="agen_id" id="agen_id" value="{{ old('agen_id', $pelanggan->agen_id) }}">
                                        <option value="">Pilih Sales</option>
                                        <optgroup label="Sales yang tersedia">
                                        @foreach ($agens as $agen)
                                            @if (old('agen_id', $pelanggan->agen_id) == $agen->id)
                                                <option value="{{ $agen->id }}" selected>{{ $agen->kode }} {{ $agen->nama }}</option>
                                            @else
                                                <option value="{{ $agen->id }}">{{ $agen->kode }} {{ $agen->nama }}</option>
                                            @endif
                                        @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="limit">Limit Pelanggan</label>
                                    <input type="text" class="form-control @error('limit') is-invalid @enderror" id="limit" name="limit" value="{{ old('limit', $pelanggan->limit) }}">
                                    @error('limit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Photo Pelanggan</label>
                                    <input type="file" class="default @error('photo_profil') is-invalid @enderror" id="photo_profil" name="photo_profil" multiple onchange="previewImage()">
                                    @error('photo_profil')
                                    <div class="invalid-feedback">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kartu Identitas Pelanggan</label>
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
                                    <textarea name="alamat" id="alamat" class="form-control-textarea" rows="5" value="{{ old('alamat', $pelanggan->alamat) }}"></textarea>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">Submit</button>
                                    <a href="/admin/pelanggan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Kembali</a>
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
        fetch('/admin/pegawai/agen/agenSlug?kode=' + kode.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection