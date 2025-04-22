@extends('components.main')

@section('hero-carousel')
<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1547981609-4b6bfe67ca0b" class="d-block w-100" alt="Gampong Baro">
            <div class="carousel-caption">
                <h1>Selamat Datang di Gampong Baro</h1>
                <p class="lead">Keseimbangan antara alam dan modernitas</p>
                <a href="#profil" class="btn btn-primary btn-explore">Jelajahi Desa</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35" class="d-block w-100" alt="Sawah Desa">
            <div class="carousel-caption">
                <h1>Keindahan Alam Pedesaan</h1>
                <p class="lead">Nikmati panorama alam yang menyejukkan</p>
                <a href="#infografis" class="btn btn-primary btn-explore">Lihat Infografis</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg" class="d-block w-100" alt="Kerajinan">
            <div class="carousel-caption">
                <h1>Produk Unggulan Desa</h1>
                <p class="lead">Kerajinan tangan berkualitas tinggi</p>
                <a href="#belanja" class="btn btn-primary btn-explore">Belanja Sekarang</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection

@section('content')
<style>
    /* Brutal Animation Styles */
    .menu-card {
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border-radius: 5px;
        background: rgba(255, 255, 255, 0.459);
        position: relative;
        overflow: hidden;
        animation: brutalEntry 0.8s cubic-bezier(0.5, 1.5, 0.5, 1.5) forwards;
        opacity: 0;
        transform: translateY(50px) rotate(15deg);
    }
    
    .menu-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .menu-card:hover {
        transform: translateY(-6px) scale(1.05) rotate(2deg) !important;
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        z-index: 10;
    }
    
    .menu-card:hover::after {
        opacity: 1;
    }
    
    .menu-card:hover .icon-wrapper {
        transform: scale(1.1) rotate(10deg) !important;
        animation: brutalPulse 0.5s infinite ease-in-out !important;
    }
    
    .text-xs {
        margin-top: 3px;
        font-size: 0.5rem;
    }
    
    @media (min-width: 768px) {
        #menu-cards {
            display: none !important;
        }
    }
    
    /* Brutal Entry Animation */
    @keyframes brutalEntry {
        0% { 
            opacity: 0; 
            transform: translateY(50px) rotate(15deg) scale(0.8);
        }
        70% {
            transform: translateY(-10px) rotate(-5deg) scale(1.05);
        }
        100% { 
            opacity: 1; 
            transform: translateY(0) rotate(0) scale(1); 
        }
    }
    
    /* Icon Pulse Animation */
    @keyframes brutalPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.15); }
        100% { transform: scale(1); }
    }
    
    .icon-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        transition: all 0.3s ease;
        animation: brutalPulse 2s infinite ease-in-out;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    
    /* Delay untuk tiap card */
    .menu-card:nth-child(1) { animation-delay: 3.3s; }
    .menu-card:nth-child(2) { animation-delay: 3.5s; }
    .menu-card:nth-child(3) { animation-delay: 3.7s; }
    .menu-card:nth-child(4) { animation-delay: 3.9s; }
    .menu-card:nth-child(5) { animation-delay: 4.1s; }
</style>

<section id="menu-cards" class="section py-4 bg-light d-md-none">
    <div class="container">
        <div class="d-flex flex-nowrap justify-content-between text-center" style="overflow-x: none; gap: 8px;">
            <!-- Berita Card -->
            <a href="#" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(13, 110, 253, 0.15) 0%, rgba(13, 110, 253, 0.3) 100%);">
                        <i class="fas fa-newspaper text-primary" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Berita</h6>
                </div>
            </a>
            
            <!-- Infografis Card -->
            <a href="#" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.15) 0%, rgba(25, 135, 84, 0.3) 100%);">
                        <i class="fas fa-chart-pie text-success" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Infografis</h6>
                </div>
            </a>
            
            <!-- Belanja Card -->
            <a href="#" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(220, 53, 69, 0.15) 0%, rgba(220, 53, 69, 0.3) 100%);">
                        <i class="fas fa-shopping-cart text-danger" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Belanja</h6>
                </div>
            </a>
            
            <!-- PPID Card -->
            <a href="#" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(255, 193, 7, 0.15) 0%, rgba(255, 193, 7, 0.3) 100%);">
                        <i class="fas fa-info-circle text-warning" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">PPID</h6>
                </div>
            </a>

            <!-- Pengaduan Card -->
            <a href="#" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(7, 197, 255, 0.15) 0%, rgba(7, 197, 255, 0.3) 100%);">
                        <i class="fas fa-envelope text-info" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Pengaduan</h6>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuCards = document.querySelectorAll('.menu-card');
        
        function checkIfInView() {
            menuCards.forEach((card, index) => {
                const cardTop = card.getBoundingClientRect().top;
                const cardBottom = card.getBoundingClientRect().bottom;
                
                // Check if any part of the card is in the viewport
                if (cardTop < window.innerHeight && cardBottom >= 0) {
                    if (!card.classList.contains('animate')) {
                        // Add delay based on index
                        setTimeout(() => {
                            card.classList.add('animate');
                        }, index * 100);
                    }
                }
            });
        }
        
        // Check on initial load
        checkIfInView();
        
        // Check when scrolling
        window.addEventListener('scroll', checkIfInView);
        
        // Also check when resizing (in case layout changes)
        window.addEventListener('resize', checkIfInView);
    });
    </script>



   <!-- Infografis Section -->
