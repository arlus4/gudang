<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\KasirLoginController;
use App\Http\Controllers\Admin\AdminProdukReturn;
use App\Http\Controllers\Admin\AdminAgenController;
use App\Http\Controllers\Agen\AgenProdukController;
use App\Http\Controllers\Admin\AdminKasirController;
use App\Http\Controllers\Agen\AgenProfileController;
use App\Http\Controllers\Kasir\KasirKeluarController;
use App\Http\Controllers\Kasir\KasirProdukController;
use App\Http\Controllers\Admin\AdminPegawaiController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Agen\AgenDashboardController;
use App\Http\Controllers\Agen\AgenPelangganController;
use App\Http\Controllers\Agen\AgenPenjualanController;
use App\Http\Controllers\Agen\AgenTransaksiController;
use App\Http\Controllers\Kasir\KasirPesananController;
use App\Http\Controllers\Kasir\KasirProfileController;
use App\Http\Controllers\Agen\AgenPembayaranController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPelangganController;
use App\Http\Controllers\Kasir\KasirDashboardController;
use App\Http\Controllers\Kasir\KasirPelangganController;
use App\Http\Controllers\Kasir\KasirPenjualanController;
use App\Http\Controllers\Kasir\KasirTransaksiController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\Admin\AdminProdukStokController;
use App\Http\Controllers\Admin\AdminProdukHargaController;
use App\Http\Controllers\Admin\AdminBarangaKeluarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login Admin
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);
// Route untuk Admin
Route::middleware(['auth:sanctum', 'verified', 'isadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/notif', [AdminDashboardController::class, 'notif']);
    Route::resource('/admin/profil', AdminProfileController::class);
    Route::resource('/admin/pegawai/admin', AdminPegawaiController::class);
    Route::get('/admin/pegawai/agen/agenSlug', [AdminAgenController::class, 'agenSlug']);
    Route::get('/admin/pegawai/agen/{agen:slug}/reward', [AdminAgenController::class, 'reward']);
    Route::resource('/admin/pegawai/agen', AdminAgenController::class);
    Route::get('/admin/pegawai/kasir/kasirSlug', [AdminKasirController::class, 'kasirSlug']);
    Route::resource('/admin/pegawai/kasir', AdminKasirController::class);
    Route::get('/admin/pelanggan/reward/{pelanggan:slug}', [AdminPelangganController::class, 'reward']);
    Route::get('/admin/pelanggan/supplier', [AdminPelangganController::class, 'supplier']);
    Route::get('/admin/pelanggan/retail', [AdminPelangganController::class, 'retail']);
    Route::get('/admin/pelanggan/pelangganSlug', [AdminPelangganController::class, 'pelangganSlug']);
    Route::get('/admin/pelanggan/limit/{pelanggan:slug}', [AdminPelangganController::class, 'tambahlimit'])->name('admin.pelanggan.limit');
    Route::patch('/admin/pelanggan/limit/{pelanggan:slug}', [AdminPelangganController::class, 'limit'])->name('admin.pelanggan.ubah');
    Route::resource('/admin/pelanggan', AdminPelangganController::class);
    Route::get('/admin/produk/stok', [AdminProdukStokController::class, 'index']);
    Route::get('/admin/produk/stok/{stok:slug}', [AdminProdukStokController::class, 'harga'])->name('admin.produk.tambah.harga');
    Route::patch('/admin/produk/stok/{stok:slug}', [AdminProdukStokController::class, 'update_harga'])->name('admin.produk.update.harga');
    Route::get('/admin/produk/harga/produkSlug', [AdminProdukHargaController::class, 'produkSlug'])->name('admin.produk.produkSlug');
    Route::resource('/admin/produk/harga', AdminProdukHargaController::class);
    Route::resource('/admin/produk/deliver', AdminBarangaKeluarController::class);
    Route::patch('/admin/produk/deliver/{deliver:slug}', [AdminBarangaKeluarController::class, 'approve'])->name('admin.produk.deliver');
    Route::get('/admin/produk/return/pabrik', [AdminProdukReturn::class, 'pabrik']);
    Route::get('/admin/produk/return/pelanggan', [AdminProdukReturn::class, 'pelanggan']);
    Route::resource('admin/transaksi/pesanan', AdminPesananController::class);
    Route::patch('/admin/transaksi/approve/{pesanan:slug}', [AdminPesananController::class, 'approve'])->name('admin.transaksi.approve');
    Route::get('/admin/transaksi/pembayaran', [AdminPembayaranController::class, 'index']);
    Route::patch('/admin/transaksi/pembayaran/{pembayaran:slug}', [AdminPembayaranController::class, 'bayar'])->name('admin.transaksi.pembayaran');
});

