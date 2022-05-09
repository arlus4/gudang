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
                                                            <th></th>
                                                            <th>Pelanggan</th>
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Jumlah</th>
                                                            <th>Keterangan</th>
                                                            {{-- <th> Action </th> --}}
                                                        </tr>
                                                    </thead>
                                                    {{-- <tbody>
                                                        @foreach ($admin as $a)
                                                        <tr class="odd gradeX">
                                                            <td class="patient-img">
                                                                <img src="{{ asset('admin/img/std/std1.jpg') }}" alt="">
                                                            </td>
                                                            <td>{{ $a->kode }}</td>
                                                            <td class="left">{{ $a->nama }}</td>
                                                            <td class="left">{{ $a->alamat }}</td>
                                                            <td class="left">Admin</td>
                                                            <td>
                                                                <a href="tel:{{ $a->kontak }}">{{ $a->kontak }} </a>
                                                            </td>
                                                            <td>....</td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <button class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o "></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody> --}}
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