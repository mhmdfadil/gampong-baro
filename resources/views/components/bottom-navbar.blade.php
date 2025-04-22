<nav class="bottom-navbar">
    <div class="container">
        <a href="{{ route('beranda') }}" class="bottom-nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">
            <div class="nav-icon">
                <i class="fas fa-home"></i>
            </div>
            <span>Beranda</span>
        </a>
        <a href="{{ route('pengaduan') }}" class="bottom-nav-link {{ request()->routeIs('pengaduan') || request()->routeIs('pengaduan.*') ? 'active' : '' }}">
            <div class="nav-icon">
                <i class="fas fa-comment-alt"></i>
            </div>
            <span>Pengaduan</span>
        </a>
        <a href="{{ route('berita') }}" class="bottom-nav-link {{ request()->routeIs('berita') ? 'active' : '' }}">
            <div class="nav-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <span>Berita</span>
        </a>
        <a href="{{ route('belanja') }}" class="bottom-nav-link {{ request()->routeIs('belanja') ? 'active' : '' }}">
            <div class="nav-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <span>Belanja</span>
        </a>
    </div>
</nav>