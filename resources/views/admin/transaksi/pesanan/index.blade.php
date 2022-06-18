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
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-body ">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                                <a href="#masuk" class="mdl-tabs__tab tabs_three is-active">{{ $title }} Baru</a>
                                <a href="#data" class="mdl-tabs__tab tabs_three">Data Pesanan</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="masuk">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @php
                                            $no=1
                                            @endphp
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Pembayaran</th>
                                                <th>Nama Pegawai</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            @foreach ($pesanans as $pesanan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pesanan->invoice }}</td>
                                                <td>{{ $pesanan->pelanggans->nama }}</td>
                                                <td>{{ ucwords($pesanan->kategori_pembayaran) }}</td>
                                                @if ($pesanan->agens != NULL)
                                                <td>{{ $pesanan->agens->nama }}</td>
                                                @else
                                                <td>{{ $pesanan->kasirs->nama }}</td>
                                                @endif
                                                <td>
                                                    <span class="label label-sm label-warning"> Pending </span>
                                                </td>
                                                <td>{{ $pesanan->total_harga }}</td>
                                                <td>
                                                    <form action="{{ route('admin.transaksi.approve', $pesanan->slug) }}" method="post" enctype="multipart/form" class="d-inline">
                                                        @csrf
                                                        @method('patch')
                                                        <button type="submit" class="btn btn-circle btn-success btn-sm">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('pesanan.show', $pesanan->slug) }}" class="btn btn-circle btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <form action="{{ route('pesanan.destroy', $pesanan->slug) }}" method="post" enctype="multipart/form" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-circle btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mdl-tabs__panel p-t-20" id="data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            @php
                                            $no=1
                                            @endphp
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Pembayaran</th>
                                                <th>Nama Pegawai</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            @foreach ($penjualans as $penjualan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $penjualan->invoice }}</td>
                                                <td>{{ $penjualan->pelanggans->nama }}</td>
                                                <td>{{ ucwords($penjualan->kategori_pembayaran) }}</td>
                                                @if ($penjualan->agens != NULL)
                                                <td>({{ $penjualan->agens->kode }}) {{ $penjualan->agens->nama }}</td>
                                                @else
                                                <td>({{ $penjualan->kasirs->kode }}) {{ $penjualan->kasirs->nama }}</td>
                                                @endif
                                                <td>
                                                    <span class="label label-sm label-success"> Approved </span>
                                                </td>
                                                <td>{{ $penjualan->total_harga }}</td>
                                                <td>
                                                    <a href="{{ route('pesanan.show', $penjualan->slug) }}" class="btn btn-circle btn-info">
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