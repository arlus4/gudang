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
                    <li><i class="fa fa-home"></i>&nbsp;
                        <a class="parent-item" href="/admin/dashboard">Beranda</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="/admin/pegawai">Pegawai</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Form {{ $title }}</header>
                    </div>
                    <div class="card-body" id="bar-parent">
                        <div class="row">
                            <form class="d-inline" method="POST" action="admin/pegawai/admin" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Sales</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                    <div class="form-group has-warning">
                                        <span class="help-block">Otomatis</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode">Kode Sales</label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label col-md-3">Mulai Bekerja</label>
                                    <div class="input-append date">
                                        <div id="dateIcon" class="input-group datePicker">
                                            <input class="formDatePicker form-control" name="mulai" type="text" placeholder="Input Tanggal Awal Masuk" data-input>
                                            <span class="dateBtn">
                                                <a class="input-button" title="toggle" data-toggle>
                                                    <i class="icon-calendar"></i>
                                                </a>
                                                <a class="input-button" title="clear" data-clear>
                                                    <i class="icon-close"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Sebagai</label>
                                    <select class="form-select input-height" name="sebagai">
                                        <option value="">Silahkan pilih...</option>
                                        <option value="sales">Sales</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="control-label col-md-3">Photo Sales</label>
                                    <input type="file" class="default" name="gambar" multiple>
                                </div> --}}
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control-textarea" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="omset">Omset</label>
                                    <input type="text" class="form-control" id="omset" name="omset">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary">Submit</button>
                                    {{-- <button type="button" class="btn btn-default">Cancel</button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page content -->

@endsection