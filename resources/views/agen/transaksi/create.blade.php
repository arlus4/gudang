@extends('agen/layouts/app')
@section('agen/transaksi/create')

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
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a class="parent-item" href="/agen/transaksi">Daftar Pesanan</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {{-- Panel Produk --}}
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-head">
                                <header>Tabel List Produk</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stoks as $harga)
                                            <tr>
                                                <td class="patient-img">
                                                    <img src="{{ asset('storage/'.$harga->produk_stok->photo_produk) }}" alt="{{ $harga->produk_stok->nama }}">
                                                </td>
                                                <td>{{ $harga->produk_stok->kode }}</td>
                                                <td>{{ $harga->produk_stok->nama }}</td>
                                                <td>{{ $harga->harga_supplier }}</td>
                                                <td>{{ $harga->produk_stok->jumlah_produk }}</td>
                                                <td>
                                                    <button	class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored margin-right-10">
												        <i class="material-icons">add</i>
											        </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Panel Pesanan --}}
                    <div class="col-md-4">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Keranjang</header>
                                <div class="col-lg-6 col-md-4">
                                    <select class="form-select">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <div class="table-scrollable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th class="text-center">Jumlah</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)" class="text-inverse" title="Delete" data-bs-toggle="tooltip">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>
                                                    <div class="input-group spinner">
                                                        <input type="text" class="form-control" value="1">
                                                        <div class="input-group-btn-vertical">
                                                            <button class="btn btn-default" type="button" data-dir="up">
                                                                <i class="fa fa-caret-up"></i>
                                                            </button>
                                                            <button class="btn btn-default" type="button"
                                                                data-dir="dwn">
                                                                <i class="fa fa-caret-down"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>@mdo</td>
                                            </tr>
                                        </tbody>
                                    </table>
									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<b>Sub Total</b> <a class="pull-right">1,200</a>
										</li>
										<li class="list-group-item">
											<b>PPN 10%</b> <a class="pull-right">750</a>
										</li>
										<li class="list-group-item">
											<b>Total</b> <a class="pull-right">11,172</a>
										</li>										
                                    </ul>
                                </div>
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-circle btn-success">Submit</button>
                                    <button type="button" class="btn btn-circle btn-danger">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection