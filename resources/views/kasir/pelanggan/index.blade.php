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
                        <a class="parent-item" href="/kasir/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Tabel {{ $title }}</header>
                    </div>
                    <div class="card-body ">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                                <a href="#data" class="mdl-tabs__tab tabs_three is-active">Data Pelanggan</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="btn-group">
                                            <a href="{{ route('pelanggan.create') }}" id="addRow" class="btn btn-info"> Tambah Pelanggan Baru 
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <br>
                                        <tbody>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Kontak</th>
                                                <th>Alamat</th>
                                                {{-- <th>Status</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($pelanggans as $pelanggan)
                                            <tr>
                                                <td>{{ $pelanggan->kode }}</td>
                                                <td>{{ $pelanggan->nama }}</td>
                                                <td>{{ ucwords($pelanggan->kategori) }}</td>
                                                <td>
                                                    <a href="tel:{{$pelanggan->kontak}}"> {{ $pelanggan->kontak }}</a>
                                                </td>
                                                <td>{{ $pelanggan->alamat }}</td>
                                                {{-- <td>
                                                    <span class="label label-sm label-warning"> Pending </span>
                                                </td> --}}
                                                <td> &nbsp;
                                                    {{-- <a href="/agen/pelanggan/{{ $pelanggan->slug }}/edit" class="btn btn-circle btn-warning">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    <form action="/agen/pelanggan/{{ $pelanggan->slug }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-circle btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                                                            <i class="fa fa-trash-o"></i> 
                                                        </button>
                                                    </form> --}}
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
