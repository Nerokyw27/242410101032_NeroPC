<!-- HEADER -->
<header id="app-header">
  <div class="header-brand">
    <img src="{{ asset('images/Logo Sementara.png') }}" alt="Logo NeroPC" width="48" height="48">
    <div class="header-text">
      <h1>NeroPC</h1>
      <p>Sistem Informasi Penjualan PC Rakitan</p>
    </div>
  </div>
  <nav aria-label="Navigasi Utama">
    <ul>
      <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <span class="nav-icon">📊</span> Dashboard
      </a></li>
      <li><a href="{{ route('tentang') }}" class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}">
        <span class="nav-icon">ℹ️</span> Tentang
      </a></li>
      <li><a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}">
        <span class="nav-icon">📞</span> Kontak
      </a></li>
    </ul>
  </nav>
</header>
