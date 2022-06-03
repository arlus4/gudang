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
                        <div class="table-responsive">
                            <table id="example1" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice</th>
                                        <th>Pelanggan</th>
                                        <th>Pembayaran</th>
                                        <th>Penerima</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1
                                    @endphp
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->invoice }}</td>
                                        <td>{{ $data->pembayarans->penjualans->pelanggans->nama }}</td>
                                        <td>{{ ucwords($data->pembayarans->kategori_pembayaran) }}</td>
                                        <td>{{ $data->pembayarans->agens->nama }}</td>
                                        <td>{{ $data->tanggal_bayar }}</td>
                                        <td> @currency($data->jumlah_bayar) </td>
                                        <td> @currency($data->total_harga ) </td>
                                        <td>
                                            <span class="label label-sm label-warning"> Pending </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.transaksi.pembayaran', $data->slug) }}" method="post" enctype="multipart/form" class="d-inline">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="btn btn-circle btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
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
<!-- end page content -->

@endsection