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

/*
|--------------------------------------------------------------------------
| Halaman Awal & Auth
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
});

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

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

        // Resource Admin
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('laporan', LaporanController::class);
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

        // Resource User
        Route::resource('layanan', UserLayananController::class);
        Route::resource('transaksi', UserTransaksiController::class);
    });


    Route::get('/pelanggan/create', [PelangganController::class, 'create'])
    ->name('pelanggan.create')
    ->middleware(['auth', 'role:admin']);

    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pelanggan', PelangganController::class);
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('layanan', LayananController::class);
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');
    Route::put('/profile/photo', 'ProfileController@updatePhoto')->name('profile.photo.update');
    Route::put('/password', 'ProfileController@updatePassword')->name('password.update');
});