// Login Sales
Route::get('/agen/login', [AgenLoginController::class, 'index'])->name('login.agen');
Route::post('/agen/login', [AgenLoginController::class, 'authenticate']);
// Route untuk Sales
Route::middleware('auth:agen', 'verified', 'isagen')->group(function () {
    Route::get('/agen/dashboard', [AgenDashboardController::class, 'index'])->name('agen.dashboard');
    Route::resource('/agen/profil', AgenProfileController::class);
    Route::resource('/agen/produk', AgenProdukController::class);
    Route::get('/agen/pelanggan/tokoSlug', [AgenPelangganController::class, 'tokoSlug']); //diatas resource
    Route::resource('/agen/pelanggan', AgenPelangganController::class);
    Route::resource('/agen/transaksi', AgenTransaksiController::class);
    Route::post('/agen/transaksi/create/addproduct/{id}', [AgenTransaksiController::class, 'addProduct']);
    Route::post('/agen/transaksi/create/removeproduct/{id}', [AgenTransaksiController::class, 'removeProduct']);
    Route::post('/agen/transaksi/create/clear', [AgenTransaksiController::class, 'clear']);
    Route::post('/agen/transaksi/create/tambah/{id}', [AgenTransaksiController::class, 'tambah']);
    // Route::post('/agen/transaksi/create/kurangi/{id}', [AgenTransaksiController::class, 'kurangi']);
    Route::post('/agen/transaksi/create/bayar', [AgenTransaksiController::class, 'bayar']);
    Route::resource('/agen/pembayaran', AgenPembayaranController::class);
    // Route::get('/agen/pembayaran/{tempo:slug}', [AgenPembayaranController::class, 'bayar']);
    // Route::patch('/agen/pembayaran/{tempo:slug}', [AgenPembayaranController::class, 'update']);
    Route::get('/agen/penjualan', [AgenPenjualanController::class, 'index']);
});

// Login Kasir
Route::get('/kasir/login', [KasirLoginController::class, 'index'])->name('login.kasir');
Route::post('/kasir/login', [KasirLoginController::class, 'authenticate']);
// Route untuk Kasir
Route::middleware('auth:kasir', 'verified', 'iskasir')->group(function () {
    Route::get('/kasir/dashboard', [KasirDashboardController::class, 'index'])->name('kasir.dashboard');
    Route::resource('/kasir/profil', KasirProfileController::class);
    Route::get('/kasir/produk/stok/stokSlug', [KasirProdukController::class, 'stokSlug']); //diatas resource
    Route::resource('/kasir/produk/stok', KasirProdukController::class);
    Route::get('/kasir/produk/keluar/keluarSlug', [KasirKeluarController::class, 'keluarSlug']); //diatas resource
    Route::resource('/kasir/produk/keluar', KasirKeluarController::class);
    Route::resource('/kasir/produk/pesanan', KasirPesananController::class);
    Route::patch('/kasir/produk/pesanan/{pesanan:slug}', [KasirPesananController::class, 'accept'])->name('kasir.produk.pesanan.accept');
    Route::get('/kasir/pelanggan/pelangganSlug', [KasirPelangganController::class, 'pelangganSlug']);
    Route::resource('/kasir/pelanggan', KasirPelangganController::class);
    Route::resource('/kasir/transaksi', KasirTransaksiController::class);
    Route::post('/kasir/transaksi/create/addproduct/{id}', [KasirTransaksiController::class, 'addProduct']);
    Route::post('/kasir/transaksi/create/removeproduct/{id}', [KasirTransaksiController::class, 'removeProduct']);
    Route::post('/kasir/transaksi/create/clear', [KasirTransaksiController::class, 'clear']);
    Route::post('/kasir/transaksi/create/tambah/{id}', [KasirTransaksiController::class, 'tambah']);
    Route::post('/kasir/transaksi/create/bayar', [KasirTransaksiController::class, 'bayar']);
    Route::resource('/kasir/penjualan', KasirPenjualanController::class);
});
