<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PembayaranAsramaController;
use App\Http\Controllers\PembayaranSiswaController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Models\PembayaranSiswa;
use Illuminate\Support\Facades\Route;
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


Auth::routes(['register' => true]);
Route::middleware('auth')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index');
    Route::post('/change-password',[ChangePasswordController::class,'update'])->name('change-password.update');
    Route::get('cetak-dashboard',[DashboardController::class,'cetakdashboard'])->name('cetak-dashboard');

    Route::resource('users',UserController::class)->except('show');

    // guru
     Route::prefix('guru')->middleware('guru')->group(function(){
        Route::resource('ekstrakulikuler',EkstrakulikulerController::class)->except('show');
        Route::resource('aktivitas',AktivitasController::class)->except('show');
        Route::resource('siswa',SiswaController::class)->except('show');
        Route::resource('absensi',AbsenController::class)->except('show');
        Route::get('cari-absensi',[AbsenController::class,'index'])->name('cari-absensi');
        Route::get('cari-aktivitas',[AktivitasController::class,'index'])->name('cari-aktivitas');
        Route::get('cari-siswa',[SiswaController::class,'index'])->name('cari-siswa');
        Route::get('cari-ekstrakurikuler',[EkstrakulikulerController::class,'index'])->name('cari-ekstrakurikuler');
        Route::get('cetak-data',[BukuController::class,'cetakdata'])->name('cetak-data');
    });

    // bendaharawan
    Route::prefix('bendaharawan')->middleware('bendaharawan')->group(function(){
        Route::resource('metode-pembayaran',MetodePembayaranController::class)->except('show');
        Route::resource('pembayaran-asrama',PembayaranAsramaController::class)->except('show');
        Route::get('pembayaran-siswa/{id}/download',[PembayaranSiswaController::class,'download'])->name('pembayaran-siswa.download');
        Route::resource('pembayaran-siswa',PembayaranSiswaController::class)->except('show');
    });

    // pustakawan
    Route::prefix('pustakawan')->middleware('pustakawan')->group(function(){
        Route::resource('buku',BukuController::class)->except('show');
        Route::resource('peminjaman-buku',PeminjamanBukuController::class)->except('show','create','store');
    });


    // siswa
    Route::prefix('siswa')->group(function(){
        Route::get('/login',[LoginController::class,'siswa'])->name('login-siswa');
        Route::get('list-aktivitas',[PageController::class,'list_aktivitas'])->name('list-aktivitas.index');
        Route::get('cari-aktivitas',[PageController::class,'list_aktivitas'])->name('cari-aktivitas');
        Route::get('list-aktivitas/{id}',[PageController::class,'list_aktivitas_detail'])->name('list-aktivitas.show');
        Route::get('cari-ekstrakulikuler',[PageController::class,'list_ekstrakulikuler'])->name('cari-ekstrakulikuler');
        Route::get('list-ekstrakulikuler',[PageController::class,'list_ekstrakulikuler'])->name('list-ekstrakulikuler.index');
        Route::get('list-ekstrakulikuler/{id}',[PageController::class,'list_ekstrakulikuler_detail'])->name('list-ekstrakulikuler.show');
        Route::get('list-buku',[PageController::class,'list_buku'])->name('list-buku.index');
        Route::get('list-buku/{id}',[PageController::class,'list_buku_detail'])->name('list-buku.show');
        Route::get('list-peminjaman-buku',[PageController::class,'list_peminjaman_buku'])->name('list-peminjaman-buku.index');
        Route::get('list-peminjaman-buku/{buku_id}',[PageController::class,'peminjaman_buku_create'])->name('list-peminjaman-buku.create');
        Route::post('list-peminjaman-buku/create/{buku_id}',[PageController::class,'peminjaman_buku_store'])->name('list-peminjaman-buku.store');
        // absensi
        Route::get('list-absensi',[PageController::class,'list_absensi'])->name('list-absensi.index');
        Route::get('list-absensi/create',[PageController::class,'list_absensi_create'])->name('list-absensi.create');
        Route::post('list-absensi/create',[PageController::class,'list_absensi_store'])->name('list-absensi.store');

        // pembayaran
        Route::get('list-pembayaran-asrama',[PageController::class,'list_pembayaran_asrama'])->name('list-pembayaran-asrama.index');

        Route::post('list-pembayaran-siswa',[PageController::class,'list_pembayaran_siswa_store'])->name('list-pembayaran-siswa.store');
    });

    Route::get('notifikasi',[NotifikasiController::class,'index'])->name('notifikasi.index');
    Route::post('notifikasi/update',[NotifikasiController::class,'update'])->name('notifikasi.update');
});

Route::post('login-proses',[AuthController::class,'proses_login'])->name('login-proses');
Route::post('register-proses',[AuthController::class,'proses_register'])->name('register-proses');