<section id="infografis" class="section py-4">
    <div class="container">
        <h2 class="section-title text-center mb-4"><span>Statistik Desa</span></h2>
        <div class="row g-3">
            <!-- Row 1 -->
            <div class="col-6 col-md-4">
                <div class="stat-card bg-primary-gradient animate__animated">
                    <div class="stat-content">
                        <h3>1,154</h3>
                        <p>Total Penduduk</p>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="stat-card bg-success-gradient animate__animated">
                    <div class="stat-content">
                        <h3>608</h3>
                        <p>Laki-Laki</p>
                        <div class="stat-icon">
                            <i class="fas fa-male"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="stat-card bg-danger-gradient animate__animated">
                    <div class="stat-content">
                        <h3>546</h3>
                        <p>Perempuan</p>
                        <div class="stat-icon">
                            <i class="fas fa-female"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Row 2 -->
            <div class="col-6 col-md-4">
                <div class="stat-card bg-warning-gradient animate__animated">
                    <div class="stat-content">
                        <h3>305</h3>
                        <p>Kepala Keluarga</p>
                        <div class="stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="stat-card bg-info-gradient animate__animated">
                    <div class="stat-content">
                        <h3>64</h3>
                        <p>Penduduk Sementara</p>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="stat-card bg-purple-gradient animate__animated">
                    <div class="stat-content">
                        <h3>14</h3>
                        <p>Mutasi Penduduk</p>
                        <div class="stat-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Infographic Styles */
    .stat-card {
        border-radius: 10px;
        padding: 18px 15px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
        cursor: pointer;
        opacity: 0;
        transform: translateY(20px);
    }
    
    .stat-card.animated {
        opacity: 1;
        transform: translateY(0);
    }
    
    .stat-card:hover {
        transform: scale(1.03) !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 10;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }
    
    .stat-card:hover::before {
        left: 100%;
    }
    
    .stat-content h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 3px;
    }
    
    .stat-content p {
        font-size: 0.85rem;
        opacity: 0.9;
        margin-bottom: 0;
    }
    
    .stat-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2.2rem;
        opacity: 0.2;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover .stat-icon {
        opacity: 0.4;
        transform: translateY(-50%) scale(1.1);
    }
    
    /* Gradient Backgrounds */
    .bg-primary-gradient {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #02aab0 0%, #00cdac 100%);
    }
    
    .bg-danger-gradient {
        background: linear-gradient(135deg, #ff758c 0%, #ff7eb3 100%);
    }
    
    .bg-warning-gradient {
        background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
    }
    
    .bg-info-gradient {
        background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
    }
    
    .bg-purple-gradient {
        background: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
    }
    
   
    
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stat-card');
        let hasAnimated = false; // Flag to track if animation has occurred

        const animateCards = () => {
            if (hasAnimated) return; // Prevent multiple animations
            
            hasAnimated = true;
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('animated');
                }, 150 * index);
            });
        };

        // Reset animation state when elements are not intersecting
        const resetAnimation = () => {
            if (!hasAnimated) return;
            cards.forEach(card => {
                card.classList.remove('animated');
            });
            hasAnimated = false;
        };

        // Intersection Observer with better configuration
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCards();
                } else {
                    resetAnimation();
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px' // Adds a bottom margin to trigger earlier
        });

        // Observe each card individually for better precision
        cards.forEach(card => {
            observer.observe(card);
        });

        // Improved touch handling with passive listener
        cards.forEach(card => {
            card.addEventListener('touchstart', function() {
                this.classList.add('hover');
            }, { passive: true });
            
            card.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.classList.remove('hover');
                }, 500);
            }, { passive: true });
            
            // Also handle mouse interactions for hybrid devices
            card.addEventListener('mouseenter', function() {
                this.classList.add('hover');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('hover');
            });
        });
    });
</script>

    <!-- Profil Desa Section with Animations -->
<section id="profil" class="section py-5 bg-light">
    <div class="container">
        <h2 class="section-title" data-aos="fade-down" data-aos-duration="1000">
            <span>Profil Desa</span>
        </h2>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="profil-image" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                    <img src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg" alt="Profil Desa" class="img-fluid rounded shadow-lg">
                    <div class="image-overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="profil-content" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <h5 class="title-animate">Gampong Baro</h5>
                    <p class="text-animate">Gampong Baro adalah nama yang digunakan untuk beberapa desa di Aceh, Indonesia. Informasi dari hasil pencarian menunjukkan bahwa Gampong Baro terletak di beberapa kecamatan dan kabupaten/kota, yaitu Mesjid Raya (Kabupaten Aceh Besar) dan Langsa Lama (Kota Langsa).</p>
                    <ul class="profil-list">
                        <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="500"><i class="fas fa-check-circle"></i> Udara sejuk dan lingkungan asri</li>
                        <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="600"><i class="fas fa-check-circle"></i> Masyarakat yang ramah dan gotong royong</li>
                        <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="700"><i class="fas fa-check-circle"></i> Produk unggulan kerajinan tangan</li>
                        <li data-aos="fade-right" data-aos-duration="800" data-aos-delay="800"><i class="fas fa-check-circle"></i> Wisata alam yang menakjubkan</li>
                    </ul>
                    <a href="#" class="btn btn-outline-primary btn-animate" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="900">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS for Animations -->
