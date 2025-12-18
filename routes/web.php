<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\LembagaDesaController;
use App\Http\Controllers\PerangkatDesaController;
use App\Http\Controllers\AnggotaLembagaController;
use App\Http\Controllers\JabatanLembagaController;
use App\Http\Controllers\InformasiUmumController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/informasi-umum', [InformasiUmumController::class, 'publik'])
    ->name('informasi_umum.publik');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('warga', WargaController::class);
    Route::resource('perangkat', PerangkatDesaController::class);
    Route::resource('lembaga', LembagaDesaController::class);
    Route::resource('jabatan_lembaga', JabatanLembagaController::class);
    Route::resource('anggota_lembaga', AnggotaLembagaController::class);

    // ADMIN - INFORMASI UMUM
    Route::resource('informasi_umum', InformasiUmumController::class)
        ->except(['show']);
});
Route::resource('informasi_umum', InformasiUmumController::class)
    ->except(['show']);
