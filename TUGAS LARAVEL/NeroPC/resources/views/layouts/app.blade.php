<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="NeroPC - Sistem Informasi Penjualan PC Rakitan berbasis web. Kelola produk PC rakitan dengan mudah.">
  <title>@yield('title', 'NeroPC - Sistem Informasi Penjualan PC Rakitan')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- HEADER -->
  <header id="app-header">
    <div class="header-brand">
      <img src="Logo Sementara.png" alt="Logo NeroPC" width="48" height="48">
      <div class="header-text">
        <h1>NeroPC</h1>
        <p>Sistem Informasi Penjualan PC Rakitan</p>
      </div>
    </div>
    <nav aria-label="Navigasi Utama">
      <ul>
        <li><a href="#statistik-section" class="nav-link active" data-section="statistik-section">
          <span class="nav-icon">📊</span> Dashboard
        </a></li>
        <li><a href="#form-section" class="nav-link" data-section="form-section">
          <span class="nav-icon">🖥️</span> Tambah PC
        </a></li>
        <li><a href="#daftar-section" class="nav-link" data-section="daftar-section">
          <span class="nav-icon">📋</span> Daftar Produk
        </a></li>
      </ul>
    </nav>
  </header>

  <!-- HERO BANNER -->
  <section class="hero" id="hero-banner">
    <div class="hero-bg-shapes">
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
    </div>
    <div class="hero-content">
      <h2>Sistem Informasi Penjualan PC Rakitan</h2>
      <p>Kelola produk PC rakitan, pantau pesanan, dan lacak stok dengan sistem informasi penjualan yang modern dan efisien.</p>
    </div>
  </section>

  <!-- MAIN CONTENT -->
  <main class="main-container">
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer id="kontak">
    <section class="footer-grid">

      <section class="footer-col">
        <div class="footer-brand">
          <img src="Logo Sementara.png" alt="Logo NeroPC" width="40" height="40">
          <h3>NeroPC</h3>
        </div>
        <p>Platform penjualan dan perakitan PC terpercaya di Indonesia sejak 2020.</p>
      </section>

      <nav class="footer-col" aria-label="Menu Footer">
        <h3>Menu</h3>
        <ul>
          <li><a href="#statistik-section">Dashboard</a></li>
          <li><a href="#form-section">Tambah PC</a></li>
          <li><a href="#daftar-section">Daftar Produk</a></li>
        </ul>
      </nav>

      <address class="footer-col">
        <h3>Hubungi Kami</h3>
        <p>Email: admin@neropc.id</p>
        <p>Telepon: 0812-3456-7890</p>
        <p>Alamat: Jl. Teknologi Raya No. 88,<br>Surabaya, Jawa Timur</p>
        <p>Jam: Senin - Sabtu, 08.00 - 20.00 WIB</p>
      </address>

    </section>
    <p class="footer-copy">&copy; 2026 NeroPC. All rights reserved.</p>
  </footer>

  <!-- TOAST NOTIFICATION -->
  <div id="toast-container"></div>

  <!-- MODAL HAPUS -->
  <div class="modal-overlay" id="modal-overlay">
    <div class="modal-box">
      <div class="modal-icon">🗑️</div>
      <h3>Hapus Produk PC?</h3>
      <p id="modal-message">Apakah Anda yakin ingin menghapus produk ini?</p>
      <div class="modal-actions">
        <button class="btn-modal-cancel" id="modal-cancel">Batalkan</button>
        <button class="btn-modal-confirm" id="modal-confirm">Ya, Hapus</button>
      </div>
    </div>
  </div>

</body>
</html>
