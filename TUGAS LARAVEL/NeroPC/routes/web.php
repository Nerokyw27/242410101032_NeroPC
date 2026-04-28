<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PcController;
use App\Http\Controllers\DashboardController;

//Route NeroPC
Route::get('/', [PcController::class, 'index'])->name('home');
Route::get('/tambah-pc', [PcController::class, 'create'])->name('pc.create');
Route::get('/daftar-produk', [PcController::class, 'list'])->name('pc.index');


//Aktivitas Mandiri 2
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::view('/tentang', 'tentang')->name('tentang');
Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);
