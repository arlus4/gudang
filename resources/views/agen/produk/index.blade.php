@extends('agen/layouts/main')
@section('agen/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">List {{ $title }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="card-box">
                <div class="card-head">
                    <header>{{ $title }}</header>
                </div>
                <div class="card-body ">
                    <!-- start course list -->
                    <div class="row">
                        @foreach ($stoks as $stok)
                        <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                            <div class="blogThumb">
                                <div class="thumb-center">
                                    <img class="img-responsive" src="{{ asset('storage/'.$stok->produk_stok->photo_produk) }}" alt="{{ $stok->produk_stok->nama }}">
                                </div>
                                <div class="course-box">
                                    <h4>{{ $stok->produk_stok->nama }}</h4>
                                    <div class="text-muted">
                                        <span class="m-r-10">{{ $stok->produk_stok->kode }}</span>
                                    </div>
                                    <p>
                                        <span>
                                            <i class="ti-alarm-clock"></i> Harga Supplier: {{ $stok->harga_supplier }}
                                        </span>
                                    </p>
                                    <p>
                                        <span>
                                            <i class="ti-user"></i> Harga Retail: {{ $stok->harga_retail }}
                                        </span>
                                    </p>
                                    <p>
                                        <span>{{ $stok->deskripsi }}</span>
                                    </p>
                                    <p>
                                        <span>
                                            <i class="fa fa-archive"></i> Stok: {{ $stok->produk_stok->jumlah_produk }}
                                        </span>
                                    </p>
                                    <a href="/agen/produk/{{ $stok->produk_stok->slug }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- End course list -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection