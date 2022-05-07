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
                        <a class="parent-item" href="/admin/dashboard">Home</a>&nbsp;
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
                                                        <a href="/admin/produk/harga/create" id="addRow1" class="btn btn-info">
                                                            Tambah Harga Barang Baru <i class="fa fa-external-link"></i>
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
                                                            <th>Tanggal Harga Terkini</th>
                                                            <th>Harga Dasar</th>
                                                            <th>Harga Retail</th>
                                                            <th>Harga Supplier</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($stoks as $stok)
                                                        <tr class="odd gradeX">
                                                            <td>{{ $stok->produk_stok->kode }}</td>
                                                            <td>{{ $stok->produk_stok->nama }}</td>
                                                            <td>{{ $stok->harga_terkini }}</td>
                                                            <td>{{ $stok->harga_dasar }}</td>
                                                            <td>{{ $stok->harga_retail }}</td>
                                                            <td>{{ $stok->harga_supplier }}</td>
                                                            <td> 
                                                                <div class="btn-group btn-group-circle btn-group-solid">
                                                                    {{-- <a href="/admin/produk/harga/{{ $stok->produk_stok->slug }}" type="button" class="btn btn-info"><i class="fa fa-info"></i></a> --}}
                                                                    <a href="/admin/produk/harga/{{ $stok->produk_stok->slug }}/edit" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                                    <form action="#" method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit" class="btn deepPink-bgcolor" onclick="return confirm('Apakah Anda yakin?')">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
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
        </div>
    </div>
</div>
<!-- end page content -->

@endsection
