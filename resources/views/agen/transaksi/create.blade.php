@extends('agen/layouts/app')
@section('agen/transaksi/create')

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
                    <li>
                        <a class="parent-item" href="/agen/transaksi">Daftar Pesanan</a>&nbsp;
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {{-- Panel Produk --}}
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-head">
                                <header>Tabel List Produk</header>
                                <div class="tools">
                                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stoks as $harga)
                                            <tr>
                                                <td class="patient-img">
                                                    <img src="{{ asset('storage/'.$harga->produk_stok->photo_produk) }}" alt="{{ $harga->produk_stok->nama }}">
                                                </td>
                                                <td>{{ $harga->produk_stok->kode }}</td>
                                                <td>{{ $harga->produk_stok->nama }}</td>
                                                <td>{{ $harga->harga_supplier }}</td>
                                                <td>{{ $harga->produk_stok->jumlah_produk }}</td>
                                                <td>
                                                    <form action="{{ url('/agen/transaksi/create/addproduct', $harga->id) }}" method="post">
                                                        @csrf
                                                        <button	type="submit" mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored margin-right-10">
												            <i class="material-icons">add</i>
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

                    {{-- Panel Pesanan --}}
                    <div class="col-md-5">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Keranjang</header>
                                <div class="col-lg-6 col-md-4">
                                    <select class="form-select">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body " id="bar-parent">
                                <div class="table-scrollable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th class="text-center">Jumlah</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no=1
                                            @endphp
                                            @forelse($cart_datas as $index=>$item)
                                            <tr>
                                                <td>
                                                    <form action="/agen/transaksi/create/clear" method="post">
                                                    @csrf
                                                    <a onclick="this.closest('form').submit();return false;" class="text-inverse" title="Delete" data-bs-toggle="tooltip">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    </form>
                                                </td>
                                                <td>{{ $no++ }}</td>
                                                <td>{{Str::words($item['name'],3)}} <br>
                                                    Rp. {{ number_format($item['harga_supplier'],2,',','.') }}
                                                </td>
                                                <td class="font-weight-bold">
                                                    <form action="{{url('/agen/transaksi/create/kurangi', $item['produkId'])}}" method="POST" style='display:inline;'>
                                                        @csrf
                                                        <button class="btn btn-sm btn-info" style="display: inline;padding:0.4rem 0.6rem!important">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </form>
                                                    <a style="display: inline">{{$item['jumlah_produk']}}</a>
                                                    <form action="{{url('/agen/transaksi/create/tambah', $item['produkId'])}}" method="POST" style='display:inline;'>
                                                        @csrf
                                                        <button class="btn btn-sm btn-primary" style="display: inline;padding:0.4rem 0.6rem!important">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="text-right">
                                                    Rp. {{ number_format($item['subtotal'],2,',','.') }}
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Belum Ada Transaksi</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<b>Sub Total</b> 
                                            <a class="pull-right">
                                                Rp. {{ number_format($data_totals['sub_total'],2,',','.') }}
                                            </a>
										</li>
										{{-- <li class="list-group-item">
											<b>PPN 10%</b> 
                                            <a class="pull-right">750</a>
                                            <b>
                                                <form action="{{ url('/transcation') }}" method="get">
                                                    PPN 10%
                                                    <input type="checkbox" {{ $data_totals['tax'] > 0 ? "checked" : ""}} name="tax" value="true" onclick="this.form.submit()">
                                                </form>
                                            </b>
                                            <a class="pull-right">Rp.
                                                {{ number_format($data_totals['tax'],2,',','.') }}</a>
										</li> --}}
										<li class="list-group-item">
											<b>Total</b> 
                                            <a class="pull-right">
                                                Rp. {{ number_format($data_totals['total'],2,',','.') }}
                                            </a>
										</li>										
                                    </ul>
                                </div>
                                <div class="profile-userbuttons">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-circle btn-success">Submit</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="/agen/transaksi/create/clear" method="POST">
                                                @csrf
                                                <button class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');" type="submit">Clear</button>
                                            </form>
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