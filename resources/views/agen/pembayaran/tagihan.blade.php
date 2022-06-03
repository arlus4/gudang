@extends('agen/layouts/main')
@section('agen/index')

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
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a class="parent-item" href="/agen/pembayaran">Pembayaran</a>&nbsp;
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
                        <header>Form Pembayaran</header>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <div class="row">
                            <form method="POST" action="/agen/pembayaran/{{ $pembayaran->slug }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label>Jumlah Tunggakan</label>
                                    <input type="text" class="form-control" value="Rp. {{ $pembayaran->sisa_bayar }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_bayar">Jumlah yang dibayarkan</label>
                                    <input type="text" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required>
                                    @error('jumlah_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sisa_bayar">Sisa Pembayaran</label>
                                    <input type="text" class="form-control @error('sisa_bayar') is-invalid @enderror" id="sisa_bayar" name="sisa_bayar" value="{{ old('sisa_bayar') }}" required>
                                    @error('sisa_bayar')
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