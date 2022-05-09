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
            <div class="col-md-12">
                <div class="tabbable-line">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#data" class="nav-link active" data-bs-toggle="tab">Data Pesanan</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active fontawesome-demo" id="data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <div class="card-head">
                                            <header>Tabel {{ $title }} </header>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <div class="btn-group">
                                                        <a href="/agen/transaksi/create" id="addRow" class="btn btn-info"> Tambah Pesanan Baru 
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table class="mdl-data-table ml-table-striped mdl-js-data-table mdl-data-table--selectable is-upgraded">
                                                <thead>
                                                    <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Address</th>
                                                        <th>Quantity</th>
                                                        <th>Tax</th>
                                                        <th>Discount</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
                                                        <td class="mdl-data-table__cell--non-numeric">Gandhi road, Ahmedabad
                                                        </td>
                                                        <td>25</td>
                                                        <td>$1.00</td>
                                                        <td>$0.90</td>
                                                        <td>
											                <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab margin-right-10 btn-success">
											                    <i class="material-icons">add</i>
											                </button>
											                <button
											                    class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored margin-right-4 btn-danger">
											                    <i class="material-icons">delete</i>
											                </button>
                                                        </td>
                                                    </tr>
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