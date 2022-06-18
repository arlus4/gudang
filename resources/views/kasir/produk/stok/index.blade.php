@extends('kasir/layouts/main')
@section('kasir/index')

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
                        <a class="parent-item" href="/kasir/dashboard">Home</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable-line">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#table" class="nav-link active" data-bs-toggle="tab">Tabel {{ $title }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#graph" class="nav-link" data-bs-toggle="tab">Grafik {{ $title }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="table">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Tabel {{ $title }}</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <div class="btn-group">
                                                        <a href="/kasir/produk/stok/create" id="addRow1" class="btn btn-info">
                                                            Tambah Stok Barang <i class="fa fa-external-link"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-scrollable">
                                                <table id="example1" class="display" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Deskripsi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($stok as $s)
                                                        <tr class="odd gradeX">
                                                            <td>{{ $s->kode }}</td>
                                                            <td>{{ $s->nama }}</td>
                                                            <td>{{ $s->jumlah_produk }}</td>
                                                            <td>{{ $s->deskripsi }}</td>
                                                            <td> 
                                                                <a href="/kasir/produk/stok/{{ $s->slug }}" type="button" class="btn btn-circle btn-info">
                                                                    <i class="fa fa-info"></i>
                                                                </a>
                                                                <a href="/kasir/produk/stok/{{ $s->slug }}/edit" type="button" class="btn btn-circle btn-warning">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form action="/kasir/produk/stok/{{ $s->slug }}" method="POST" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-circle btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                                                                        <i class="fa fa-trash-o"></i>
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
                        <div class="tab-pane" id="graph">
                            <div class="row">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Grafik {{ $title }}</header>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection