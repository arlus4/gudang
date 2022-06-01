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
                        <a class="parent-item" href="/admin/produk/stok">Stok</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Tentang Produk</header>
                    </div>
                    <div class="card-body " id="bar-parent6">
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Kode Produk</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $stok->kode }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Nama Produk</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $stok->nama }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Nama Kasir</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $stok->kasirs->nama }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Jumlah</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $stok->jumlah_produk }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $stok->deskripsi }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Harga Awal</header>
                    </div>
                    <div class="card-body " id="bar-parent6">
                        <form action="{{ route('admin.produk.update.harga', $stok->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="harga_awal">Harga Awal {{ $stok->nama }}</label>
                                <input type="text" class="form-control @error('harga_awal') is-invalid @enderror" id="harga_awal" name="harga_awal" value="{{ old('harga_awal') }}" required>
                                @error('harga_awal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-circle btn-primary">Simpan</button>
                            <a href="/admin/produk/stok" type="button" class="btn btn-circle btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection