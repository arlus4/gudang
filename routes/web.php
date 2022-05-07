<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\KasirLoginController;
use App\Http\Controllers\Admin\AdminAgenController;
use App\Http\Controllers\Agen\AgenProdukController;
use App\Http\Controllers\Admin\AdminKasirController;
use App\Http\Controllers\Agen\AgenProfileController;
use App\Http\Controllers\Kasir\KasirProdukController;
use App\Http\Controllers\Admin\AdminPegawaiController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Agen\AgenDashboardController;
use App\Http\Controllers\Agen\AgenPelangganController;
use App\Http\Controllers\Kasir\KasirProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPelangganController;
use App\Http\Controllers\Kasir\KasirDashboardController;
use App\Http\Controllers\Admin\AdminProdukStokController;
use App\Http\Controllers\Admin\AdminProdukHargaController;

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
});

// Login Admin
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);
// Route untuk Admin
Route::middleware(['auth:sanctum', 'verified', 'isadmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/profil', AdminProfileController::class);
    Route::resource('/admin/pegawai/admin', AdminPegawaiController::class);
    Route::get('/admin/pegawai/agen/agenSlug', [AdminAgenController::class, 'agenSlug']);
    Route::resource('/admin/pegawai/agen', AdminAgenController::class);
    Route::get('/admin/pegawai/kasir/kasirSlug', [AdminKasirController::class, 'kasirSlug']);
    Route::resource('/admin/pegawai/kasir', AdminKasirController::class);
    Route::get('/admin/pelanggan/pelangganSlug', [AdminPelangganController::class, 'pelangganSlug']);
    Route::resource('/admin/pelanggan', AdminPelangganController::class);
    Route::post('/admin/pelanggan/{id}', [AdminPelangganController::class, 'approve'])->name('admin.pelanggan.approve');
    Route::resource('/admin/produk/stok', AdminProdukStokController::class);
    Route::resource('/admin/produk/harga', AdminProdukHargaController::class);
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
});
