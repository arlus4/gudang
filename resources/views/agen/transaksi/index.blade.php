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
                                            @php
                                            $no=1
                                            @endphp
                                            <tr>
                                                <th>#</th>
                                                <th>Invoice</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Pembayaran</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @foreach ($transaksis as $transaksi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $transaksi->invoice }}</td>
                                                <td>{{ $transaksi->pelanggans->nama }}</td>
                                                <td>Kategori masih belum</td>
                                                <td>Belum</td>
                                                <td>{{ $transaksi->total_harga }}</td>
                                                <td>
                                                    <a href="/agen/transaksi/show/{{ $transaksi->slug }}" class="btn btn-circle btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            {{-- @foreach ($pesanans as $pesanan)
                                            <tr class="odd gradeX">
                                                <td>{{ no++ }}</td>
                                                <td class="patient-img">
                                                    <img src="{{ asset('storage/'.$pesanan->photo_toko) }}" alt="Photo Profil {{ $pesanan->nama }}">
                                                </td>
                                                <td>{{ $pesanan->kode }}</td>
                                                <td>{{ $pesanan->nama }}</td>
                                                <td>{{ $pesanan->alamat }}</td>
                                                <td>
                                                    <a href="tel:{{ $pesanan->kontak }}">{{ $pesanan->kontak }}</a>
                                                </td>
                                                <td>{{ ucwords($pesanan->kategori) }}</td>
                                                <td>....</td>
                                                <td>....</td>
                                                <td>Lunas/Belum</td>
                                                <td>{{ $pesanan->limit }}</td>
                                                <td>....</td>
                                                <td> 
                                                    <div class="btn-group btn-group-circle btn-group-solid">
                                                        <a href="/agen/pelanggan/{{ $pesanan->slug }}" class="btn btn-info">
                                                            <i class="fa fa-info"></i>
                                                        </a>
                                                        <a href="/agen/pelanggan/{{ $pesanan->slug }}/edit" class="btn btn-warning">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <form action="/agen/pelanggan/{{ $pesanan->slug }}" method="POST">
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