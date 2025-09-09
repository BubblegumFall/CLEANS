<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\User\UserLayananController;
use App\Http\Controllers\User\UserTransaksiController;
use App\Http\Controllers\UserProfileController;

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
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
    Route::resource('layanan', App\Http\Controllers\LayananController::class);
    Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
    Route::resource('laporan', App\Http\Controllers\LaporanController::class);

    // Update payment status
        Route::post('transaksi/{id}/payment-status', [LayananController::class, 'updatePaymentStatus'])
            ->name('transaksi.updatePaymentStatus');
    });

/*
|--------------------------------------------------------------------------
| User/Pelanggan Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        // Dashboard User
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
        
        // Route profil
        Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
        
        // Resource Controllers
        Route::resources([
            'transaksi' => UserTransaksiController::class,
        ]);
    });