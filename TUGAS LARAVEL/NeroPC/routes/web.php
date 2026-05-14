<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin only
    Route::middleware(['admin'])->group(function () {
        Route::resource('pc', \App\Http\Controllers\PcController::class);
    });

    // Customer / All authenticated
    Route::get('/katalog', [\App\Http\Controllers\KatalogController::class, 'index'])->name('katalog.index');
    Route::get('/katalog/{pc}', [\App\Http\Controllers\KatalogController::class, 'show'])->name('katalog.show');

    Route::view('/tentang', 'tentang')->name('tentang');
    Route::view('/kontak', 'kontak')->name('kontak');
});

require __DIR__.'/auth.php';
