@extends('layouts.app')

@section('title', 'NeroPC - Sistem Informasi Penjualan PC Rakitan')

@section('content')

    <!-- STATISTIK DASHBOARD -->
    <section id="statistik-section" class="stats-section">
      <div class="section-header">
        <h2>📊 Dashboard Penjualan</h2>
      </div>
      <div class="stats-grid">
        <div class="stat-card stat-total">
          <div class="stat-icon">🖥️</div>
          <div class="stat-info">
            <span class="stat-label">Total Produk PC</span>
            <span class="stat-number" id="stat-total-produk">0</span>
          </div>
        </div>
        <div class="stat-card stat-stock">
          <div class="stat-icon">📦</div>
          <div class="stat-info">
            <span class="stat-label">Jumlah Stok</span>
            <span class="stat-number" id="stat-jumlah-stok">0</span>
          </div>
        </div>
        <div class="stat-card stat-sold">
          <div class="stat-icon">🔴</div>
          <div class="stat-info">
            <span class="stat-label">Stok Habis</span>
            <span class="stat-number" id="stat-pc-terjual">0</span>
          </div>
        </div>
        <div class="stat-card stat-revenue">
          <div class="stat-icon">💰</div>
          <div class="stat-info">
            <span class="stat-label">Nilai Inventaris</span>
            <span class="stat-number" id="stat-total-pendapatan">Rp 0</span>
          </div>
        </div>
        <div class="stat-card stat-orders">
          <div class="stat-icon">📊</div>
          <div class="stat-info">
            <span class="stat-label">Total Unit Stok</span>
            <span class="stat-number" id="stat-pesanan-bulan">0</span>
          </div>
        </div>
        <div class="stat-card stat-warning">
          <div class="stat-icon">⚠️</div>
          <div class="stat-info">
            <span class="stat-label">Stok Menipis (&lt;5)</span>
            <span class="stat-number" id="stat-stok-menipis">0</span>
          </div>
        </div>
      </div>
    </section>

    <!-- FORM TAMBAH/EDIT PC -->
    <section id="form-section" class="form-section">
      <div class="section-header">
        <h2 id="form-title">🖥️ Tambah Produk PC Baru</h2>
        <button type="button" class="btn-reset-form" id="btn-reset-form" style="display:none;">
          ✕ Batalkan Edit
        </button>
      </div>

      <form id="form-pc" novalidate>
        <div class="form-section-label">Informasi Utama</div>
        <div class="form-grid form-grid-3">
          <div class="form-group">
            <label for="kode-pc">Kode PC <span class="required">*</span></label>
            <input type="text" id="kode-pc" name="kodePc" placeholder="cth: NPC-001" autocomplete="off">
            <span class="error-msg" id="error-kode"></span>
          </div>
          <div class="form-group">
            <label for="nama-pc">Nama Produk PC <span class="required">*</span></label>
            <input type="text" id="nama-pc" name="namaPc" placeholder="cth: NeroPC Entry Gaming" autocomplete="off">
            <span class="error-msg" id="error-nama"></span>
          </div>
          <div class="form-group">
            <label for="kategori-pc">Kategori <span class="required">*</span></label>
            <select id="kategori-pc" name="kategori">
              <option value="">-- Pilih Kategori --</option>
              <option value="Entry Level">Entry Level</option>
              <option value="Mid Range">Mid Range</option>
              <option value="High End">High End</option>
            </select>
            <span class="error-msg" id="error-kategori"></span>
          </div>
        </div>

        <div class="form-section-label">Spesifikasi Komponen</div>
        <div class="form-grid form-grid-3">
          <div class="form-group">
            <label for="prosesor-pc">Prosesor <span class="required">*</span></label>
            <input type="text" id="prosesor-pc" name="prosesor" placeholder="cth: Intel Core i5-13400F" autocomplete="off">
            <span class="error-msg" id="error-prosesor"></span>
          </div>
          <div class="form-group">
            <label for="vga-pc">VGA / Kartu Grafis <span class="required">*</span></label>
            <input type="text" id="vga-pc" name="vga" placeholder="cth: NVIDIA RTX 4060" autocomplete="off">
            <span class="error-msg" id="error-vga"></span>
          </div>
          <div class="form-group">
            <label for="ram-pc">RAM <span class="required">*</span></label>
            <input type="text" id="ram-pc" name="ram" placeholder="cth: 16GB DDR5" autocomplete="off">
            <span class="error-msg" id="error-ram"></span>
          </div>
        </div>
        <div class="form-grid form-grid-3">
          <div class="form-group">
            <label for="storage-pc">Storage <span class="required">*</span></label>
            <input type="text" id="storage-pc" name="storage" placeholder="cth: 512GB NVMe SSD" autocomplete="off">
            <span class="error-msg" id="error-storage"></span>
          </div>
          <div class="form-group">
            <label for="motherboard-pc">Motherboard <span class="required">*</span></label>
            <input type="text" id="motherboard-pc" name="motherboard" placeholder="cth: ASUS B760M-A" autocomplete="off">
            <span class="error-msg" id="error-motherboard"></span>
          </div>
          <div class="form-group">
            <label for="psu-pc">Power Supply (PSU) <span class="required">*</span></label>
            <input type="text" id="psu-pc" name="psu" placeholder="cth: Seasonic 650W 80+ Gold" autocomplete="off">
            <span class="error-msg" id="error-psu"></span>
          </div>
        </div>
        <div class="form-grid form-grid-3">
          <div class="form-group">
            <label for="casing-pc">Casing <span class="required">*</span></label>
            <input type="text" id="casing-pc" name="casing" placeholder="cth: NZXT H5 Flow" autocomplete="off">
            <span class="error-msg" id="error-casing"></span>
          </div>
          <div class="form-group">
            <label for="harga-pc">Harga (Rp) <span class="required">*</span></label>
            <input type="number" id="harga-pc" name="harga" placeholder="cth: 8500000" min="0">
            <span class="error-msg" id="error-harga"></span>
          </div>
          <div class="form-group">
            <label for="stok-pc">Stok <span class="required">*</span></label>
            <input type="number" id="stok-pc" name="stok" placeholder="cth: 10" min="0">
            <span class="error-msg" id="error-stok"></span>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn-primary" id="btn-submit">
            <span class="btn-icon">+</span> Tambah Produk PC
          </button>
        </div>
      </form>
    </section>

    <!-- DAFTAR PRODUK PC -->
    <section id="daftar-section" class="daftar-section">
      <div class="section-header">
        <h2>📋 Daftar Produk PC</h2>
      </div>

      <div class="toolbar">
        <div class="search-box">
          <span class="search-icon">🔍</span>
          <input type="text" id="search-input" placeholder="Cari berdasarkan nama atau kode PC..." autocomplete="off">
        </div>
        <div class="filter-box">
          <label for="filter-kategori">Kategori:</label>
          <select id="filter-kategori">
            <option value="">Semua</option>
            <option value="Entry Level">Entry Level</option>
            <option value="Mid Range">Mid Range</option>
            <option value="High End">High End</option>
          </select>
        </div>
      </div>

      <div class="table-wrapper" id="table-wrapper">
        <table id="tabel-pc">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode</th>
              <th scope="col">Nama PC</th>
              <th scope="col">Kategori</th>
              <th scope="col">Spesifikasi</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody id="tbody-pc">
          </tbody>
        </table>
      </div>

      <div class="empty-state" id="empty-state">
        <div class="empty-icon">🖥️</div>
        <p>Belum ada produk PC. Tambahkan produk pertama Anda!</p>
      </div>
    </section>

@endsection