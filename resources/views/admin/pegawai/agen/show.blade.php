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
                    <li>
                        <a class="parent-item" href="/admin/pegawai/agen">Daftar Sales</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <div class="card">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <img src="{{ asset('storage/'.$agen->photo_profil) }}" class="img-responsive" alt="Photo Profil {{ $agen->nama }}">
                            </div>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{ $agen->nama }} </div>
                                <div class="profile-usertitle-job"> Sales </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <header>Informasi Pegawai</header>
                        </div>
                        <div class="card-body no-padding height-9">
                            <div class="profile-desc">
                                {{ $agen->alamat }}
                            </div>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Kontak </b>
                                    <div class="profile-desc-item pull-right">
                                        <a href="tel:{{ $agen->kontak }}">{{ $agen->kontak }}</a>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Usia </b>
                                    <div class="profile-desc-item pull-right">{{ \Carbon\Carbon::parse($agen->tanggal_lahir)->diffInYears() }} Tahun</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Jenis Kelamin </b>
                                    <div class="profile-desc-item pull-right">{{ ucwords($agen->jenis_kelamin) }}</div>
                                </li>
                                <li class="list-group-item">
                                    <b>Mulai Bekerja</b>
                                    <div class="profile-desc-item pull-right">{{ $agen->mulai_bekerja->format('d-m-Y') }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body no-padding height-9">
                            <div class="row">
                                <img src="{{ asset('storage/'.$agen->photo_ktp) }}" class="img-responsive" alt="Photo Profil {{ $agen->nama }}">
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                        </div>
                    </div>
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="card">
                            <div class="card-head">
                                <header>Grafik Pendapatan {{ $agen->nama }}</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="recent-report__chart">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-head">
                                <header>Toko yang Dipegang</header>
                            </div>
                            <div class="card-body no-padding height-9">
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12">
                                        <div class="table-scrollable">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Kontak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no=1
                                                    @endphp
                                                    @foreach($pelanggans as $pelanggan)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $pelanggan->kode }}</td>
                                                        <td>{{ $pelanggan->nama }}</td>
                                                        <td>
                                                            <a href="tel:{{ $pelanggan->kontak }}">{{ $pelanggan->kontak }}</a>
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
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
    </div>
    <!-- end page content -->
</div>
<!-- end page container -->

@endsection