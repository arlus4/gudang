@extends('admin/layouts/main')
@section('admin/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }} {{ $stok->nama }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/admin/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="/admin/produk/harga">Harga Produk</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }} {{ $stok->nama }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Form {{ $title }} {{ $stok->nama }}</header>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <div class="row">
                            <form method="PUT" action="/admin/produk/harga" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="slug">Nama Produk</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input @error('harga_terkini') is-invalid @enderror" type="text" id="date" name="harga_terkini">
                                        @error('harga_terkini')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <label class="mdl-textfield__label">Tanggal Harga Terkini</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_dasar">Harga Dasar</label>
                                    <input type="text" class="form-control @error('harga_dasar') is-invalid @enderror" id="harga_dasar" name="harga_dasar" value="{{ old('harga_dasar') }}" required>
                                    @error('harga_dasar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="margin_harga_supplier">Margin Harga Supplier </label>
                                    <select class="form-select select2" name="margin_harga_supplier" id="margin_harga_supplier">
                                        <option value="">Pilih Margin</option>
                                        <optgroup label="Margin yang tersedia">
                                            <option value="5%">5%</option>
                                            <option value="10%">10%</option>
                                            <option value="15%">15%</option>
                                            <option value="20%">20%</option>
                                            <option value="25%">25%</option>
                                            <option value="30%">30%</option>
                                            <option value="35%">35%</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga_supplier">Harga Supplier</label>
                                    <input type="text" class="form-control @error('harga_supplier') is-invalid @enderror" id="harga_supplier" name="harga_supplier" value="{{ old('harga_supplier') }}" required>
                                    @error('harga_supplier')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="margin_harga_retail">Margin Harga Retail </label>
                                    <select class="form-select select2" name="margin_harga_retail" id="margin_harga_retail">
                                        <option value="">Pilih Margin</option>
                                        <optgroup label="Margin yang tersedia">
                                            <option value="5%">5%</option>
                                            <option value="10%">10%</option>
                                            <option value="15%">15%</option>
                                            <option value="20%">20%</option>
                                            <option value="25%">25%</option>
                                            <option value="30%">30%</option>
                                            <option value="35%">35%</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="harga_retail">Harga Retail</label>
                                    <input type="text" class="form-control @error('harga_retail') is-invalid @enderror" id="harga_retail" name="harga_retail" value="{{ old('harga_retail') }}" required>
                                    @error('harga_retail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
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

@endsection