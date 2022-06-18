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
                            <a href="#data" class="nav-link active" data-bs-toggle="tab">Data Sales</a>
                        </li>
                        <li class="nav-item">
                            <a href="#rangking" class="nav-link" data-bs-toggle="tab">Rangking Sales</a>
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
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <div class="btn-group">
                                                        <a href="/admin/pegawai/agen/create" id="addRow" class="btn btn-circle btn-info"> Tambah Sales Baru 
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
                                                            <th>Kontak</th>
                                                            <th>Omset</th>
                                                            <th>Reward</th>
                                                            <th>Input Reward</th>
                                                            <th> Action </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($agen as $s)
                                                        <tr class="odd gradeX">
                                                            <td class="patient-img">
                                                                <img src="{{ asset('storage/'.$s->photo_profil) }}" alt="Photo Profil {{ $s->nama }}">
                                                            </td>
                                                            <td class="left">{{ $s->kode }}</td>
                                                            <td>{{ $s->nama }}</td>
                                                            <td class="left">
                                                                <a href="tel:{{ $s->kontak }}">{{ $s->kontak }}</a>
                                                            </td>
                                                            <td>@currency($omset)</td>
                                                            <td> ... </td>
                                                            <td class="center">
                                                                <a href="/admin/pegawai/agen/{{ $s->slug }}/reward" type="button" class="btn btn-circle btn-success btn-md m-b-10">
                                                                    <i class="fa fa-external-link"></i>
                                                                </a>
                                                            </td>
                                                            <td> 
                                                                <a href="/admin/pegawai/agen/{{ $s->slug }}" type="button" class="btn btn-circle btn-primary btn-sm m-b-10">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="/admin/pegawai/agen/{{ $s->slug }}/edit" type="button" class="btn btn-circle btn-warning btn-sm m-b-10">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form class="d-inline" action="/admin/pegawai/agen/{{ $s->slug }}" method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-circle btn-danger btn-sm m-b-10" onclick="return confirm('Apakah Anda yakin?')">
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
                        <div class="tab-pane" id="rangking">
                            <div class="row">
                                <div class="card">
                                    <div class="card-head">
                                        <header>Rangking Sales</header>
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="recent-report__chart">
                                            <div id="chart1"></div>
                                            {{-- {!! $chart->container() !!} --}}
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
{{-- <script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }} --}}
@endsection