<style>

    
    .profil-image {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        transform: translateY(50px);
        opacity: 0;
        transition: all 1s ease;
    }
    
    .profil-image .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(58,123,213,0.3) 0%, rgba(0,210,255,0.3) 100%);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .profil-image img {
        transition: transform 0.5s ease;
        width: 100%;
        height: auto;
    }
    
   
    
    .profil-content h5 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #2c3e50;
        position: relative;
        display: inline-block;
    }
    
    .profil-content h5::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(100deg, #3a7bd5, #00d2ff);
    }
    
    .profil-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }
    
    .profil-list li {
        margin-bottom: 10px;
        padding-left: 30px;
        position: relative;
        transform: translateX(-20px);
        opacity: 0;
        transition: all 0.5s ease;
    }
    
    .profil-list li i {
        position: absolute;
        left: 0;
        top: 5px;
        color: #3a7bd5;
    }
    
    .btn-outline-primary {
        border: 2px solid #3a7bd5;
        color: #3a7bd5;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(100deg, transparent, rgba(58,123,213,0.2), transparent);
        transition: all 0.7s ease;
    }
    
    .profil-image.active {
        transform: translateY(0);
        opacity: 1;
    }
    
    .profil-image.active .image-overlay {
        opacity: 1;
    }
    
    .profil-image.active img:hover {
        transform: scale(1.03);
    }
    
    .profil-content.active {
        transform: translateX(0);
        opacity: 1;
    }
    
    .profil-list li.active {
        transform: translateX(0);
        opacity: 1;
    }
    
    .btn-outline-primary:hover {
        background-color: #3a7bd5;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(58,123,213,0.3);
    }
    
    .btn-outline-primary:hover::before {
        left: 100%;
    }
    
    /* Animation Delays */
    .profil-list li:nth-child(1) { transition-delay: 0.1s; }
    .profil-list li:nth-child(2) { transition-delay: 0.2s; }
    .profil-list li:nth-child(3) { transition-delay: 0.3s; }
    .profil-list li:nth-child(4) { transition-delay: 0.4s; }
</style>

<!-- JavaScript for Scroll Animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    
                    // Image animation
                    if (entry.target.querySelector('.profil-image')) {
                        entry.target.querySelector('.profil-image').classList.add('active');
                    }
                    
                    // Content animation
                    if (entry.target.querySelector('.profil-content')) {
                        entry.target.querySelector('.profil-content').classList.add('active');
                        
                        // List items animation
                        const listItems = entry.target.querySelectorAll('.profil-list li');
                        listItems.forEach(item => {
                            setTimeout(() => {
                                item.classList.add('active');
                            }, 100);
                        });
                    }
                } else {
                    if (entry.target.querySelector('.profil-image')) {
                        entry.target.querySelector('.profil-image').classList.remove('active');
                    }
                    if (entry.target.querySelector('.profil-content')) {
                        entry.target.querySelector('.profil-content').classList.remove('active');
                        const listItems = entry.target.querySelectorAll('.profil-list li');
                        listItems.forEach(item => {
                            item.classList.remove('active');
                        });
                    }
                }
            });
        }, {
            threshold: 0.3
        });
        
        // Observe the profile section
        const profileSection = document.querySelector('#profil');
        if (profileSection) {
            observer.observe(profileSection);
        }
    });
</script> 

