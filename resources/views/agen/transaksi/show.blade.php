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
                <div class="white-box">
                    <h3>
                        <b>{{ $transaksi->invoice }}</b> 
                        <span class="pull-right"> {{ $transaksi->agens->nama }} ({{ $transaksi->agens->kode }})</span>
                    </h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- Bio Gudang Baja --}}
                            <div class="pull-left">
                                <address>
                                    <img src="../assets/img/invoice_logo.png" alt="logo"
                                        class="logo-default" />
                                    <p class="text-muted m-l-5">
                                        Aditya University, <br> Opp. Town Hall, <br>
                                        Sardar Patel Road, <br> Ahmedabad - 380015
                                    </p>
                                </address>
                            </div>
                            {{-- Bio Pelanggan --}}
                            <div class="pull-right text-right">
                                <address>
                                    <p class="addr-font-h3">Penerima</p>
                                    <p class="font-bold addr-font-h4">{{ $transaksi->pelanggans->nama }}</p>
                                    <p class="text-muted m-l-30">
                                        {{ $transaksi->pelanggans->alamat }} 
                                        <br> 
                                        {{ $transaksi->pelanggans->kontak }}
                                    </p>
                                    <p class="m-t-30">
                                        <b>Pesanan</b> 
                                        <i class="fa fa-calendar"></i>
                                        {{ $transaksi->tanggal_pesan }}
                                    </p>
                                    <p>
                                        <b>Kategori :</b> {{ ucwords($transaksi->pelanggans->kategori) }}
                                    </p>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive m-t-40">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            @php
                                            $no=1
                                            @endphp
                                            <th class="text-center">#</th>
                                            <th class="text-right">Kode Produk</th>
                                            <th class="text-right">Nama Produk</th>
                                            <th class="text-right">Jumlah</th>
                                            <th class="text-right">Harga</th>
                                            {{-- <th class="text-right">Amount</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $detail)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-right">{{ $detail->kode_produk }}</td>
                                            <td class="text-right">{{ $detail->nama_produk }}</td>
                                            <td class="text-right">{{ $detail->jumlah_produk }}</td>
                                            <td class="text-right">Rp. {{ $detail->harga_produk }}</td>
                                            {{-- <td class="text-right">$100</td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right m-t-30 text-right">
                                {{-- <p>Sub - Total amount: $150</p>
                                <p>Discount : $10 </p>
                                <p>Tax (10%) : $14 </p>
                                <hr> --}}
                                <h3><b>Total :</b> Rp. {{ $transaksi->total_harga }}</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <div class="text-right">
                                <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                <button onclick="javascript:window.print();" class="btn btn-default btn-outline" type="button"> 
                                    <span>
                                        <i class="fa fa-print"></i> Print
                                    </span> 
                                </button>
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