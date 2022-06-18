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
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Pegawai</th>
                                        <th>Kontak</th>
                                        <th>Limit</th>
                                        <th>Reward</th>
                                        <th>Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelanggan as $data)
                                    <tr class="odd gradeX">
                                        <td class="patient-img">
                                            <img src="{{ asset('storage/'.$data->photo_ktp) }}" alt="Photo Profil {{ $data->nama }}">
                                        </td>
                                        <td class="left">{{ $data->kode }}</td>
                                        <td>{{ $data->nama }}</td>
                                        @if($data->agens != NULL)
                                            <td>{{ $data->agens->nama }}</td>
                                        @else
                                            <td>{{ $data->kasirs->nama }}</td>
                                        @endif
                                        <td class="left">
                                            <a href="tel:{{ $data->kontak }}">{{ $data->kontak }}</a>
                                        </td>
                                        <td>{{ $data->limit }}</td>
                                        <td>...</td>
                                        <td>
                                            <span class="label label-sm label-success"> Approved </span>
                                        </td>
                                        <td> 
                                            <a href="/admin/pelanggan/{{ $data->slug }}" class="btn btn-circle btn-primary btn-sm m-b-10">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="/admin/pelanggan/{{ $data->slug }}/edit" class="btn btn-circle btn-warning btn-sm m-b-10">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="/admin/pelanggan/{{ $data->slug }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-circle btn-danger btn-sm m-b-10" onclick="return confirm('Apakah Anda yakin?')">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                            <a href="/admin/pelanggan/reward/{{ $data->slug }}" type="button" class="btn btn-circle btn-success btn-sm m-b-10">
                                                <i class="fa fa-money"></i>
                                            </a>
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