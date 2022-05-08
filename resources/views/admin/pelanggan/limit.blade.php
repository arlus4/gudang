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
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
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
            <div class="col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Tentang Pelanggan</header>
                    </div>
                    <div class="card-body " id="bar-parent6">
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Kode Pelanggan</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan->kode }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Nama Pelanggan</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan->nama }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Nama Sales</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan->agens->nama }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Kontak</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan->kontak }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Kategori</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ ucwords($pelanggan->kategori) }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan->alamat }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Limit Pelanggan</header>
                    </div>
                    <div class="card-body " id="bar-parent6">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-12 control-label">Limit Pelanggan</label>
                                <div class="col-sm-12">
                                    <input type="text" name="limit" id="limit" data-mask="Rp. 999.999.999" class="form-control @error('kode') is-invalid @enderror" required auto-focus>
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label>Status</label>
                                <div class="radio">
                                    <input id="status" name="status" type="radio" value="1" checked="checked" disabled="disabled">
                                    <label for="status">Approve</label>
                                </div>
                            </div>
                            <button type="button" class="btn btn-circle btn-primary">Simpan</button>
                            <a href="/admin/pelanggan" type="button" class="btn btn-circle btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection