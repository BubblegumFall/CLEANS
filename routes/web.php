<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\User\UserLayananController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\User\UserTransaksiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;


/*
|--------------------------------------------------------------------------
| Halaman Awal & Authentication Routes
|--------------------------------------------------------------------------
*/
// Halaman Landing
Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');




// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    // Layanan Routes
    Route::resource('/layanan', App\Http\Controllers\Admin\LayananController::class);

    // Transaksi Routes
    Route::resource('transaksi', AdminTransaksiController::class);
    Route::post('transaksi/{id}/payment', [AdminTransaksiController::class, 'confirmPayment'])
        ->name('transaksi.payment');

    // Update status transaksi jadi lunas
    Route::put('/transaksi/{id}/lunas', [App\Http\Controllers\Admin\TransaksiController::class, 'markAsLunas'])
        ->name('transaksi.lunas');

    // Laporan Routes
    Route::get('/laporan', [App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export', [App\Http\Controllers\Admin\LaporanController::class, 'export'])->name('laporan.export');
});

/*
|--------------------------------------------------------------------------
| User/Pelanggan Routes
|--------------------------------------------------------------------------
*/
// User Routes
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard User
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
    // Tambahkan route untuk profil user
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::resource('transaksi', UserTransaksiController::class);
    Route::post('transaksi/{id}/pickup', [UserTransaksiController::class, 'pickup'])
        ->name('transaksi.pickup');
});