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
                        <a class="parent-item" href="/admin/pegawai/agen">Data Sales</a>&nbsp;
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
                            <label class="col-sm-12 control-label">Kode Sales</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $agen->kode }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Nama Sales</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $agen->nama }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Kontak</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $agen->kontak }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Jumlah Toko</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $pelanggan }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" value="{{ $agen->alamat }}" class="form-control" readonly disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Reward Sales</header>
                    </div>
                    <div class="card-body " id="bar-parent6">
                        <div class="form-group row">
                            <label class="col-sm-12 control-label">Omset</label>
                            <div class="col-sm-12">
                                <input type="text" value="@currency($omset)" class="form-control" readonly disabled>
                            </div>
                        </div>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="persentase">Persentase</label>
                                <input type="text" class="form-control @error('persentase') is-invalid @enderror" id="persentase" name="persentase" value="{{ old('persentase') }}" required>
                                @error('persentase')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input @error('tanggal_bayar') is-invalid @enderror" type="text" id="date" name="tanggal_bayar">
                                    @error('tanggal_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <label class="mdl-textfield__label">Tanggal Bayar</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-circle btn-primary">Simpan</button>
                            <a href="/admin/pegawai/agen" type="button" class="btn btn-circle btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection