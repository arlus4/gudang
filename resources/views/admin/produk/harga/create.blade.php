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
                    <li><a class="parent-item" href="/admin/produk/harga">Harga Produk</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                            <form method="POST" action="/admin/produk/harga" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="stok_id">Daftar Kode Produk </label>
                                    <select class="form-select select2" name="stok_id" id="stok_id">
                                        <option value="">Pilih Kode Produk</option>
                                        <optgroup label="Kode Produk yang tersedia">
                                        @foreach ($stok as $s)
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
                                    <label class="control-label" for="slug">Daftar Nama Produk </label>
                                    <select class="form-select select2" name="slug" id="slug">
                                        <option value="">Pilih Nama Produk</option>
                                        <optgroup label="Nama Produk yang tersedia">
                                        @foreach ($stok as $s)
                                            @if (old('stok') == $s->slug)
                                                <option value="{{ $s->slug }}" selected>{{ $s->nama }}</option>
                                            @else
                                                <option value="{{ $s->slug }}">{{ $s->nama }}</option>
                                            @endif
                                        @endforeach
                                        </optgroup>
                                    </select>
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