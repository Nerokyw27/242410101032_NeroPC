<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PcController extends Controller
{
    /**
     * Tampilkan halaman utama (Dashboard + Form + Daftar Produk)
     * Semua CRUD dihandle oleh JavaScript (localStorage) di client-side.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Tampilkan halaman form tambah PC
     * (scroll otomatis ke form section via anchor)
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Tampilkan halaman daftar produk PC
     * (scroll otomatis ke daftar section via anchor)
     */
    public function list()
    {
        return view('dashboard');
    }
}
