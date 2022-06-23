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
                    <div class="card-head">
                        <header>Tabel {{ $title }}</header>
                    </div>
                    <div class="card-body ">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                                <a href="#baru" class="mdl-tabs__tab tabs_three is-active">Data Cabang</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="baru">
                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="btn-group">
                                            <a href="#" id="addRow" class="btn btn-circle btn-info"> Tambah Cabang Baru 
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <br>
                                        {{-- <tbody>
                                            <tr>
                                                <th class="mdl-data-table__cell--non-numeric">Kode</th>
                                                <th class="mdl-data-table__cell--non-numeric">Nama</th>
                                                <th class="mdl-data-table__cell--non-numeric">Pegawai</th>
                                                <th>Kategori</th>
                                                <th>Kontak</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($pelanggan as $pelanggan)
                                            <tr>
                                                <td class="mdl-data-table__cell--non-numeric">{{ $pelanggan->kode }}</td>
                                                <td class="mdl-data-table__cell--non-numeric">{{ $pelanggan->nama }}</td>
                                                @if($pelanggan->agens != NULL)
                                                    <td class="mdl-data-table__cell--non-numeric">{{ $pelanggan->agens->nama }}</td>
                                                @else
                                                    <td class="mdl-data-table__cell--non-numeric">{{ $pelanggan->kasirs->nama }}</td>
                                                @endif
                                                <td>{{ ucwords($pelanggan->kategori) }}</td>
                                                <td>
                                                    <a href="tel:{{$pelanggan->kontak}}"> {{ $pelanggan->kontak }}</a>
                                                </td>
                                                <td>{{ $pelanggan->alamat }}</td>
                                                <td>
                                                    <span class="label label-sm label-warning"> Pending </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.pelanggan.limit', $pelanggan->slug) }}" class="btn btn-circle btn-success">
                                                        <i class="fa fa-plus"></i> 
                                                    </a>
                                                    <form action="/admin/pelanggan/{{ $pelanggan->slug }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-circle btn-danger" onclick="return confirm('Apakah Anda yakin?')">
                                                            <i class="fa fa-trash-o"></i> 
                                                        </button>
                                                    </form>
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
<!-- end page content -->

@endsection