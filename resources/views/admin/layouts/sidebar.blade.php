<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('assets/img/dp.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <h4> {{ auth()->user()->nama }}</h4>
                        </div>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="/admin/dashboard" class="nav-link">
                    <i class="material-icons">dashboard</i>
                        <span class="title">Beranda</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/pegawai/*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">group</i>
                        <span class="title">Pegawai</span>
                        <span class="arrow {{ Request::is('admin/pegawai/*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/admin/pegawai/admin" class="nav-link">
                                <i class="fa fa-child"></i> Admin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pegawai/agen" class="nav-link">
                                <i class="fa fa-briefcase"></i> Sales 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/pegawai/kasir" class="nav-link">
                                <i class="fa fa-desktop"></i> Kasir 
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/pelanggan*') ? 'active' : '' }}">
                    <a href="/admin/pelanggan" class="nav-link">
                        <i class="material-icons">person</i>
                        <span class="title">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item nav-item {{ Request::is('admin/produk/*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">storage</i>
                        <span class="title">Produk</span>
                        <span class="arrow {{ Request::is('admin/produk/*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/admin/produk/stok" class="nav-link">
                                <i class="fa fa-cubes"></i> Stok Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/produk/harga" class="nav-link">
                                <i class="fa fa-money"></i> Harga Produk 
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/produk/return/*') ? 'active open' : '' }}">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-ban"></i> Return Produk
                                <span class="arrow {{ Request::is('admin/produk/return/*') ? 'open' : '' }}"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="/admin/produk/return/pabrik" class="nav-link">
                                        <i class="fa fa-ban"></i> Produk ke Pabrik
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/produk/return/pelanggan" class="nav-link">
                                        <i class="fa fa-ban"></i> Produk dari Pelanggan
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/transaksi/*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">add_shopping_cart</i>
                        <span class="title">Transaksi</span>
                        <span class="arrow {{ Request::is('admin/transaksi/*') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">                        
                        <li class="nav-item">
                            <a href="/admin/transaksi/pesanan" class="nav-link">
                                <i class="fa fa-edit"></i> Pesanan 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/transaksi/pembelian" class="nav-link">
                                <i class="fa fa-mail-reply"></i> Pembelian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/transaksi/penjualan" class="nav-link">
                                <i class="fa fa-mail-forward"></i> Penjualan
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle"> 
                        <i class="material-icons">assessment</i>
                        <span class="title">Laporan</span> 
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/laporan/laba_rugi" class="nav-link"> 
                                <span class="title">Laporan Laba-Rugi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/arus_keuangan" class="nav-link"> 
                                <span class="title">Laporan Arus Keuangan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/transaksi_penjualan" class="nav-link"> 
                                <span class="title">Laporan Transaksi Penjualan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/transaksi_pembelian" class="nav-link"> 
                                <span class="title">Laporan Transaksi Pembelian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/stok_barang" class="nav-link"> 
                                <span class="title">Laporan Stok Barang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/pelanggan" class="nav-link"> 
                                <span class="title">Laporan Pelanggan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/biaya" class="nav-link"> 
                                <span class="title">Laporan Biaya</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/pajak" class="nav-link"> 
                                <span class="title">Laporan Pajak</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/promosi" class="nav-link"> 
                                <span class="title">Laporan Promosi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/hutang" class="nav-link"> 
                                <span class="title">Laporan Hutang</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/stok_opname" class="nav-link"> 
                                <span class="title">Laporan Stok Opname</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">business</i>
                        <span class="title">Manajemen Cabang</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/cabang/stok" class="nav-link">
                                <i class="fa fa-database"></i> Stok Barang 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cabang/transfer_barang" class="nav-link nav-toggle">
                                <i class="fa fa-exchange"></i> Transer Barang
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="material-icons">build</i>
                        <span class="title">Pengaturan</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
