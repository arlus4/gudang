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
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-head">
                        <header>Tabel {{ $title }}</header>
                        <div class="tools">
                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice</th>
                                        <th>Tanggal Pesanan</th>
                                        {{-- <th>Nama Pelanggan</th> --}}
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1
                                    @endphp
                                    @foreach ($tempos as $tempo)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tempo->invoice }}</td>
                                        <td>{{ $tempo->tanggal_penjualan }}</td>
                                        {{-- <td>{{ $tempo->pelanggans->nama }}</td> --}}
                                        <td>{{ ucwords($tempo->kategori_pembayaran) }}</td>
                                        <td>
                                            <span class="label label-sm label-warning"> Pending</span>
                                        </td>
                                        <td>{{ $tempo->total_harga }}</td>
                                        <td>
                                            <a href="/agen/pembayaran/{{ $tempo->slug }}/edit" class="btn btn-circle btn-warning">
                                                <i class="fa fa-send"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection