<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanpersediaanController;
use App\Http\Controllers\PbarangController;
use App\Http\Controllers\PproduksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route::get('/', function () {
//     return view('home');
// })->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/buku', [BukuController::class, 'index'])->middleware('auth');
Route::post('/buku', [BukuController::class, 'store'])->middleware('auth');
Route::get('/buku-add', [BukuController::class, 'create'])->middleware('auth');
Route::get('/buku-edit/{id}', [BukuController::class, 'edit'])->middleware('auth');
Route::put('/buku/{id}', [BukuController::class, 'update'])->middleware('auth');
Route::get('/buku-delete/{id}', [BukuController::class, 'delete'])->middleware('auth');
Route::delete('/buku-destroy/{id}', [BukuController::class, 'destroy'])->middleware('auth');

Route::get('/barangmasuk', [BarangmasukController::class, 'index'])->middleware('auth');
Route::post('/barangmasuk', [BarangmasukController::class, 'store'])->middleware('auth');
Route::get('/barangmasuk-add', [BarangmasukController::class, 'create'])->middleware('auth');
Route::post('/barangmasuk', [BarangmasukController::class, 'store'])->middleware('auth');
Route::get('/barangmasuk-edit/{id}', [BarangmasukController::class, 'edit'])->middleware('auth');
Route::put('/barangmasuk/{id}', [BarangmasukController::class, 'update'])->middleware('auth');
Route::get('/barangmasuk-delete/{id}', [BarangmasukController::class, 'delete'])->middleware('auth');
Route::delete('/barangmasuk-destroy/{id}', [BarangmasukController::class, 'destroy'])->middleware('auth');

Route::get('/barangkeluar', [BarangkeluarController::class, 'index'])->middleware('auth');
Route::post('/barangkeluar', [BarangkeluarController::class, 'store'])->middleware('auth');
Route::get('/barangkeluar-add', [BarangkeluarController::class, 'create'])->middleware('auth');
Route::post('/barangkeluar', [BarangkeluarController::class, 'store'])->middleware('auth');
Route::get('/barangkeluar-edit/{id}', [BarangkeluarController::class, 'edit'])->middleware('auth');
Route::put('/barangkeluar/{id}', [BarangkeluarController::class, 'update'])->middleware('auth');
Route::get('/barangkeluar-delete/{id}', [BarangkeluarController::class, 'delete'])->middleware('auth');
Route::delete('/barangkeluar-destroy/{id}', [BarangkeluarController::class, 'destroy'])->middleware('auth');

Route::get('/permintaanbarang', [PbarangController::class, 'index'])->middleware('auth');
Route::post('/permintaanbarang', [PbarangController::class, 'store'])->middleware('auth');
Route::get('/permintaanbarang-add', [PbarangController::class, 'create'])->middleware('auth');
Route::post('/permintaanbarang', [PbarangController::class, 'store'])->middleware('auth');
Route::get('/permintaanbarang-edit/{id}', [PbarangController::class, 'edit'])->middleware('auth');
Route::put('/permintaanbarang/{id}', [PbarangController::class, 'update'])->middleware('auth');
Route::get('/permintaanbarang-delete/{id}', [PbarangController::class, 'delete'])->middleware('auth');
Route::delete('/permintaanbarang-destroy/{id}', [PbarangController::class, 'destroy'])->middleware('auth');

Route::get('/permintaanproduksi', [PproduksiController::class, 'index'])->middleware('auth');
Route::post('/permintaanproduksi', [PproduksiController::class, 'store'])->middleware('auth');
Route::get('/permintaanproduksi-add', [PproduksiController::class, 'create'])->middleware('auth');
Route::post('/permintaanproduksi', [PproduksiController::class, 'store'])->middleware('auth');
Route::get('/permintaanproduksi-edit/{id}', [PproduksiController::class, 'edit'])->middleware('auth');
Route::put('/permintaanproduksi/{id}', [PproduksiController::class, 'update'])->middleware('auth');
Route::get('/permintaanproduksi-delete/{id}', [PproduksiController::class, 'delete'])->middleware('auth');
Route::delete('/permintaanproduksi-destroy/{id}', [PproduksiController::class, 'destroy'])->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::post('/user', [UserController::class, 'store'])->middleware('auth');
Route::get('/user-add', [UserController::class, 'create'])->middleware('auth');
Route::get('/user-edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware('auth');
Route::get('/user-delete/{id}', [UserController::class, 'delete'])->middleware('auth');
Route::delete('/user-destroy/{id}', [UserController::class, 'destroy'])->middleware('auth');

Route::get('/laporanpersediaan', [LaporanpersediaanController::class, 'index'])->middleware('auth');
Route::get('/cetaklaporanpersediaanform', [LaporanpersediaanController::class, 'cetakForm'])->middleware('auth');
Route::get('/cetak-laporanpersediaan-pertanggal/{tglawal}/{tglakhir}', [LaporanpersediaanController::class, 'cetakPertanggal'])->middleware('auth');

Route::get('/laporanbarang', [LaporanpersediaanController::class, 'laporanb'])->middleware('auth');
Route::get('/cetak-laporanbarang/',
    [LaporanpersediaanController::class, 'cetakb'])->middleware('auth');

Route::get('/laporanbarangmasuk', [LaporanpersediaanController::class, 'laporanbm'])->middleware('auth');
Route::get('/cetak-laporanbarangmasuk-pertanggal/{tglawal}/{tglakhir}',
    [LaporanpersediaanController::class, 'cetakPertanggalbmk'])->middleware('auth');

Route::get('/laporanbarangkeluar', [LaporanpersediaanController::class, 'laporanbk'])->middleware('auth');
Route::get('/cetak-laporanbarangkeluar-pertanggal/{tglawal}/{tglakhir}',
    [LaporanpersediaanController::class, 'cetakPertanggalbk'])->middleware('auth');

Route::get('/laporanpermintaanbarang', [PbarangController::class, 'laporan'])->middleware('auth');
Route::get('/cetak-laporanpermintaanbarang-pertanggal/{tglawal}/{tglakhir}',
    [PbarangController::class, 'cetakPertanggal'])->middleware('auth');

Route::get('/laporanpermintaanproduksi', [PproduksiController::class, 'laporan'])->middleware('auth');
Route::get('/cetak-laporanpermintaanproduksi-pertanggal/{tglawal}/{tglakhir}',
    [PproduksiController::class, 'cetakPertanggal'])->middleware('auth');



Route::group(['middleware' => 'web'], function () {
    Route::get('/login/petugas', 'PetugasAuth\LoginController@showLoginForm')->name('petugas.login');
    Route::post('/login/petugas', 'PetugasAuth\LoginController@login');
    // Tambahkan rute lainnya untuk autentikasi Petugas

    Route::get('/login/anggota', 'AnggotaAuth\LoginController@showLoginForm')->name('anggota.login');
    Route::post('/login/anggota', 'AnggotaAuth\LoginController@login');
    // Tambahkan rute lainnya untuk autentikasi Anggota
});
