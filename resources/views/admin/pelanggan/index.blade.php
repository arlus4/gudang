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
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#data" class="nav-link active" data-bs-toggle="tab">Data Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a href="#baru" class="nav-link" data-bs-toggle="tab">Pelanggan Baru</a>
                        </li>
                    </ul>
                    <div class="tab-content">
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
                                                        @foreach ($toko as $data)
                                                        <tr class="odd gradeX">
                                                            <td class="patient-img">
                                                                <img src="{{ asset('storage/'.$data->photo_toko) }}" alt="Photo Profil {{ $data->nama }}">
                                                            </td>
                                                            <td class="left">{{ $data->kode }}</td>
                                                            <td>{{ $data->nama }}</td>
                                                            <td class="left">
                                                                <a href="tel:{{ $data->kontak }}">{{ $data->kontak }}</a>
                                                            </td>
                                                            <td class="left">{{ $data->keterangan }}</td>
                                                            <td>{{ $data->omset }}</td>
                                                            <td> 
                                                                {{-- <div class="btn-group btn-group-circle btn-group-solid">
                                                                    <a href="/admin/pegawai/agen/{{ $data->slug }}" type="button" class="btn btn-info"><i class="fa fa-info"></i></a>
                                                                    <a href="/admin/pegawai/agen/{{ $data->slug }}/edit" type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                                    <form action="/admin/pegawai/agen/{{ $data->slug }}" method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="submit" class="btn deepPink-bgcolor" onclick="return confirm('Apakah Anda yakin?')">
                                                                            <i class="fa fa-trash-o"></i>
                                                                        </button>
                                                                    </form>
                                                                </div> --}}
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
                        <div class="tab-pane" id="baru">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="card-head">
                                            <header>Tabel Pelanggan Baru </header>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <div class="btn-group">
                                                        <a href="/admin/pelanggan/create" id="addRow" class="btn btn-info"> Tambah Pelanggan Baru 
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table class="mdl-data-table ml-table-striped mdl-js-data-table mdl-data-table--selectable is-upgraded">
                                                <thead>
                                                    <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Kode</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Kontak</th>
                                                        <th>Alamat</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pelanggan as $data)
                                                    <tr>
                                                        <td class="mdl-data-table__cell--non-numeric">{{ $data->kode }}</td>
                                                        <td class="mdl-data-table__cell--non-numeric">{{ $data->nama }}</td>
                                                        <td>{{ ucwords($data->kategori) }}</td>
                                                        <td>
                                                            <a href="tel:{{$data->kontak}}"> {{ $data->kontak }}</a>
                                                        </td>
                                                        <td>{{ $data->alamat }}</td>
                                                        <td>{{ $data->status }}</td>
                                                        <td>
                                                            <form action="{{ route('admin.pelanggan.approve', $data->id) }}" method="POST">
                                                                {{-- @method('PUT') --}}
                                                                @csrf
                                                                <input type="hidden" name="status" value="$data->id" />
											                    <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab margin-right-10 btn-success">
											                        <i class="material-icons">add</i>
    											                </button>
                                                            </form>
	    										                {{-- <a href="{{ route('admin.pelanggan.approve', $data->status) }}" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored margin-right-4 btn-danger">
		    									                    <i class="material-icons">delete</i>
			    								                </a> --}}
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
<!-- end page content -->

@endsection