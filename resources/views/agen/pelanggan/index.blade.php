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
                        <a class="parent-item" href="{{ route('agen.dashboard') }}">Beranda</a>&nbsp;
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
                                <a href="#baru" class="mdl-tabs__tab tabs_three">Pelanggan Baru</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Kategori</th>
                                                <th>Nota</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Limit</th>
                                                <th>Total Pembelian</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            @foreach ($pelanggans as $data)
                                            <tr>
                                                <td class="patient-img">
                                                    <img src="{{ asset('storage/'.$data->photo_toko) }}" alt="Photo Profil {{ $data->nama }}">
                                                </td>
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
                                                    <div class="d-inline">

                                                        <a href="/agen/pelanggan/{{ $data->slug }}" class="btn btn-circle btn-info btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="/agen/pelanggan/{{ $data->slug }}/edit" class="btn btn-circle btn-warning btn-sm">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="/agen/pelanggan/{{ $data->slug }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-circle btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">
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
                            <div class="mdl-tabs__panel p-t-20" id="baru">
                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="btn-group">
                                            <a href="/agen/pelanggan/create" id="addRow" class="btn btn-info"> Tambah Pelanggan Baru 
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <br>
                                        <tbody>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Sales</th>
                                                <th>Kategori</th>
                                                <th>Kontak</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($tokos as $toko)
                                            <tr>
                                                <td>{{ $toko->kode }}</td>
                                                <td>{{ $toko->nama }}</td>
                                                <td>{{ $toko->agens->nama }}</td>
                                                <td>{{ ucwords($toko->kategori) }}</td>
                                                <td>
                                                    <a href="tel:{{$toko->kontak}}"> {{ $toko->kontak }}</a>
                                                </td>
                                                <td>{{ $toko->alamat }}</td>
                                                <td>
                                                    <span class="label label-sm label-warning"> Pending </span>
                                                </td>
                                                <td>
                                                    <a href="/agen/pelanggan/{{ $toko->slug }}/edit" class="btn btn-circle btn-warning">
                                                        <i class="fa fa-edit"></i> 
                                                    </a>
                                                    <form action="/agen/pelanggan/{{ $toko->slug }}" method="POST" class="d-inline">
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
        </div>
    </div>
</div>
<!-- end page content -->

@endsection
