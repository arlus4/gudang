@extends('kasir/layouts/main')
@section('kasir/index')

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
                        <a class="parent-item" href="/kasir/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a class="parent-item" href="/kasir/produk/keluar">Barang Keluar</a>&nbsp;
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
                            <form method="POST" action="/kasir/produk/keluar" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="stok_id">Daftar Produk </label>
                                    <select class="form-select select2" name="stok_id" id="stok_id">
                                        <option value="">Pilih Kode Produk</option>
                                        <optgroup label="Kode Produk yang tersedia">
                                        @foreach ($stoks as $s)
                                            @if (old('stok') == $s->id)
                                                <option value="{{ $s->id }}" selected>{{ $s->kode }}</option>
                                            @else
                                                <option value="{{ $s->id }}">{{ $s->kode }}</option>
                                            @endif
                                        @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug (Otomatis)</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly required>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Produk</label>
                                    <div class="input-group spinner">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" data-dir="dwn" type="button">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control text-center @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" min="0">
                                        @error('jumlah')
                                        <div class="invalid-feedback">
                                            <p class="text-danger">{{ $message }}</p>
                                        </div>
                                        @enderror
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" data-dir="up" type="button">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input @error('tanggal_keluar') is-invalid @enderror" type="text" id="date" name="tanggal_keluar">
                                        @error('tanggal_keluar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <label class="mdl-textfield__label">Tanggal Barang Keluar</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        <p class="text-danger">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <textarea name="deskripsi" id="deskripsi" class="form-control-textarea" rows="5" value="{{ old('deskripsi') }}" required></textarea>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">Submit</button>
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
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function(){
        fetch('/kasir/produk/keluar/keluarSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>

@endsection