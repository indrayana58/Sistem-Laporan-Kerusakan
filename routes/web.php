<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\AuthController;

// Admin
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\PelaporanController as AdminPelaporanController;
use App\Http\Controllers\admin\RiwayatController as AdminRiwayatController;
use App\Http\Controllers\admin\RekapController as AdminRekapController;

// User
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\PelaporanController as UserPelaporanController;
use App\Http\Controllers\user\RiwayatController as UserRiwayatController;


Route::get('/', function () {
    return view('home');
});

// Auth Form
Route::get('auth/login', [AuthController::class, 'index'])->name('formLogin');
Route::get('auth/register', [AuthController::class, 'registerForm'])->name('formRegister');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');

// Auth Proses
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

// Admin
Route::middleware(['auth',  'role:admin'])->group(
    function () {
        // Dashboard
        Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // Pelaporan
        Route::get('admin/pelaporan', [AdminPelaporanController::class, 'index'])->name('admin.pelaporan');
        Route::get('laporan', [AdminPelaporanController::class, 'index'])->name('laporan');
        Route::patch('/verifikasi-laporan/{id}', [AdminPelaporanController::class, 'verifikasiLaporan'])->name('verifikasi.laporan');
        Route::patch('/batalkan-verifikasi-laporan/{id}', [AdminPelaporanController::class, 'batalkanVerifikasiLaporan'])->name('batalkan.verifikasi.laporan');
        Route::delete('/hapus-laporan/{id}', [AdminPelaporanController::class, 'hapusLaporan'])->name('hapus.laporan');

        // Riwayat
        Route::get('admin/riwayat', [AdminRiwayatController::class, 'index'])->name('admin.riwayat');

        // Rekap
        Route::get('admin/rekap', [AdminRekapController::class, 'index'])->name('admin.rekap');
        Route::post('admin/rekap/export', [AdminRekapController::class, 'export'])->name('admin.rekap.export');
    }
);

// User
Route::middleware(['auth',  'role:user'])->group(
    function () {
        // Dashboard
        Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

        // Laporan
        Route::get('user/pelaporan', [UserPelaporanController::class, 'index'])->name('user.pelaporan');
        Route::post('user/pelaporan', [UserPelaporanController::class, 'store'])->name('storeLaporan');

        // Riwayat
        Route::get('user/riwayat', [UserRiwayatController::class, 'index'])->name('user.riwayat');
        Route::delete('user/laporan/{id}', [UserRiwayatController::class, 'destroy'])->name('user.laporan.destroy');
    }
);
