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
                <div class="card-box">
                    <div class="card-body ">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                                <a href="#data" class="mdl-tabs__tab tabs_three is-active">{{ $title }} Tempo</a>
                                <a href="#cash" class="mdl-tabs__tab tabs_three">{{ $title }} Cash</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @php
                                            $no=1
                                            @endphp
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice</th>
                                                <th>Tanggal Pesanan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Pembayaran</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Update</th>
                                            </tr>
                                            @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi->invoice }}</td>
                                                <td>{{ $transaksi->tanggal_pesan }}</td>
                                                <td>{{ $transaksi->pelanggans->nama }}</td>
                                                <td>{{ ucwords($transaksi->kategori_pembayaran) }}</td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved</span>
                                                </td>
                                                <td>{{ $transaksi->total_harga }}</td>
                                                <td>
                                                    <a href="{{ url('/agen/pembayaran', $transaksi->slug) }}" class="btn btn-circle btn-warning">
                                                        <i class="fa fa-send"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mdl-tabs__panel p-t-20" id="cash">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @php
                                            $no=1
                                            @endphp
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice</th>
                                                <th>Tanggal Pesanan</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Pembayaran</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Invoice</th>
                                            </tr>
                                            @foreach ($pembayarans as $pembayaran)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pembayaran->invoice }}</td>
                                                <td>{{ $pembayaran->tanggal_pesan }}</td>
                                                <td>{{ $pembayaran->pelanggans->nama }}</td>
                                                <td>{{ ucwords($pembayaran->kategori_pembayaran) }}</td>
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                                <td>{{ $pembayaran->total_harga }}</td>
                                                <td>
                                                    <a href="/agen/pembayaran/{{ $pembayaran->slug }}" class="btn btn-circle btn-success">
                                                        <i class="fa fa-eye"></i>
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
    </div>
</div>
<!-- end page content -->

@endsection