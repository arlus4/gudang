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
                        <a class="parent-item" href="{{ route('agen.dashboard') }}">Home</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                    <a href="{{ route('pelanggan.create') }}" id="addRow" class="btn btn-info">
                                        Pelanggan Baru <i class="fa fa-plus"></i>
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
                                        <th>Alamat</th>
                                        <th>Kontak</th>
                                        <th>Kategori</th>
                                        <th>Nota</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Keterangan</th>
                                        <th>Limit</th>
                                        <th>Total Pembelian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($toko as $data)
                                    <tr>
                                        <td>{{ $data->kode }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>
                                            <a href="tel:{{ $data->kontak }}">{{ $data->kontak }}</a>
                                        </td>
                                        <td>{{ ucwords($data->kategori) }}</td>
                                        <td>....</td>
                                        <td>....</td>
                                        <td>Lunas/Belum</td>
                                        <td>{{ $data->limit }}</td>
                                        <td>....</td>
                                        <td> 
                                            <div class="btn-group btn-group-circle btn-group-solid">
                                                <a href="#" type="button" class="btn btn-info"><i class="fa fa-info"></i></a>
                                                <a href="#" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
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
<!-- end page content -->

@endsection
