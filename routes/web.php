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
use App\Http\Controllers\Admin\FasilitasAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\UlasanAdminController;
use App\Http\Controllers\Admin\KontakAdminController;

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
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,super_admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Fasilitas
        Route::resource('fasilitas', FasilitasAdminController::class);

        // Event
        Route::resource('event', EventAdminController::class);

        // Ulasan
        Route::get('ulasan', [UlasanAdminController::class, 'index'])->name('ulasan.index');
        Route::patch('ulasan/{ulasan}/approve', [UlasanAdminController::class, 'approve'])->name('ulasan.approve');
        Route::patch('ulasan/{ulasan}/reject', [UlasanAdminController::class, 'reject'])->name('ulasan.reject');
        Route::delete('ulasan/{ulasan}', [UlasanAdminController::class, 'destroy'])->name('ulasan.destroy');

        // Kontak
        Route::get('kontak', [KontakAdminController::class, 'index'])->name('kontak.index');
        Route::get('kontak/{kontak}', [KontakAdminController::class, 'show'])->name('kontak.show');
        Route::patch('kontak/{kontak}/balas', [KontakAdminController::class, 'balas'])->name('kontak.balas');
        Route::delete('kontak/{kontak}', [KontakAdminController::class, 'destroy'])->name('kontak.destroy');

    });

/*
|==========================================================================
| AUTH ROUTES (Login, Register, dll — dari Breeze/Jetstream)
|==========================================================================
*/
require __DIR__.'/auth.php';
