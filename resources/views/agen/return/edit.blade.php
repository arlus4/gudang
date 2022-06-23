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
                        <a class="parent-item" href="/agen/penjualan">Daftar Penjualan</a>&nbsp;
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
                                <header>Tabel List Produk {{ $transaksi->invoice }}</header>
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
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stoks as $harga)
                                            <tr>
                                                <td>{{ $harga->kode_produk }}</td>
                                                <td>{{ $harga->nama_produk }}</td>
                                                <td>@currency($harga->harga_produk)</td>
                                                <td>{{ $harga->jumlah_produk }}</td>
                                                <td>
                                                    <form class="d-inline" action="{{ url('/agen/transaksi/create/addproduct', $harga->id) }}" method="post">
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

                    {{-- Panel Return --}}
                    <div class="col-md-5">
                        <div class="card card-box">
                            <div class="card-head">
                                <header>Return Produk</header>
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
                                            {{-- @forelse($cart_datas as $index=>$item)
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
                                                    <form action="{{ url('/agen/transaksi/create/tambah', $item['produkId']) }}" method="POST">
                                                        @csrf
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control text-center" name="jumlah_produk" id="jumlah_produk" value="{{$item['jumlah_produk']}}">
                                                            <div class="input-group-append">
                                                              <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                                                <i class="fa fa-paper-plane"></i>
                                                              </button>
                                                            </div>
                                                        </div>
                                                        <span>Gunakan (+) / (-)</span>
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
                                            @endforelse --}}
                                        </tbody>
                                    </table>
									<ul class="list-group list-group-unbordered">
										<li class="list-group-item">
											<b>Sub Total</b> 
                                            <a class="pull-right">
                                                {{-- Rp. {{ number_format($data_totals['sub_total'],2,',','.') }} --}}
                                            </a>
										</li>
										<li class="list-group-item">
											<b>Total</b> 
                                            <a class="pull-right">
                                                {{-- Rp. {{ number_format($data_totals['total'],2,',','.') }} --}}
                                            </a>
										</li>										
                                    </ul>
                                </div>

                                <div class="profile-userbuttons">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="button" class="btn btn-circle btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="/agen/transaksi/create/clear" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus semua daftar Pesanan ?');" type="submit">Clear</button>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- Panel Pembayaran --}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                                    
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/agen/transaksi/create/bayar" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <table class="table table-sm table-borderless">
                                                            <tr>
                                                                <th width="60%">Sub Total</th>
                                                                <th width="40%" class="text-right">Rp.
                                                                    {{-- {{ number_format($data_totals['sub_total'],2,',','.') }} </th> --}}
                                                            </tr>
                                                            {{-- @if($data_totals['tax'] > 0)
                                                            <tr>
                                                                <th>PPN 10%</th>
                                                                <th class="text-right">Rp.
                                                                    {{ number_format($data_totals['tax'],2,',','.') }}</th>
                                                            </tr>
                                                            @endif --}}
                                                        </table>
                                                        <div class="form-group">
                                                            <div class="col-lg-12 col-md-4">
                                                                <label>Pilih Pelanggan</label>
                                                                <select class="form-select" name="pelanggan_id" id="pelanggan_id" required>
                                                                    <option selected disabled>Pilih Pelanggan</option>
                                                                    {{-- @foreach ($pelanggans as $pelanggan)
                                                                        @if (old('$pelanggan_id') == $pelanggan->id)
                                                                            <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                                                        @endif
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-12 col-md-4">
                                                                <label>Kategori Pembayaran</label>
                                                                <select class="form-select" name="kategori" id="kategori" onchange="changeKategori()" required>
                                                                    <option selected disabled>Kategori Pembayaran</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="tempo">Tempo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="tempo">
                                                            <div class="form-group row">
                                                                <div class="col-lg-12 p-t-20">
                                                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                        <input class="mdl-textfield__input" type="text" id="date" name="tanggal_jatuh_tempo">
                                                                        <label class="mdl-textfield__label">Tanggal Jatuh Tempo</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="cash">
                                                            <div class="form-group">
                                                                <label for="oke">Input Nominal</label>
                                                                <input id="oke" class="form-control" type="number" name="bayar"/>
                                                            </div>
                                                            <h3 class="font-weight-bold">Total:</h3>
                                                            {{-- <h1 class="font-weight-bold mb-5">Rp. {{ number_format($data_totals['total'],2,',','.') }}</h1> --}}
                                                            {{-- <input id="totalHidden" type="hidden" name="totalHidden" value="{{$data_totals['total']}}" /> --}}
                                                            
                                                            <h3 class="font-weight-bold">Bayar:</h3>
                                                            <h1 class="font-weight-bold mb-5" id="pembayaran"></h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" id="saveButton" class="btn btn-success" onClick="openWindowReload(this)">Submit</button>
                                                        </div>
                                                    </div>
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
</div>
<!-- end page content -->
<script>
    function changeKategori() {
        var kategori = document.getElementById("kategori");
        if (kategori.value=="tempo") {
            document.getElementById("cash").style.visibility="hidden";
            document.getElementById("tempo").style.visibility="visible";
        } else {
            document.getElementById("tempo").style.visibility="hidden";
            document.getElementById("cash").style.visibility="visible";
        }

    //     lihat($kategori);
    //     const saveButton = document.getElementById("saveButton");

    //     if(kategori.value=="tempo") {
    //         saveButton.disabled = false;
    //     }
    // };

    // function lihat(kategori) {
    //     const saveButton = document.getElementById("saveButton");
    //     if (kategori.value=="tempo") {
    //         saveButton.disabled = false;
    //     } else {
    //         saveButton.disabled = true;
    //     }
    }
</script>


<script>
    oke.oninput = function () {
        let jumlah = parseInt(document.getElementById('totalHidden').value) ? parseInt(document.getElementById('totalHidden').value) : 0;
        let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke').value) : 0;
        let hasil = bayar - jumlah;
        document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 + ',00';
        document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 + ',00';

        // cek(bayar, jumlah);
        // const saveButton = document.getElementById("saveButton");   

        // if(jumlah === 0){
        //     saveButton.disabled = true;
        // } 

    };

    // function cek(bayar, jumlah) {
    //     const saveButton = document.getElementById("saveButton");   

    //     if (bayar < jumlah) {
    //         saveButton.disabled = true;
    //     } else {
    //         saveButton.disabled = false;
    //     }
    // }

    function rupiah(bilangan) {
        var number_string = bilangan.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }

</script>

@endsection