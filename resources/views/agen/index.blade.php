@extends('agen/layouts/main')
@section('agen/index')

    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Beranda {{ ucwords(Auth::guard('agen')->user()->nama) }}!</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li>
                            <i class="fa fa-home"></i>&nbsp;
                            <li class="active">Beranda</li>
                        </li>
                        
                    </ol>
                </div>
            </div>
            <!-- start widget -->
            {{-- <div class="state-overview">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel purple">
                            <div class="symbol">
                                <a href="/agen">
                                    <i class="fa fa-users usr-clr"></i>
                                </a>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <p>PEGAWAI</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel deepPink-bgcolor">
                            <div class="symbol">
                                <a href="/stok">
                                    <i class="fa fa-cubes"></i>
                                </a>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <p>PRODUK</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel orange">
                            <div class="symbol">
                                <a href="/pesanan">
                                    <i class="fa fa-money"></i>
                                </a>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <p>PESANAN</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="overview-panel blue-bgcolor">
                            <div class="symbol">
                                <a href="/pelanggan">
                                    <i class="fa fa-address-card"></i>
                                </a>
                            </div>
                            <div class="value white">
                                <p class="sbold addr-font-h1" data-counter="counterup">0</p>
                                <p>PELANGGAN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end widget -->
            <!-- chart start -->
            {{-- <div class="row">
                <div class="col-sm-6">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Penjualan</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="recent-report__chart">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
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
                </div>
            </div> --}}
            <!-- Chart end -->
        </div>
    </div>
    <!-- end page content -->

@endsection