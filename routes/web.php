<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LaporanPdfController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Pegawai\StatusController;
use App\Http\Controllers\PermintaanZoomController;
use App\Http\Controllers\Admin\ZoomAdminController;
use App\Http\Controllers\RegisterPegawaiController;
use App\Http\Controllers\Pimpinan\LaporanController;
use App\Http\Controllers\Admin\PeminjamanAdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboard;
use App\Http\Controllers\Pimpinan\DashboardController as PimpinanDashboard;

Route::get('/', function () {
    return view('login');
});


Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard-admin', [AdminDashboard::class, 'index'])->middleware('auth')->name('dashboard.admin');
Route::get('/dashboard-pegawai', [PegawaiDashboard::class, 'index'])->middleware('auth')->name('dashboard.pegawai');
Route::get('/dashboard-pimpinan', [PimpinanDashboard::class, 'index'])->middleware('auth')->name('dashboard.pimpinan');


Route::middleware(['auth'])->group(function () {
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/riwayat', [PeminjamanController::class, 'riwayat'])->name('peminjaman.riwayat');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/peminjaman', [PeminjamanAdminController::class, 'index'])->name('admin.peminjaman.index');
    Route::post('/admin/peminjaman/{id}/verifikasi', [PeminjamanAdminController::class, 'verifikasi'])->name('admin.peminjaman.verifikasi');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/zoom', [PermintaanZoomController::class, 'index'])->name('zoom.index');
    Route::get('/zoom/create', [PermintaanZoomController::class, 'create'])->name('zoom.create');
    Route::post('/zoom', [PermintaanZoomController::class, 'store'])->name('zoom.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/zoom', [ZoomAdminController::class, 'index'])->name('admin.zoom.index');
    Route::post('/admin/zoom/{id}/verifikasi', [ZoomAdminController::class, 'verifikasi'])->name('admin.zoom.verifikasi');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pimpinan/laporan', [LaporanController::class, 'index'])->name('pimpinan.laporan');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/laporan/pdf', [LaporanPdfController::class, 'generate'])->name('laporan.pdf');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/barang', [BarangController::class, 'index'])->name('admin.barang.index');
    Route::get('/admin/barang/create', [BarangController::class, 'create'])->name('admin.barang.create');
    Route::post('/admin/barang', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::delete('/admin/barang/{id}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/laporan', [LaporanPdfController::class, 'form'])->name('admin.laporan.form');
    Route::get('/admin/laporan/cetak', [LaporanPdfController::class, 'generate'])->name('admin.laporan.cetak');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai/status', [StatusController::class, 'index'])->name('pegawai.status');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/zoom/create', [PermintaanZoomController::class, 'create'])->name('zoom.create');
    Route::post('/zoom', [PermintaanZoomController::class, 'store'])->name('zoom.store');
});

Route::post('/admin/peminjaman/{id}/selesai', [PeminjamanAdminController::class, 'selesai'])->name('admin.peminjaman.selesai');
Route::post('/admin/zoom/{id}/selesai', [ZoomAdminController::class, 'selesai'])->name('admin.zoom.selesai');

Route::get('/register-pegawai', [RegisterPegawaiController::class, 'create'])->name('pegawai.register.form');
Route::post('/register-pegawai', [RegisterPegawaiController::class, 'store'])->name('pegawai.register.store');
Route::get('/register', [RegisterPegawaiController::class, 'formRegister'])->name('register');

// Untuk Pegawai
Route::middleware(['auth', 'role:pegawai'])->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// Untuk Admin Melihat Feedback
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback.index');
});
