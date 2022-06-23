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
                    <li>
                        <i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/admin/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="tab1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Tabel {{ $title }}</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh"
                                                    href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down"
                                                    href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times"
                                                    href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="table-scrollable">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Invoice</th>
                                                            <th>Tanggal Pesanan</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Pembayaran</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $no=1
                                                    @endphp
                                                    @foreach ($returns as $return)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td> {{ $return->invoice }} </td>
                                                        <td> {{ $return->tanggal_penjualan }} </td>
                                                        <td> {{ $return->pelanggans->nama }} </td>
                                                        <td> {{ ucwords($return->kategori_pembayaran) }} </td>
                                                        <td>
                                                            <a href="/agen/return/{{ $return->slug }}/edit" class="btn btn-circle btn-warning">
                                                                <i class="fa fa-sign-out"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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