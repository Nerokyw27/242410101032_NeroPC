<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PcController;
use App\Http\Controllers\DashboardController;

//Route NeroPC
Route::get('/', [PcController::class, 'index'])->name('dashboard');
Route::get('/tambah-pc', [PcController::class, 'create'])->name('pc.create');
Route::get('/daftar-produk', [PcController::class, 'list'])->name('pc.index');


Route::get('/test-flash', function () {
    return redirect()->route('dashboard')->with('success', 'Pesan ini adalah contoh Flash Session yang berhasil dipanggil!');
});

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
