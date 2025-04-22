<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('beranda') }}">
            <span class="logo-icon"><i class="fas fa-leaf"></i></span>
            <span class="logo-text">Gampong<span>Baro</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu Desa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><i class="fas fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('infografis.*') || request()->routeIs('infografis') ? 'active' : '' }}" href="{{ route('infografis.penduduk') }}">Infografis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('belanja') ? 'active' : '' }}" href="{{ route('belanja') }}">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ppid') ? 'active' : '' }}" href="{{ route('ppid') }}">PPID</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>