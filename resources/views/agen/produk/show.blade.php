@extends('agen/layouts/main')
@section('agen/index')

<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">{{ $title }} {{ $produk->produk_stok->nama }}</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a class="parent-item" href="/agen/produk">List Daftar Produk</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }} {{ $produk->produk_stok->nama }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <div class="course-picture">
                                    <img src="{{ asset('storage/'.$produk->produk_stok->photo_produk) }}" class="img-responsive" alt=""> </div>
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{ $produk->produk_stok->nama }} </div>
                                <span>{{ $produk->produk_stok->kode }}</span>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <header>Deskripsi</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="profile-desc">
                                {{ $produk->produk_stok->deskripsi }}
                            </div>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Harga Supplier </b>
                                    <div class="profile-desc-item pull-right">@currency($produk->harga_supplier)</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Harga Retail </b>
                                    <div class="profile-desc-item pull-right">@currency($produk->harga_retail)</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->

                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Harga Produk</header>
								</div>
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ $produk->produk_stok->nama }}" readonly>
											<label class="mdl-textfield__label" for="text4">Nama Produk</label>
										</div>
									</div>
                                    <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ $produk->produk_stok->kode }}" readonly>
											<label class="mdl-textfield__label" for="text4">Kode Produk</label>
										</div>
									</div>
                                    <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ $produk->produk_stok->jumlah_produk }}" readonly>
											<label class="mdl-textfield__label" for="text4">Jumlah Stok</label>
										</div>
									</div>
                                    <div class="col-lg-6 p-t-20">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-width">
											<input class="mdl-textfield__input" type="text" id="text4" value="{{ $produk->harga_terkini }}" readonly>
											<label class="mdl-textfield__label" for="text4">Tanggal Harga Terbaru</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>
<!-- end page container -->

@endsection