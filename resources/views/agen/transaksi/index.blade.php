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
                        <a class="parent-item" href="/agen/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-body ">
                        <div class="mdl-tabs mdl-js-tabs">
                            <div class="mdl-tabs__tab-bar tab-left-side">
                                <a href="#data" class="mdl-tabs__tab tabs_three is-active">Tabel {{ $title }}</a>
                            </div>
                            <div class="mdl-tabs__panel is-active p-t-20" id="data">
                                <div class="table-responsive">
                                    <table class="table">
                                        <div class="btn-group">
                                            <a href="/agen/transaksi/create" id="addRow" class="btn btn-info"> Tambah Pesanan Baru 
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Quantity</th>
                                                <th>Tax</th>
                                                <th>Discount</th>
                                                <th>Aksi</th>
                                            </tr>
                                            {{-- @foreach ($pelanggans as $data)
                                            <tr class="odd gradeX">
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
                                                    <div class="btn-group btn-group-circle btn-group-solid">
                                                        <a href="/agen/pelanggan/{{ $data->slug }}" class="btn btn-info">
                                                            <i class="fa fa-info"></i>
                                                        </a>
                                                        <a href="/agen/pelanggan/{{ $data->slug }}/edit" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="/agen/pelanggan/{{ $data->slug }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn deepPink-bgcolor" onclick="return confirm('Apakah Anda yakin?')">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach --}}
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