<section id="infografis" class="section py-5">
    <div class="container">
        <h2 class="section-title"><span>Statistik Kunjungan</span></h2>
        <p class="text-muted text-center mt-0 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            Informasi mengenai data kunjungan yang tercatat pada website resmi desa, ditampilkan sebagai bentuk transparansi serta upaya dalam meningkatkan kualitas pelayanan digital kepada masyarakat.
        </p>
        
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-item p-3 rounded-3 bg-primary bg-opacity-10 border-start border-5 border-primary">
                    <div class="stats-icon text-primary mb-2">
                        <i class="fas fa-calendar-day fa-2x"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label text-muted small">Hari Ini</div>
                        <div class="stat-value fw-bold fs-3 counter">0</div>
                        <div class="stat-change small">
                            <i class="fas fa-arrow-up text-success d-none"></i>
                            <i class="fas fa-arrow-down text-danger d-none"></i>
                            <span class="change-text">0% dari kemarin</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item p-3 rounded-3 bg-success bg-opacity-10 border-start border-5 border-success">
                    <div class="stats-icon text-success mb-2">
                        <i class="fas fa-calendar-week fa-2x"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label text-muted small">Minggu Ini</div>
                        <div class="stat-value fw-bold fs-3 counter">0</div>
                        <div class="stat-change small">
                            <i class="fas fa-arrow-up text-success d-none"></i>
                            <i class="fas fa-arrow-down text-danger d-none"></i>
                            <span class="change-text">0% dari minggu lalu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item p-3 rounded-3 bg-warning bg-opacity-10 border-start border-5 border-warning">
                    <div class="stats-icon text-warning mb-2">
                        <i class="fas fa-calendar-alt fa-2x"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label text-muted small">Bulan Ini</div>
                        <div class="stat-value fw-bold fs-3 counter">0</div>
                        <div class="stat-change small">
                            <i class="fas fa-arrow-up text-success d-none"></i>
                            <i class="fas fa-arrow-down text-danger d-none"></i>
                            <span class="change-text">0% dari bulan lalu</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item p-3 rounded-3 bg-danger bg-opacity-10 border-start border-5 border-danger">
                    <div class="stats-icon text-danger mb-2">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label text-muted small">Total Kunjungan</div>
                        <div class="stat-value fw-bold fs-3 counter">0</div>
                        <div class="stat-change small">
                            <i class="fas fa-arrow-up text-success d-none"></i>
                            <i class="fas fa-arrow-down text-danger d-none"></i>
                            <span class="change-text">0% dari ktahun lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section id="infografis" class="section py-5 bg-light">
        <div class="container">
            <h2 class="section-title"><span>Struktur Organisasi</span></h2>
            <p class="text-muted text-center p-0">
                Informasi mengenai struktur kepengurusan pemerintah desa yang bertugas dalam menyelenggarakan pemerintahan, pelayanan publik, serta pembangunan di tingkat desa.
            </p>
            
            <div class="row">
                <div class="col-12">
                    <div class="position-relative">
                        <div class="struktur-carousel swiper-container">
                            <div class="swiper-wrapper pb-1">
                                <!-- Item 1 -->
                                <div class="swiper-slide">
                                    <div class="struktur-card text-center p-4 h-100">
                                        <div class="struktur-photo mx-auto mb-3 overflow-hidden rounded-3">
                                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Kepala Desa" class="img-fluid" onerror="this.style.display='none'; this.parentNode.style.display='none'">
                                        </div>
                                        <h4 class="fw-bold mb-1">H. Ahmad Sudirman</h4>
                                        <div class="text-muted mb-3">Kepala Desa</div>
                                        <div class="struktur-social d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Item 2 -->
                                <div class="swiper-slide">
                                    <div class="struktur-card text-center p-4 h-100">
                                        <div class="struktur-photo mx-auto mb-3 overflow-hidden rounded-3">
                                            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Sekretaris Desa" class="img-fluid" onerror="this.style.display='none'; this.parentNode.style.display='none'">
                                        </div>
                                        <h4 class="fw-bold mb-1">Dewi Sartika</h4>
                                        <div class="text-muted mb-3">Sekretaris Desa</div>
                                        <div class="struktur-social d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Item 3 -->
                                <div class="swiper-slide">
                                    <div class="struktur-card text-center p-4 h-100">
                                        <div class="struktur-photo mx-auto mb-3 overflow-hidden rounded-3">
                                            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Bendahara" class="img-fluid" onerror="this.style.display='none'; this.parentNode.style.display='none'">
                                        </div>
                                        <h4 class="fw-bold mb-1">Budi Santoso</h4>
                                        <div class="text-muted mb-3">Bendahara Desa</div>
                                        <div class="struktur-social d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Item 4 -->
                                <div class="swiper-slide">
                                    <div class="struktur-card text-center p-4 h-100">
                                        <div class="struktur-photo mx-auto mb-3 overflow-hidden rounded-3">
                                            <img src="https://randomuser.me/api/portraits/women/4.jpg" alt="Kasi Pemerintahan" class="img-fluid" onerror="this.style.display='none'; this.parentNode.style.display='none'">
                                        </div>
                                        <h4 class="fw-bold mb-1">Siti Aminah</h4>
                                        <div class="text-muted mb-3">Kasi Pemerintahan</div>
                                        <div class="struktur-social d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Item 5 -->
                                <div class="swiper-slide">
                                    <div class="struktur-card text-center p-4 h-100">
                                        <div class="struktur-photo mx-auto mb-3 overflow-hidden rounded-3">
                                            <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="Kasi Pelayanan" class="img-fluid" onerror="this.style.display='none'; this.parentNode.style.display='none'">
                                        </div>
                                        <h4 class="fw-bold mb-1">Joko Prasetyo</h4>
                                        <div class="text-muted mb-3">Kasi Pelayanan</div>
                                        <div class="struktur-social d-flex justify-content-center gap-2">
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-0">
                    <a href="#" class="btn btn-outline-primary">Lihat Semua</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="section py-5">
        <div class="container">
            <h2 class="section-title text-center"><span>Berita Terkini</span></h2>
            
            <div class="position-relative">
                <!-- Carousel Container -->
                <div class="berita-carousel-container overflow-hidden">
                    <div class="berita-carousel-track d-flex">
                        <!-- Berita Item 1 -->
                        <div class="berita-carousel-slide">
                            <div class="card berita-card h-100">
                                <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35" class="card-img-top" alt="Berita 1">
                                <div class="card-body text-start">
                                    <span class="badge bg-primary">Event</span>
                                    <h5 class="card-title line-clamp-2">Festival Gampong Baro 2023 akan menjadi acara terbesar sepanjang tahun ini dengan berbagai pertunjukan</h5>
                                    <p class="card-text line-clamp-3">Festival tahunan desa akan diselenggarakan pada bulan depan dengan berbagai acara menarik termasuk pertunjukan budaya, bazaar kuliner lokal, dan lomba tradisional yang melibatkan seluruh warga desa.</p>
                                    <a href="#" class="btn btn-sm btn-primary align-self-start">Baca Selengkapnya</a>
                                </div>
                                <div class="card-footer w-100">
                                    <small class="text-muted"><i class="far fa-calendar-alt"></i> 15 Juni 2023</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Berita Item 2 -->
                        <div class="berita-carousel-slide">
                            <div class="card berita-card h-100">
                                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Berita 2">
                                <div class="card-body text-start">
                                    <span class="badge bg-success">Pertanian</span>
                                    <h5 class="card-title line-clamp-2">Panen Raya Gampong Baro mencapai rekor tertinggi dalam sejarah desa</h5>
                                    <p class="card-text line-clamp-3">Hasil panen tahun ini meningkat 20% dibanding tahun lalu berkat program pertanian organik yang diterapkan sejak awal tahun. Petani setempat sangat antusias dengan hasil ini dan berencana memperluas lahan pertanian organik.</p>
                                    <a href="#" class="btn btn-sm btn-primary align-self-start">Baca Selengkapnya</a>
                                </div>
                                <div class="card-footer w-100">
                                    <small class="text-muted"><i class="far fa-calendar-alt"></i> 2 Juni 2023</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Berita Item 3 -->
                        <div class="berita-carousel-slide">
                            <div class="card berita-card h-100">
                                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Berita 3">
                                <div class="card-body text-start">
                                    <span class="badge bg-warning text-dark">Ekonomi</span>
                                    <h5 class="card-title line-clamp-2">Ekspor Kerajinan Meningkat signifikan ke pasar internasional</h5>
                                    <p class="card-text line-clamp-3">Produk kerajinan desa mulai diekspor ke beberapa negara Asia Tenggara dengan permintaan yang terus meningkat setiap bulannya. Pemerintah desa berencana membuka pusat pelatihan kerajinan untuk meningkatkan kualitas produk.</p>
                                    <a href="#" class="btn btn-sm btn-primary align-self-start">Baca Selengkapnya</a>
                                </div>
                                <div class="card-footer w-100">
                                    <small class="text-muted"><i class="far fa-calendar-alt"></i> 25 Mei 2023</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Berita Item 4 -->
                        <div class="berita-carousel-slide">
                            <div class="card berita-card h-100">
                                <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35" class="card-img-top" alt="Berita 4">
                                <div class="card-body text-start">
                                    <span class="badge bg-primary">Event</span>
                                    <h5 class="card-title line-clamp-2">Pelatihan Kewirausahaan untuk Pemuda Desa sukses digelar</h5>
                                    <p class="card-text line-clamp-3">Sebanyak 50 pemuda desa mengikuti pelatihan kewirausahaan selama seminggu penuh dengan materi mulai dari pembuatan proposal bisnis hingga pemasaran digital. Acara ini diharapkan bisa memicu semangat wirausaha di kalangan pemuda.</p>
                                    <a href="#" class="btn btn-sm btn-primary align-self-start">Baca Selengkapnya</a>
                                </div>
                                <div class="card-footer w-100">
                                    <small class="text-muted"><i class="far fa-calendar-alt"></i> 10 Mei 2023</small>
                                </div>
                            </div>
                        </div>

                        <!-- Berita Item 5 -->
                        <div class="berita-carousel-slide">
                            <div class="card berita-card h-100">
                                <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35" class="card-img-top" alt="Berita 5">
                                <div class="card-body text-start">
                                    <span class="badge bg-info">Infrastruktur</span>
                                    <h5 class="card-title line-clamp-2">Pembangunan Jalan Desa tahap kedua dimulai dengan dana dari APBD</h5>
                                    <p class="card-text line-clamp-3">Pemerintah kabupaten mengalokasikan dana sebesar 500 juta untuk melanjutkan pembangunan jalan desa yang akan menghubungkan beberapa dusun terpencil. Proyek ini diharapkan selesai dalam waktu 3 bulan.</p>
                                    <a href="#" class="btn btn-sm btn-primary align-self-start">Baca Selengkapnya</a>
                                </div>
                                <div class="card-footer w-100">
                                    <small class="text-muted"><i class="far fa-calendar-alt"></i> 1 Mei 2023</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation Buttons -->
                <button class="berita-carousel-btn berita-prev-btn" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="berita-carousel-btn berita-next-btn" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary">Lihat Semua</a>
            </div>
        </div>
    </section>

    <style>
        .berita-card {
            margin: 0;
            padding: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .berita-card .card-img-top {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }
        
        .berita-card .card-body {
            padding: 15px;
            width: 100%;
        }
        
        .berita-card .card-footer {
            padding: 10px 15px;
            background: transparent;
            border-top: 1px solid #eee;
            width: 100%;
        }
        
        .berita-card .badge {
            margin-bottom: 8px;
            display: inline-block;
        }
        
        .berita-card .card-title {
            font-size: 1rem;
            margin-bottom: 10px;
            min-height: 40px;
            text-align: left;
            width: 100%;
        }
        
        .berita-card .card-text {
            font-size: 0.875rem;
            margin-bottom: 15px;
            min-height: 50px;
            text-align: left;
            width: 100%;
        }
        
        .berita-card .btn {
            margin-top: 5px;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .berita-carousel-track {
            transition: transform 0.5s ease;
            gap: 15px;
        }
        
        .berita-carousel-slide {
            flex: 0 0 calc(100% / 1 - 10px);
            padding: 0 5px;
        }
        
        .berita-carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .berita-carousel-btn:hover {
            background: #f8f9fa;
        }
        
        .berita-prev-btn {
            left: -20px;
        }
        
        .berita-next-btn {
            right: -20px;
        }
        
        /* Responsive Breakpoints */
        @media (min-width: 576px) {
            .berita-carousel-slide {
                flex: 0 0 calc(100% / 1 - 10px);
            }
        }
        
        @media (min-width: 768px) {
            .berita-carousel-slide {
                flex: 0 0 calc(100% / 2 - 10px);
            }
        }
        
        @media (min-width: 992px) {
            .berita-carousel-slide {
                flex: 0 0 calc(100% / 2 - 10px);
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.berita-carousel-track');
            const slides = document.querySelectorAll('.berita-carousel-slide');
            const nextBtn = document.querySelector('.berita-next-btn');
            const prevBtn = document.querySelector('.berita-prev-btn');
            
            let currentIndex = 0;
            const slideCount = slides.length;
            
            // Hitung jumlah slide yang terlihat berdasarkan lebar layar
            function getVisibleSlides() {
                const slideStyle = window.getComputedStyle(slides[0]);
                const flexBasis = slideStyle.flexBasis;
                
                if (flexBasis.includes('33.333%')) return 3;   // 100%/4
                if (flexBasis.includes('50%')) return 2;   // 100%/3
                if (flexBasis.includes('100%')) return 1; // 100%/2
                return 1; // default untuk mobile
            }
            
            function updateCarousel() {
                const visibleSlides = getVisibleSlides();
                const maxIndex = Math.max(slideCount - visibleSlides, 0);
                
                // Pastikan currentIndex tidak melebihi maxIndex
                currentIndex = Math.min(currentIndex, maxIndex);
                
                const slideWidth = slides[0].offsetWidth + 15; // termasuk gap
                track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                
                // Sembunyikan/tampilkan tombol navigasi sesuai kebutuhan
                prevBtn.style.display = currentIndex === 0 ? 'none' : 'flex';
                nextBtn.style.display = currentIndex >= maxIndex ? 'none' : 'flex';
            }
            
            nextBtn.addEventListener('click', function() {
                const visibleSlides = getVisibleSlides();
                currentIndex = Math.min(currentIndex + 1, slideCount - visibleSlides);
                updateCarousel();
            });
            
            prevBtn.addEventListener('click', function() {
                currentIndex = Math.max(currentIndex - 1, 0);
                updateCarousel();
            });
            
            // Handle responsive changes
            window.addEventListener('resize', function() {
                updateCarousel();
            });
            
            // Initialize
            updateCarousel();
        });
    </script>

    <!-- Belanja Section -->
<section id="belanja" class="section py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center"><span>Produk Desa</span></h2>
        
        <div class="position-relative">
            <!-- Carousel Container -->
            <div class="produk-carousel-container overflow-hidden">
                <div class="produk-carousel-track d-flex">
                    <!-- Produk Item 1 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <div class="badge-ribbon">Terlaris</div>
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 1">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Ukiran Kayu Jati</h5>
                                <div class="product-price">Rp 250.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(24)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>

                    <!-- Produk Item 1 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <div class="badge-ribbon">Terlaris</div>
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 1">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Ukiran Kayu Jati</h5>
                                <div class="product-price">Rp 250.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(24)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produk Item 2 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 2">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Keranjang Bambu</h5>
                                <div class="product-price">Rp 120.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>(18)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produk Item 3 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <div class="badge-ribbon">Terbaru</div>
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 3">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Kain Tenun Tradisional</h5>
                                <div class="product-price">Rp 350.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>(32)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Produk Item 4 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 4">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Gerabah Tradisional</h5>
                                <div class="product-price">Rp 180.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(15)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>

                    <!-- Produk Item 5 -->
                    <div class="produk-carousel-slide">
                        <div class="card product-card h-100">
                            <div class="badge-ribbon">Promo</div>
                            <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae" class="card-img-top" alt="Produk 5">
                            <div class="card-body">
                                <h5 class="card-title line-clamp-2">Tas Anyaman Pandan</h5>
                                <div class="product-price">Rp 220.000</div>
                                <div class="product-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm w-100"><i class="fas fa-shopping-cart"></i> Beli Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <button class="produk-carousel-btn produk-prev-btn" aria-label="Previous">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="produk-carousel-btn produk-next-btn" aria-label="Next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<style>
    .product-card {
        margin: 0;
        padding: 0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        position: relative;
    }
    
    .product-card .card-img-top {
        height: 180px;
        object-fit: cover;
        width: 100%;
    }
    
    .product-card .card-body {
        padding: 15px;
        flex-grow: 1;
    }
    
    .product-card .card-footer {
        padding: 10px 15px;
        background: transparent;
        border-top: 1px solid #eee;
    }
    
    .product-card .card-title {
        font-size: 1rem;
        margin-bottom: 10px;
        text-align: left;
    }
    
    .product-price {
        font-weight: bold;
        color: #e63946;
        font-size: 1.1rem;
        margin-bottom: 8px;
    }
    
    .product-rating {
        color: #ffc107;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    
    .product-rating span {
        color: #6c757d;
        margin-left: 5px;
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .produk-carousel-track {
        transition: transform 0.5s ease;
        gap: 15px;
    }
    
    .produk-carousel-slide {
        flex: 0 0 calc(100% / 1 - 10px);
        padding: 0 5px;
    }
    
    .produk-carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .produk-carousel-btn:hover {
        background: #f8f9fa;
    }
    
    .produk-prev-btn {
        left: -20px;
    }
    
    .produk-next-btn {
        right: -20px;
    }
    
    /* Responsive Breakpoints */
    @media (min-width: 576px) {
        .produk-carousel-slide {
            flex: 0 0 calc(100% / 1 - 10px);
        }
    }
    
    @media (min-width: 768px) {
        .produk-carousel-slide {
            flex: 0 0 calc(100% / 2 - 10px);
        }
    }
    
    @media (min-width: 992px) {
        .produk-carousel-slide {
            flex: 0 0 calc(100% / 2 - 10px);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.produk-carousel-track');
        const slides = document.querySelectorAll('.produk-carousel-slide');
        const nextBtn = document.querySelector('.produk-next-btn');
        const prevBtn = document.querySelector('.produk-prev-btn');
        
        let currentIndex = 0;
        const slideCount = slides.length;
        
        // Hitung jumlah slide yang terlihat berdasarkan lebar layar
        function getVisibleSlides() {
            const slideStyle = window.getComputedStyle(slides[0]);
            const flexBasis = slideStyle.flexBasis;
            
            if (flexBasis.includes('33.3333%')) return 3;   // 100%/4
            if (flexBasis.includes('50%')) return 2;   // 100%/3
            if (flexBasis.includes('100%')) return 1; // 100%/2
            return 1; // default untuk mobile
        }
        
        function updateCarousel() {
            const visibleSlides = getVisibleSlides();
            const maxIndex = Math.max(slideCount - visibleSlides, 0);
            
            // Pastikan currentIndex tidak melebihi maxIndex
            currentIndex = Math.min(currentIndex, maxIndex);
            
            const slideWidth = slides[0].offsetWidth + 15; // termasuk gap
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            
            // Sembunyikan/tampilkan tombol navigasi sesuai kebutuhan
            prevBtn.style.display = currentIndex === 0 ? 'none' : 'flex';
            nextBtn.style.display = currentIndex >= maxIndex ? 'none' : 'flex';
        }
        
        nextBtn.addEventListener('click', function() {
            const visibleSlides = getVisibleSlides();
            currentIndex = Math.min(currentIndex + 1, slideCount - visibleSlides);
            updateCarousel();
        });
        
        prevBtn.addEventListener('click', function() {
            currentIndex = Math.max(currentIndex - 1, 0);
            updateCarousel();
        });
        
        // Handle responsive changes
        window.addEventListener('resize', function() {
            updateCarousel();
        });
        
        // Initialize
        updateCarousel();
    });
</script>

 <!-- PPID Section -->
<section id="ppid" class="section py-5">
    <div class="container">
        <!-- Animated Title -->
        <h2 class="section-title text-center mb-5">
            <span class="title-line">PPID Desa</span>
        </h2>
        
        <div class="row g-4 justify-content-center">
            <!-- Ubah class col menjadi col-12 untuk lebar penuh -->
            <div class="col-12 col-md-10 col-lg-10">
                <!-- First Card with Animation -->
                <div class="ppid-card animate__animated">
                    <div class="card-overlay"></div>
                    <div class="ppid-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="ppid-content">
                        <h3>Informasi Publik</h3>
                        <p class="mb-4">Dapatkan informasi resmi dari Pemerintah Gampong Baro melalui kanal PPID.</p>
                        <a href="#" class="btn btn-elegant">
                            <span>Akses Informasi</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
            
            <div class="col-12 col-md-10 col-lg-10 mt-4">
                <!-- Second Card with Animation -->
                <div class="ppid-card animate__animated">
                    <div class="card-overlay"></div>
                    <div class="ppid-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="ppid-content">
                        <h3>Pengajuan Permohonan</h3>
                        <p class="mb-4">Ajukan permohonan informasi publik secara online melalui form kami.</p>
                        <a href="#" class="btn btn-elegant">
                            <span>Ajukan Permohonan</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* PPID Section Styling */
    #ppid {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        overflow: hidden;
    }
    
    #ppid::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://example.com/subtle-pattern.png') center/cover;
        opacity: 0.03;
        z-index: 0;
    }
    
    .ppid-card {
        position: relative;
        background: white;
        border-radius: 12px;
        padding: 30px;
        height: 100%;
        width: 100%;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        z-index: 1;
        transform: translateY(20px);
        opacity: 0;
    }
    
    .ppid-card.animate__animated {
        transform: translateY(0);
        opacity: 1;
    }
    
    .ppid-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(142, 68, 173, 0.1) 0%, rgba(52, 152, 219, 0.1) 100%);
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .ppid-card:hover .card-overlay {
        opacity: 1;
    }
    
    .ppid-icon {
        font-size: 3rem;
        color: #8e44ad;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    
    .ppid-card:hover .ppid-icon {
        transform: scale(1.1);
        color: #3498db;
    }
    
    .ppid-content h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    
    .ppid-content h3::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 50px;
        height: 2px;
        background: linear-gradient(90deg, #8e44ad, #3498db);
        transition: width 0.3s ease;
    }
    
    .ppid-card:hover .ppid-content h3::after {
        width: 80px;
    }
    
    .ppid-content p {
        color: #7f8c8d;
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .btn-elegant {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(90deg, #8e44ad, #3498db);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-elegant::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, #3498db, #8e44ad);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }
    
    .btn-elegant:hover::before {
        opacity: 1;
    }
    
    .btn-elegant:hover {
        box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
    }
    
    .card-decoration {
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(142, 68, 173, 0.1) 0%, rgba(52, 152, 219, 0.1) 100%);
        transition: all 0.5s ease;
    }
    
    .ppid-card:hover .card-decoration {
        transform: scale(1.5);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .ppid-card {
            padding: 25px;
        }
    }
    
    @media (max-width: 768px) {
        .ppid-content h3 {
            font-size: 1.3rem;
        }
        
        .ppid-icon {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .ppid-card {
            padding: 20px;
        }
    }
</style>

<script>
    // Animation on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const ppidCards = document.querySelectorAll('.ppid-card');
        
        const animateOnScroll = function() {
            ppidCards.forEach(card => {
                const cardPosition = card.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (cardPosition < screenPosition) {
                    card.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        };
        
        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Trigger on load if already in view
    });
</script>
@endsection

@push('scripts')
<!-- Swiper JS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper for Struktur Organisasi
    var swiper = new Swiper('.struktur-carousel', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 20,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 15
            },
            576: {
                slidesPerView: 1,
                centeredSlides: true
            },
            768: {
                slidesPerView: 2,
                centeredSlides: false
            },
            992: {
                slidesPerView: 3,
                centeredSlides: false
            },
            1200: {
                slidesPerView: 4,
                centeredSlides: false
            }
        }
    });
    
    async function fetchStats() {
    try {
        const response = await fetch('/kunjungan/stats');
        const result = await response.json();
        
        if (result.success) {
            const stats = result.data;
            
            // Update statistik biasa
            updateStatItem('Hari Ini', stats.today);
            updateStatItem('Minggu Ini', stats.week);
            updateStatItem('Bulan Ini', stats.month);
            
            // Handle khusus untuk Total Kunjungan
            const totalItem = findStatItemByLabel('Total Kunjungan');
            if (totalItem) {
                // Gunakan value dari total
                const counter = totalItem.querySelector('.counter');
                counter.textContent = '0';
                animateCounter(counter, stats.total.value);
                
                // Tapi gunakan change data dari year
                const changeContainer = totalItem.querySelector('.stat-change');
                if (changeContainer) {
                    const upArrow = changeContainer.querySelector('.fa-arrow-up');
                    const downArrow = changeContainer.querySelector('.fa-arrow-down');
                    const changeText = changeContainer.querySelector('.change-text');
                    
                    if (stats.year) {
                        if (stats.year.is_increase) {
                            upArrow.classList.remove('d-none');
                            downArrow.classList.add('d-none');
                            changeContainer.classList.add('text-success');
                            changeContainer.classList.remove('text-danger');
                        } else {
                            upArrow.classList.add('d-none');
                            downArrow.classList.remove('d-none');
                            changeContainer.classList.add('text-danger');
                            changeContainer.classList.remove('text-success');
                        }
                        changeText.textContent = `${Math.abs(stats.year.change)}% dari tahun lalu`;
                    } else {
                        changeContainer.style.display = 'none';
                    }
                }
            }
        }
    } catch (error) {
        console.error('Error fetching stats:', error);
        setDefaultValues();
    }
}

// Default values juga perlu disesuaikan
function setDefaultValues() {
    const defaultData = {
        'Hari Ini': { value: 1245, change: 12, is_increase: true, change_text: 'dari kemarin' },
        'Minggu Ini': { value: 8562, change: 8, is_increase: true, change_text: 'dari minggu lalu' },
        'Bulan Ini': { value: 32458, change: -5, is_increase: false, change_text: 'dari bulan lalu' },
        // Data untuk Total Kunjungan (value dari total, change dari year)
        'Total Kunjungan': { 
            value: 1254870, 
            change: 22, 
            is_increase: true, 
            change_text: 'dari tahun lalu' 
        }
    };

    Object.keys(defaultData).forEach(label => {
        const statItem = findStatItemByLabel(label);
        if (statItem) {
            const counter = statItem.querySelector('.counter');
            counter.textContent = '0';
            animateCounter(counter, defaultData[label].value);
            
            if (label === 'Total Kunjungan') {
                const changeContainer = statItem.querySelector('.stat-change');
                if (changeContainer) {
                    const upArrow = changeContainer.querySelector('.fa-arrow-up');
                    const downArrow = changeContainer.querySelector('.fa-arrow-down');
                    const changeText = changeContainer.querySelector('.change-text');
                    
                    if (defaultData[label].is_increase) {
                        upArrow.classList.remove('d-none');
                        downArrow.classList.add('d-none');
                        changeContainer.classList.add('text-success');
                        changeContainer.classList.remove('text-danger');
                    } else {
                        upArrow.classList.add('d-none');
                        downArrow.classList.remove('d-none');
                        changeContainer.classList.add('text-danger');
                        changeContainer.classList.remove('text-success');
                    }
                    changeText.textContent = `${Math.abs(defaultData[label].change)}% ${defaultData[label].change_text}`;
                }
            } else {
                updateStatItem(label, defaultData[label]);
            }
        }
    });
}

    // Fungsi untuk update stat item
    function updateStatItem(label, statData) {
        const statItem = findStatItemByLabel(label);
        
        if (statItem) {
            const counter = statItem.querySelector('.counter');
            const changeContainer = statItem.querySelector('.stat-change');
            const upArrow = changeContainer.querySelector('.fa-arrow-up');
            const downArrow = changeContainer.querySelector('.fa-arrow-down');
            const changeText = changeContainer.querySelector('.change-text');
            
            // Update nilai counter
            counter.textContent = '0'; // Reset ke 0 sebelum animasi
            animateCounter(counter, statData.value);
            
            // Update panah dan warna
            if (statData.is_increase) {
                upArrow.classList.remove('d-none');
                downArrow.classList.add('d-none');
                changeContainer.classList.add('text-success');
                changeContainer.classList.remove('text-danger');
            } else {
                upArrow.classList.add('d-none');
                downArrow.classList.remove('d-none');
                changeContainer.classList.add('text-danger');
                changeContainer.classList.remove('text-success');
            }
            
            // Update teks perubahan
            changeText.textContent = `${Math.abs(statData.change)}% ${statData.change_text}`;
        }
    }

    // Helper untuk menemukan stat item berdasarkan label
    function findStatItemByLabel(label) {
        const statItems = document.querySelectorAll('.stat-item');
        for (const item of statItems) {
            const itemLabel = item.querySelector('.stat-label').textContent.trim();
            if (itemLabel === label) {
                return item;
            }
        }
        return null;
    }

    // Nilai default jika API tidak tersedia
    function setDefaultValues() {
        const defaultData = {
            'Hari Ini': { value: 1245, change: 12, is_increase: true, change_text: 'dari kemarin' },
            'Minggu Ini': { value: 8562, change: 8, is_increase: true, change_text: 'dari minggu lalu' },
            'Bulan Ini': { value: 32458, change: -5, is_increase: false, change_text: 'dari bulan lalu' },
            'Total Kunjungan': { value: 125487, change: 22, is_increase: true, change_text: 'dari tahun lalu' }
        };

        Object.keys(defaultData).forEach(label => {
            updateStatItem(label, defaultData[label]);
        });
    }

    // Counter Animation
    function animateCounter(counter, target) {
        const duration = 2000; // Animation duration in ms
        const start = 0;
        const startTime = performance.now();
        
        function updateCounter(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            const value = Math.floor(progress * target);
            
            counter.textContent = value.toLocaleString();
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target.toLocaleString();
            }
        }
        
        requestAnimationFrame(updateCounter);
    }
    
    // Panggil fungsi saat halaman dimuat
    fetchStats();
    
    // Catat kunjungan
    fetch('/kunjungan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => console.log('Kunjungan tercatat'))
    .catch(error => console.error('Error:', error));

    // Improved Intersection Observer with animation triggering
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                if (!counter.classList.contains('animated')) {
                    counter.classList.add('animated');
                    const targetValue = parseInt(counter.textContent.replace(/,/g, ''));
                    animateCounter(counter, targetValue);
                }
            }
        });
    }, observerOptions);
    
    // Observe all counters
    document.querySelectorAll('.counter').forEach(counter => {
        observer.observe(counter);
    });
    
    // Add animation for other elements when they come into view
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                animationObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2
    });
    
    // Observe elements that should animate on scroll
    document.querySelectorAll('[data-animate]').forEach(el => {
        animationObserver.observe(el);
    });
});
</script>
@endpush

<style>
    /* Tambahkan CSS ini untuk memperbaiki overflow di mobile */
    .struktur-carousel {
        overflow: hidden;
        width: 100%;
    }
    
    .swiper-wrapper {
        box-sizing: border-box;
    }
    
    
    @media (max-width: 575.98px) {
        .struktur-card {
            min-width: 260px; /* Lebar minimum untuk mobile */
            margin: 0 auto;
        }
    }
</style>