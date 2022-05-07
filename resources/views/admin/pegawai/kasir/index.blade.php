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
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <div class="btn-group">
                                                    <a href="/admin/pegawai/kasir/create" id="addRow" class="btn btn-info"> Tambah Kasir Baru 
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        {{-- <th>Alamat</th> --}}
                                                        <th>Kontak</th>
                                                        {{-- <th>KTP</th> --}}
                                                        {{-- <th>Toko yang Dipegang</th> --}}
                                                        {{-- <th>Nota Hutang</th> --}}
                                                        {{-- <th>Jatuh Tempo</th> --}}
                                                        <th>Keterangan</th>
                                                        <th>Omset</th>
                                                        {{-- <th>Sebagai </th> --}}
                                                        <th> Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kasir as $k)
                                                    <tr class="odd gradeX">
                                                        <td class="patient-img">
                                                            <img src="{{ asset('storage/'.$k->photo_profil) }}" alt="Photo Profil {{ $k->nama }}">
                                                        </td>
                                                        <td class="left">{{ $k->kode }}</td>
                                                        <td>{{ $k->nama }}</td>
                                                        <td class="left">
                                                            <a href="tel:{{ $k->kontak }}">{{ $k->kontak }}</a>
                                                        </td>
                                                        <td class="left">{{ $k->keterangan }}</td>
                                                        <td>{{ $k->omset }}</td>
                                                        <td> 
                                                            <div class="btn-group btn-group-circle btn-group-solid">
                                                                <a href="/admin/pegawai/kasir/{{ $k->slug }}" type="button" class="btn btn-info"><i class="fa fa-info"></i></a>
                                                                <a href="/admin/pegawai/kasir/{{ $k->slug }}/edit" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                                <form action="/admin/pegawai/kasir/{{ $k->slug }}" method="POST">
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
                    {{-- <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#data" class="nav-link active" data-bs-toggle="tab">Data Sales</a>
                        </li>
                        <li class="nav-item">
                            <a href="#rangking" class="nav-link" data-bs-toggle="tab">Rangking Sales</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- -->
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection