<?php

use Illuminate\Support\Facades\Route;

// ── FRONTEND Controllers ──
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TentangKamiController;
use App\Http\Controllers\Frontend\FasilitasController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\UlasanController;

// ── ADMIN Controllers ──
use App\Http\Controllers\Admin\DashboardController;

/*
|==========================================================================
| FRONTEND ROUTES (Publik)
|==========================================================================
*/
Route::get('/',            [HomeController::class,        'index'])->name('home');
Route::get('/tentang-kami',[TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/fasilitas',   [FasilitasController::class,   'index'])->name('fasilitas');
Route::get('/event',       [EventController::class,       'index'])->name('event');
Route::get('/ulasan',      [UlasanController::class,      'index'])->name('ulasan');
Route::post('/ulasan',     [UlasanController::class,      'store'])->name('ulasan.store');
Route::get('/kontak',      [KontakController::class,      'index'])->name('kontak');
Route::post('/kontak',     [KontakController::class,      'store'])->name('kontak.store');
Route::post('/fasilitas/ulasan', [FasilitasController::class, 'storeUlasan'])->name('fasilitas.ulasan');

/*
|==========================================================================
| ADMIN ROUTES (Perlu Auth)
|==========================================================================
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

});

/*
|==========================================================================
| AUTH ROUTES (Login, Register, dll — dari Breeze/Jetstream)
|==========================================================================
*/
require __DIR__.'/auth.php';
