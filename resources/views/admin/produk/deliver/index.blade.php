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
                            <a href="#baru" class="nav-link active" data-bs-toggle="tab">{{ $title }} Baru</a>
                        </li>
                        <li class="nav-item">
                            <a href="#data" class="nav-link" data-bs-toggle="tab">Data {{ $title }}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="baru">
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
                                            <div class="table-scrollable">
                                                <table id="example1" class="display" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Deskripsi</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($delivers as $s)
                                                        <tr class="odd gradeX">
                                                            <td>{{ $s->nama }}</td>
                                                            <td>{{ $s->jumlah }}</td>
                                                            <td>{{ $s->deskripsi }}</td>
                                                            <td>
                                                                <span class="label label-sm label-warning"> Pending </span>
                                                            </td>
                                                            <td> 
                                                                <div class="col-md-12">
                                                                    <form action="/admin/produk/deliver/{{ $s->slug }}" method="POST" class="d-inline">
                                                                        @method('patch')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-circle btn-success btn-sm m-b-10">
                                                                            <i class="fa fa-check"></i> 
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
                        <div class="tab-pane active fontawesome-demo" id="data">
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
                                            <div class="table-scrollable">
                                                <table id="example3" class="display" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Deskripsi</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($deliv as $s)
                                                        <tr class="odd gradeX">
                                                            <td>{{ $s->nama }}</td>
                                                            <td>{{ $s->jumlah }}</td>
                                                            <td>{{ $s->deskripsi }}</td>
                                                            <td>
                                                                <span class="label label-sm label-success"> Approved </span>
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
