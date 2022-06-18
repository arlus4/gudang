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
                            <img src="{{ asset('storage/'. Auth::guard('kasir')->user()->photo_profil) }}" class="img-circle user-img-circle" alt="Photo Profil {{ Auth::guard('kasir')->user()->nama }}" />
                        </div>
                        <div class="pull-left info">
                            <h4> {{ Auth::guard('kasir')->user()->nama }}</h4>
                        </div>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('kasir/dashboard') ? 'active' : '' }}">
                    <a href="/kasir/dashboard" class="nav-link">
                    <i class="material-icons">dashboard</i>
                        <span class="title">Beranda</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('kasir/produk/*') ? 'active open' : '' }}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="material-icons">storage</i>
                        <span class="title">Produk</span>
                        <span class="arrow {{ Request::is('kasir/produk/*') ? 'active open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="/kasir/produk/stok" class="nav-link">
                                <i class="fa fa-cubes"></i> Stok Barang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kasir/produk/keluar" class="nav-link">
                                <i class="fa fa-mail-forward"></i> Barang Keluar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kasir/produk/pesanan" class="nav-link">
                                <i class="fa fa-mail-reply"></i> Barang Pesanan
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/kasir/pelanggan" class="nav-link">
                        <i class="material-icons">face</i>
                        <span class="title">Pelanggan</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('kasir/transaksi*') ? 'active' : '' }}">
                    <a href="/kasir/transaksi" class="nav-link nav-toggle">
                        <i class="material-icons">attach_money</i>
                        <span class="title">Transaksi</span>
                        {{-- <span class="arrow "></span> --}}
                    </a>
                    {{-- <ul class="sub-menu">                        
                        <li class="nav-item">
                            <a href="/pesanan" class="nav-link">
                                <i class="fa fa-edit"></i> Pesanan 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/penjualan" class="nav-link nav-toggle">
                                <i class="fa fa-mail-forward"></i> Penjualan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pembelian" class="nav-link nav-toggle">
                                <i class="fa fa-mail-reply"></i> Pembelian
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <li class="nav-item {{ Request::is('kasir/penjualan*') ? 'active' : '' }}">
                    <a href="/kasir/penjualan" class="nav-link">
                        <i class="material-icons">add_shopping_cart</i>
                        <span class="title">Penjualan</span>
                    </a>
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
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
