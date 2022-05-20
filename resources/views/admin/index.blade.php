@extends('admin/layouts/main')
@section('admin/index')

    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Dashboard {{ ucwords(auth()->user()->role) }}!</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="#">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- start widget -->
            <div class="state-overview">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                {{-- <i class="fa fa-suitcase"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">{{ $sales }}</p>
                                <a href="/admin/pegawai/agen"><p><strong>SALES</p></strong></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                {{-- <i class="fa fa-cubes"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">{{ $produk }}</p>
                                <a href="/admin/produk"><p><strong>PRODUK</strong></p></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <i class="fa fa-handshake-o"></i>
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <a href="/admin/transaksi/penjualan"><p><strong>PESANAN</strong></p></a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                {{-- <i class="fa fa-desktop"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">{{ $kasir }}</p>
                                <a href="/admin/pegawai/kasir"><p><strong>Margin Penjualan</strong></p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                {{-- <i class="fa fa-home"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <a href="#"><p><strong>HUTANG TOKO</strong></p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                {{-- <i class="fa fa-bank"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <a href="#"><p><strong>HUTANG PABRIK</strong></p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel orange">
                            <div class="symbol">
                                {{-- <i class="fa fa-users usr-clr"></i> --}}
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">{{ $pelanggan }}</p>
                                <a href="/admin/pelanggan"><p><strong>PELANGGAN</strong></p></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel orange">
                            <div class="symbol">
                                <i class="fa fa-user"></i>
                                <i class="fa fa-frown-o"></i>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <a href="#"><p><strong>RETAIL</strong></p></a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <!-- end widget -->
            <!-- chart start -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <a href="/admin/transaksi/penjualan">
                                <header>Penjualan</header>
                            </a>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-6">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Pembelian</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Chart end -->
        </div>
    </div>
    <!-- end page content -->

@endsection