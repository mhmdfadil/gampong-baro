@extends('components.main')

@section('hero-carousel')
@php
    $slides = App\Models\Slide::all();
@endphp
<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($slides as $key => $slide)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @forelse($slides as $key => $slide)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/slides/' . $slide->image) }}" class="d-block w-100" alt="{{ $slide->title }}" style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fw-bold">{{ $slide->title ?? 'Selamat Datang di Gampong Baro' }}</h1>
                    <p class="lead my-3">{{ $slide->description_singkat ?? 'Keseimbangan antara alam dan modernitas' }}</p>
                    <a href="{{ $slide->routes ? route($slide->routes) : '#profil' }}" class="btn btn-primary btn-lg btn-explore px-4 py-2">
                        {{ $slide->text_button ?? 'Jelajahi Desa' }}
                    </a>
                </div>
            </div>
        @empty
            <!-- Default slides if no slides in database -->
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1547981609-4b6bfe67ca0b" class="d-block w-100" alt="Gampong Baro" style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fw-bold">Selamat Datang di Gampong Baro</h1>
                    <p class="lead my-3">Keseimbangan antara alam dan modernitas</p>
                    <a href="#profil" class="btn btn-primary btn-lg btn-explore px-4 py-2">Jelajahi Desa</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35" class="d-block w-100" alt="Sawah Desa" style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fw-bold">Keindahan Alam Pedesaan</h1>
                    <p class="lead my-3">Nikmati panorama alam yang menyejukkan</p>
                    <a href="#infografis" class="btn btn-primary btn-lg btn-explore px-4 py-2">Lihat Infografis</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg" class="d-block w-100" alt="Kerajinan" style="height: 600px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fw-bold">Produk Unggulan Desa</h1>
                    <p class="lead my-3">Kerajinan tangan berkualitas tinggi</p>
                    <a href="#belanja" class="btn btn-primary btn-lg btn-explore px-4 py-2">Belanja Sekarang</a>
                </div>
            </div>
        @endforelse
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
            <a href="{{ route('berita') }}" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(13, 110, 253, 0.15) 0%, rgba(13, 110, 253, 0.3) 100%);">
                        <i class="fas fa-newspaper text-primary" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Berita</h6>
                </div>
            </a>
            
            <!-- Infografis Card -->
            <a href="{{ route('infografis.penduduk') }}" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.15) 0%, rgba(25, 135, 84, 0.3) 100%);">
                        <i class="fas fa-chart-pie text-success" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Infografis</h6>
                </div>
            </a>
            
            <!-- Belanja Card -->
            <a href="{{ route('belanja') }}" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(220, 53, 69, 0.15) 0%, rgba(220, 53, 69, 0.3) 100%);">
                        <i class="fas fa-shopping-cart text-danger" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">Belanja</h6>
                </div>
            </a>
            
            <!-- PPID Card -->
            <a href="{{ route('ppid') }}" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
                <div class="card-body p-2">
                    <div class="mx-auto mb-1 icon-wrapper" style="background: linear-gradient(135deg, rgba(255, 193, 7, 0.15) 0%, rgba(255, 193, 7, 0.3) 100%);">
                        <i class="fas fa-info-circle text-warning" style="font-size: 1rem;"></i>
                    </div>
                    <h6 class="mb-0 text-dark text-xs">PPID</h6>
                </div>
            </a>

            <!-- Pengaduan Card -->
            <a href="{{ route('pengaduan') }}" class="text-decoration-none menu-card" style="width: 18%; flex-shrink: 0;">
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
<section id="infografis" class="section">
    <div class="container">
        <div class="section-title p-0"><span>Statistik Desa</span></div>
        <p class="fs-[6] mb-4">Sistem digital ini bertujuan untuk menyederhanakan proses pengelolaan data kependudukan serta memaksimalkan pemanfaatannya guna menunjang pelayanan publik yang berdaya guna dan berhasil guna.</p>
        
        @php
            // Get statistics data directly from model
            $stats = App\Models\Penduduk::getStatistikKependudukan();
        @endphp
        
        <!-- Desktop Layout (Cards) -->
        <div class="row g-3 d-none d-md-flex">
            <!-- Card 1 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['total_penduduk']) }}</h3>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Total Penduduk</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['total_lk'] ?? 0) }}</h3>
                        <div class="stat-icon">
                            <i class="fas fa-male"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Laki-Laki</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['total_pr'] ?? 0) }}</h3>
                        <div class="stat-icon">
                            <i class="fas fa-female"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Perempuan</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['total_kk']) }}</h3>
                        <div class="stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Kepala Keluarga</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 5 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['pertumbuhan'], 2) }}%</h3>
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Pertumbuhan Penduduk</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 6 -->
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-number" style="background: linear-gradient(135deg, #0a2463 0%, #3e92cc 50%, #d6f1ff 100%)">
                        <h3>{{ number_format($stats['rasio_jk'], 2) }}</h3>
                        <div class="stat-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                    </div>
                    <div class="stat-desc">
                        <p>Rasio Jenis Kelamin</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Layout (Simple Icons + Text) -->
        <div class="row g-3 d-flex d-md-none">
            <!-- Item 1 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>{{ number_format($stats['total_penduduk']) }}</h3>
                    <p>Total Penduduk</p>
                </div>
            </div>
            
            <!-- Item 2 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-male"></i>
                    </div>
                    <h3>{{ number_format($stats['total_lk'] ?? 0) }}</h3>
                    <p>Laki-Laki</p>
                </div>
            </div>
            
            <!-- Item 3 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-female"></i>
                    </div>
                    <h3>{{ number_format($stats['total_pr'] ?? 0) }}</h3>
                    <p>Perempuan</p>
                </div>
            </div>
            
            <!-- Item 4 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>{{ number_format($stats['total_kk']) }}</h3>
                    <p>Kepala Keluarga</p>
                </div>
            </div>
            
            <!-- Item 5 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>{{ number_format($stats['pertumbuhan'], 2) }}%</h3>
                    <p>Pertumbuhan Penduduk</p>
                </div>
            </div>
            
            <!-- Item 6 -->
            <div class="col-4 text-center">
                <div class="stat-mobile">
                    <div class="stat-icon-mobile">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3>{{ number_format($stats['rasio_jk'], 2) }}</h3>
                    <p>Rasio Jenis Kelamin</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Infographic Styles */
    /* Desktop Card Layout */
    .stat-card {
        display: flex;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
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
        transform: translateY(-5px) !important;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .stat-number {
        flex: 0 0 40%;
        padding: 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .stat-number h3 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 0;
        color: white;
    }
    
    .stat-desc {
        flex: 1;
        padding: 30px;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .stat-desc p {
        margin: 0;   
        color: #333;
        font-size: 1.5em;
        font-weight: 700;
    }
    
    .stat-icon {
        position: absolute;
        right: 15px;
        bottom: 15px;
        font-size: 2.5rem;
        opacity: 0.2;
    }
    
    /* Mobile Layout */
    .stat-mobile {
        padding: 15px 5px;
    }
    
    .stat-icon-mobile {
        font-size: 2rem;
        color: #3e92cc;
        margin-bottom: 10px;
    }
    
    .stat-mobile h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: #333;
    }
    
    .stat-mobile p {
        font-size: 0.8rem;
        color: #666;
        margin-bottom: 0;
    }
    
    /* Animation */
    @media (min-width: 768px) {
        .animate__animated {
            animation-duration: 0.5s;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // For desktop cards
        const desktopCards = document.querySelectorAll('.stat-card');
        // For mobile items
        const mobileItems = document.querySelectorAll('.stat-mobile');
        
        let hasAnimated = false;

        const animateElements = (elements) => {
            if (hasAnimated) return;
            
            hasAnimated = true;
            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('animated');
                }, 150 * index);
            });
        };

        const resetAnimation = (elements) => {
            if (!hasAnimated) return;
            elements.forEach(element => {
                element.classList.remove('animated');
            });
            hasAnimated = false;
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (window.innerWidth >= 768) {
                        animateElements(desktopCards);
                    } else {
                        animateElements(mobileItems);
                    }
                } else {
                    if (window.innerWidth >= 768) {
                        resetAnimation(desktopCards);
                    } else {
                        resetAnimation(mobileItems);
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Observe container instead of individual elements
        const container = document.querySelector('#infografis .container');
        observer.observe(container);

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileItems.forEach(item => item.classList.remove('animated'));
            } else {
                desktopCards.forEach(card => card.classList.remove('animated'));
            }
            hasAnimated = false;
            observer.unobserve(container);
            observer.observe(container);
        });
    });
</script>

<!-- Kata Sambutan Section with Animations -->
<section id="sambutan" class="section py-5 bg-light">
    <div class="container">
        <h2 class="section-title" data-aos="fade-down" data-aos-duration="1000">
            <span>Kata Sambutan</span>
        </h2>
        <div class="row align-items-center">
            @php
                // Ambil data sambutan aktif dari model
                $acceptance = App\Models\Acceptance::active()->first();
                
                // Jika tidak ada data aktif, gunakan data default
                if (!$acceptance) {
                    $acceptance = (object)[
                        'title' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh',
                        'content' => "Dengan rahmat Allah Subhanahu Wa Ta'ala, kami sampaikan salam sejahtera untuk seluruh masyarakat Gampong Baro dan para pengunjung website kami.\n\nWebsite ini hadir sebagai wujud transparansi dan akuntabilitas pemerintahan desa dalam memberikan pelayanan serta informasi kepada masyarakat. Kami berharap melalui media ini, seluruh program pembangunan dan kegiatan desa dapat diakses dengan mudah oleh seluruh warga.\n\nGampong Baro yang kita cintai ini terus berkembang dengan dukungan seluruh elemen masyarakat. Semangat gotong royong dan kebersamaan yang telah menjadi ciri khas kita harus terus kita pertahankan untuk mewujudkan desa yang maju, mandiri, dan sejahtera.",
                        'official_name' => 'Muhammad Arif, S.Pd',
                        'position' => 'Kepala Desa Gampong Baro',
                        'signature_image' => 'https://i.ibb.co/0jQ2XZn/signature.png',
                        'photo' => 'https://images.pexels.com/photos/4473398/pexels-photo-4473398.jpeg',
                        'greeting_opening' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh',
                        'greeting_closing' => 'Wassalamu\'alaikum Warahmatullahi Wabarakatuh',
                        'quote' => 'Bersama membangun desa, bersama mensejahterakan masyarakat'
                    ];
                }
                
                // Pisahkan konten berdasarkan newline
                $contentParagraphs = explode("\n\n", $acceptance->content);
            @endphp
            
            <div class="col-lg-5">
                <div class="sambutan-image" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $acceptance->photo) ?? 'https://images.pexels.com/photos/4473398/pexels-photo-4473398.jpeg' }}" alt="Kepala Desa" class="img-fluid rounded shadow-lg">
                    <div class="image-overlay"></div>
                    <div class="signature-box" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                        <img src="{{asset('storage/' . $acceptance->signature_image)   ?? 'https://i.ibb.co/0jQ2XZn/signature.png' }}" alt="Tanda Tangan" height="20px" class="signature-img">
                        <h5>{{ $acceptance->official_name ?? 'Muhammad Arif, S.Pd' }}</h5>
                        <p>{{ $acceptance->position ?? 'Kepala Desa Gampong Baro' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="sambutan-content" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                    <h3 class="title-animate">{{ $acceptance->greeting_opening ?? 'Assalamu\'alaikum Warahmatullahi Wabarakatuh' }}</h3>
                    
                    @foreach($contentParagraphs as $paragraph)
                        <p class="text-animate">{{ $paragraph }}</p>
                    @endforeach
                    
                    @if(!empty($acceptance->quote))
                        <div class="quote-box" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="500">
                            <i class="fas fa-quote-left"></i>
                            <p>{{ $acceptance->quote }}</p>
                            <i class="fas fa-quote-right"></i>
                        </div>
                    @endif
                    
                    <p class="text-animate">{{ $acceptance->greeting_closing ?? 'Wassalamu\'alaikum Warahmatullahi Wabarakatuh' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS for Sambutan Section -->
<style>
    .sambutan-image {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        transform: translateY(50px);
        opacity: 0;
        transition: all 1s ease;
        margin-bottom: 30px;
    }
    
    .sambutan-image .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(58,123,213,0.1) 0%, rgba(0,210,255,0.1) 100%);
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .sambutan-image img {
        transition: transform 0.5s ease;
        width: 100%;
        height: auto;
        border: 5px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .signature-box {
        background: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        margin-top: -50px;
        position: relative;
        z-index: 2;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        max-width: 60%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 15px;
    }
    
    .signature-img {
        max-height: 110px;
        margin-bottom: 10px;
    }
    
    .signature-box h5 {
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: #2c3e50;
    }
    
    .signature-box p {
        font-size: 0.9rem;
        color: #7f8c8d;
        margin-bottom: 0;
    }
    
    .sambutan-content {
        padding: 20px;
    }
    
    .sambutan-content h3 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: #2c3e50;
        position: relative;
        padding-bottom: 15px;
    }
    
    .sambutan-content h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, #3a7bd5, #00d2ff);
    }
    
    .sambutan-content p {
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 20px;
        color: #34495e;
    }
    
    .quote-box {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        border-left: 4px solid #3a7bd5;
        padding: 20px;
        margin: 25px 0;
        font-style: italic;
        position: relative;
    }
    
    .quote-box p {
        font-size: 1.1rem;
        color: #2c3e50;
        margin-bottom: 0;
        font-weight: 500;
    }
    
    .fa-quote-left {
        position: absolute;
        top: 10px;
        left: 10px;
        color: rgba(58,123,213,0.2);
        font-size: 1.5rem;
    }
    
    .fa-quote-right {
        position: absolute;
        bottom: 10px;
        right: 10px;
        color: rgba(58,123,213,0.2);
        font-size: 1.5rem;
    }
    
    /* Animation Classes */
    .sambutan-image.active {
        transform: translateY(0);
        opacity: 1;
    }
    
    .sambutan-image.active .image-overlay {
        opacity: 1;
    }
    
    .sambutan-image.active img:hover {
        transform: scale(1.03);
    }
    
    .sambutan-content.active {
        transform: translateX(0);
        opacity: 1;
    }
</style>

<!-- JavaScript for Scroll Animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Image animation
                    if (entry.target.querySelector('.sambutan-image')) {
                        entry.target.querySelector('.sambutan-image').classList.add('active');
                    }
                    
                    // Content animation
                    if (entry.target.querySelector('.sambutan-content')) {
                        entry.target.querySelector('.sambutan-content').classList.add('active');
                    }
                } else {
                    if (entry.target.querySelector('.sambutan-image')) {
                        entry.target.querySelector('.sambutan-image').classList.remove('active');
                    }
                    if (entry.target.querySelector('.sambutan-content')) {
                        entry.target.querySelector('.sambutan-content').classList.remove('active');
                    }
                }
            });
        }, {
            threshold: 0.3
        });
        
        // Observe the sambutan section
        const sambutanSection = document.querySelector('#sambutan');
        if (sambutanSection) {
            observer.observe(sambutanSection);
        }
    });
</script>

<section id="infografis" class="section py-5">
    <div class="container">
        <h2 class="section-title"><span>Statistik Kunjungan</span></h2>
        <p class="fs-6 text-center mt-0 mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
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
<section id="struktur" class="section py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-0"><span>Struktur Organisasi</span></h2>
                <p class="fs-6 mb-0">Informasi mengenai struktur kepengurusan pemerintah desa</p>
            </div>
            <div class="carousel-nav d-flex align-items-center">
                <div class="struktur-carousel-btn struktur-prev-btn mx-2" aria-label="Previous">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="struktur-carousel-btn struktur-next-btn" aria-label="Next">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="position-relative px-lg-3">
            @php
                $struktur = App\Models\StrukturOrganisasi::aktif()->urutan()->take(8)->get();
            @endphp
            
            @if($struktur->isEmpty())
                <!-- Warning Alert when no data available -->
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        Data Struktur Organisasi belum tersedia
                    </div>
                </div>
            @else
                <!-- Carousel Container -->
                <div class="struktur-carousel-container overflow-hidden">
                    <div class="struktur-carousel-track d-flex">
                        <!-- Clone last few slides for infinite effect (placed at beginning) -->
                        @foreach($struktur->slice(-0) as $anggota)
                        <div class="struktur-carousel-slide cloned-slide">
                            <div class="card struktur-card h-100 border-0">
                                <div class="struktur-photo mx-auto mt-2 overflow-hidden rounded-3">
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->jabatan }}" class="img-fluid w-100" loading="lazy" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($anggota->nama) }}&background=random'">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold mb-0">{{ $anggota->nama }}</h5>
                                    <div class="text-muted mb-3">{{ $anggota->jabatan }}</div>
                                    <div class="struktur-social d-flex justify-content-center gap-2">
                                        <a href="{{ $anggota->whatsapp_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                        <a href="{{ $anggota->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Main slides -->
                        @foreach($struktur as $anggota)
                        <div class="struktur-carousel-slide">
                            <div class="card struktur-card h-100 border-0">
                                <div class="struktur-photo mx-auto mt-2 overflow-hidden rounded-3">
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->jabatan }}" class="img-fluid w-100" loading="lazy" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($anggota->nama) }}&background=random'">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold mb-0">{{ $anggota->nama }}</h5>
                                    <div class="text-muted mb-3">{{ $anggota->jabatan }}</div>
                                    <div class="struktur-social d-flex justify-content-center gap-2">
                                        <a href="{{ $anggota->whatsapp_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                        <a href="{{ $anggota->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Clone first few slides for infinite effect (placed at end) -->
                        @foreach($struktur->take(4) as $anggota)
                        <div class="struktur-carousel-slide cloned-slide">
                            <div class="card struktur-card h-100 border-0">
                                <div class="struktur-photo mx-auto mt-2 overflow-hidden rounded-3">
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->jabatan }}" class="img-fluid w-100" loading="lazy" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($anggota->nama) }}&background=random'">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold mb-0">{{ $anggota->nama }}</h5>
                                    <div class="text-muted mb-3">{{ $anggota->jabatan }}</div>
                                    <div class="struktur-social d-flex justify-content-center gap-2">
                                        <a href="{{ $anggota->whatsapp_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fab fa-whatsapp"></i></a>
                                        <a href="{{ $anggota->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        
        <div class="text-center mt-4">
         <a href="{{ route('struktur-organisasi-anggota') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
    <i class="fas fa-users me-2"></i> Lihat Semua Anggota
</a>

        </div>
    </div>
</section>

<style>
    /* Struktur Card Styling */
    .struktur-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        background: white;
    }
    
    .struktur-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .struktur-photo {
        width: 120px;
        height: 120px;
        border: 3px solid #f8f9fa;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .struktur-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .struktur-social .btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Carousel Styling */
    .struktur-carousel-container {
        padding: 2px 0;
        cursor: grab;
    }
    
    .struktur-carousel-container:active {
        cursor: grabbing;
    }
    
    .struktur-carousel-track {
        transition: transform 0.5s ease;
        gap: 15px;
    }
    
    .struktur-carousel-slide {
        flex: 0 0 calc(100% - 15px);
        min-width: 0;
    }
    
    .struktur-carousel-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: white;
        border: 1px solid #dee2e6;
        color: #495057;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    
    .struktur-carousel-btn:hover {
        background: #f8f9fa;
        color: #0d6efd;
        transform: scale(1.03);
    }
    
    .struktur-carousel-btn:active {
        transform: scale(0.97);
    }
    
    .struktur-carousel-btn a {
        color: inherit;
        text-decoration: none;
    }
    
    /* Responsive Breakpoints */
    @media (min-width: 576px) {
        .struktur-carousel-slide {
            flex: 0 0 calc(50% - 12px);
        }
    }
    
    @media (min-width: 768px) {
        .struktur-carousel-slide {
            flex: 0 0 calc(33.333% - 12px);
        }
    }
    
    @media (min-width: 992px) {
        .struktur-carousel-slide {
            flex: 0 0 calc(33.333% - 12px);
        }
    }
    
    @media (min-width: 1200px) {
        .struktur-carousel-slide {
            flex: 0 0 calc(25% - 12px);
        }
    }
</style>

@if(!$struktur->isEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.struktur-carousel-track');
        const slides = Array.from(document.querySelectorAll('.struktur-carousel-slide:not(.cloned-slide)'));
        const nextBtn = document.querySelector('.struktur-next-btn a');
        const prevBtn = document.querySelector('.struktur-prev-btn a');
        const container = document.querySelector('.struktur-carousel-container');
        
        let currentIndex = 0;
        let isAnimating = false;
        let slideWidth = 0;
        let visibleSlides = 0;
        
        // Initialize carousel
        function initCarousel() {
            updateSlideWidth();
            updateVisibleSlides();
            
            // Start at the first real slide (after cloned slides at beginning)
            currentIndex = slides.length;
            updateCarousel(true);
        }
        
        function updateSlideWidth() {
            if (slides.length > 0) {
                slideWidth = slides[0].offsetWidth + 15; // including gap
            }
        }
        
        function updateVisibleSlides() {
            if (!container) {
                visibleSlides = 1;
                return;
            }
            
            const containerWidth = container.offsetWidth;
            if (containerWidth >= 1200) visibleSlides = 4;
            else if (containerWidth >= 992) visibleSlides = 3;
            else if (containerWidth >= 768) visibleSlides = 3;
            else if (containerWidth >= 576) visibleSlides = 2;
            else visibleSlides = 1;
        }
        
        function updateCarousel(instant = false) {
            if (isAnimating) return;
            
            const translateX = -currentIndex * slideWidth;
            
            if (instant) {
                track.style.transition = 'none';
            } else {
                track.style.transition = 'transform 0.5s ease';
            }
            
            track.style.transform = `translateX(${translateX}px)`;
            
            if (!instant) {
                isAnimating = true;
                track.addEventListener('transitionend', handleTransitionEnd, { once: true });
            }
        }
        
        function handleTransitionEnd() {
            const totalSlides = slides.length;
            
            // If we're at the cloned slides at the end, jump to the real slides without animation
            if (currentIndex >= totalSlides * 2) {
                currentIndex = totalSlides;
                updateCarousel(true);
            }
            // If we're at the cloned slides at the beginning, jump to the real slides at the end
            else if (currentIndex < 0) {
                currentIndex = totalSlides - 1;
                updateCarousel(true);
            }
            
            isAnimating = false;
        }
        
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex++;
            updateCarousel();
        });
        
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex--;
            updateCarousel();
        });
        
        // Handle responsive changes
        function handleResize() {
            updateSlideWidth();
            updateVisibleSlides();
            updateCarousel(true);
        }
        
        // Debounce resize events
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(handleResize, 100);
        });
        
        // Initialize
        initCarousel();
    });
</script>
@endif

<!-- Berita Section -->
<section id="berita" class="section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-0"><span>Berita Terkini</span></h2>
                <p class="fs-6 mb-0">Informasi terbaru seputar kegiatan desa</p>
            </div>
            @php
                $latestNews = App\Models\News::orderBy('created_at', 'desc')->take(8)->get();
            @endphp
            
            @if(!$latestNews->isEmpty())
            <div class="carousel-nav d-flex align-items-center">
                <div class="berita-carousel-btn berita-prev-btn mx-2" aria-label="Previous">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="berita-carousel-btn berita-next-btn" aria-label="Next">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endif
        </div>
        
        <div class="position-relative px-lg-3">
            @if($latestNews->isEmpty())
                <!-- Warning Alert when no news available -->
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        Data Berita belum tersedia
                    </div>
                </div>
            @else
                <!-- Carousel Container -->
                <div class="berita-carousel-container overflow-hidden">
                    <div class="berita-carousel-track d-flex">
                        <!-- Clone last few slides for infinite effect -->
                        @foreach($latestNews->slice(-0) as $news)
                        <div class="berita-carousel-slide cloned-slide">
                            <a href="{{ route('berita.show', $news->slug) }}" class="text-decoration-none text-dark">
                                <div class="card berita-card h-100 border-0 shadow-hover">
                                    @php
                                        $imagePath = 'storage/berita/' . $news->image;
                                        $defaultImage = 'storage/berita/default-news.jpg';
                                        $imageExists = $news->image && file_exists(public_path($imagePath));
                                    @endphp
                                    <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                                         class="card-img-top" 
                                         alt="{{ $news->title }}" 
                                         style="height: 200px; object-fit: cover;">
                                    
                                    <div class="card-body p-4 position-relative">
                                        <!-- Date Badge -->
                                        <div class="date-badge highlight-date">
                                            <span class="date-day">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d') }}</span>
                                            <span class="date-month">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('M') }}</span>
                                            <span class="date-year">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('Y') }}</span>
                                        </div>

                                        <div class="news-content">
                                            <span class="badge news-category bg-{{ $news->category_color }} bg-opacity-10 text-{{ $news->category_color }} mb-2">{{ $news->category }}</span>
                                            <h5 class="card-title fw-bold mb-3">{{ $news->title }}</h5>
                                            <p class="card-text text-secondary mb-4">{{ Str::limit($news->excerpt, 120) }}</p>
                                            
                                            <div class="news-footer">
                                                <span class="news-author">{{ $news->author }}</span>
                                                <span class="news-views">
                                                    <i class="fas fa-eye me-1"></i> {{ number_format($news->views) }} kali
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                        <!-- Main slides -->
                        @foreach($latestNews as $news)
                        <div class="berita-carousel-slide">
                            <a href="{{ route('berita.show', $news->slug) }}" class="text-decoration-none text-dark">
                                <div class="card berita-card h-100 border-0 shadow-hover">
                                    @php
                                        $imagePath = 'storage/berita/' . $news->image;
                                        $defaultImage = 'storage/berita/default-news.jpg';
                                        $imageExists = $news->image && file_exists(public_path($imagePath));
                                    @endphp
                                    <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                                         class="card-img-top" 
                                         alt="{{ $news->title }}" 
                                         style="height: 200px; object-fit: cover;">
                                    
                                    <div class="card-body p-4 position-relative">
                                        <!-- Date Badge -->
                                        <div class="date-badge highlight-date">
                                            <span class="date-day">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d') }}</span>
                                            <span class="date-month">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('M') }}</span>
                                            <span class="date-year">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('Y') }}</span>
                                        </div>

                                        <div class="news-content">
                                            <span class="badge news-category bg-{{ $news->category_color }} bg-opacity-10 text-{{ $news->category_color }} mb-2">{{ $news->category }}</span>
                                            <h5 class="card-title fw-bold mb-3">{{ $news->title }}</h5>
                                            <p class="card-text text-secondary mb-4">{{ Str::limit($news->excerpt, 120) }}</p>
                                            
                                            <div class="news-footer">
                                                <span class="news-author">{{ $news->author }}</span>
                                                <span class="news-views">
                                                    <i class="fas fa-eye me-1"></i> {{ number_format($news->views) }} kali
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                        <!-- Clone first few slides for infinite effect -->
                        @foreach($latestNews->take(3) as $news)
                        <div class="berita-carousel-slide cloned-slide">
                            <a href="{{ route('berita.show', $news->slug) }}" class="text-decoration-none text-dark">
                                <div class="card berita-card h-100 border-0 shadow-hover">
                                    @php
                                        $imagePath = 'storage/berita/' . $news->image;
                                        $defaultImage = 'storage/berita/default-news.jpg';
                                        $imageExists = $news->image && file_exists(public_path($imagePath));
                                    @endphp
                                    <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                                         class="card-img-top" 
                                         alt="{{ $news->title }}" 
                                         style="height: 200px; object-fit: cover;">
                                    
                                    <div class="card-body p-4 position-relative">
                                        <!-- Date Badge -->
                                        <div class="date-badge highlight-date">
                                            <span class="date-day">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d') }}</span>
                                            <span class="date-month">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('M') }}</span>
                                            <span class="date-year">{{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('Y') }}</span>
                                        </div>

                                        <div class="news-content">
                                            <span class="badge news-category bg-{{ $news->category_color }} bg-opacity-10 text-{{ $news->category_color }} mb-2">{{ $news->category }}</span>
                                            <h5 class="card-title fw-bold mb-3">{{ $news->title }}</h5>
                                            <p class="card-text text-secondary mb-4">{{ Str::limit($news->excerpt, 120) }}</p>
                                            
                                            <div class="news-footer">
                                                <span class="news-author">{{ $news->author }}</span>
                                                <span class="news-views">
                                                    <i class="fas fa-eye me-1"></i> {{ number_format($news->views) }} kali
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('berita') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                <i class="fas fa-newspaper me-2"></i> Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<style>
    :root {
        --news-card-radius: 16px;
        --news-transition: all 0.3s ease-in-out;
        --purple: #6f42c1;
        --orange: #fd7e14;
        --pink: #d63384;
    }
    
    /* Berita Card Styling */
    .berita-card {
        border-radius: var(--news-card-radius);
        transition: var(--news-transition);
        height: 100%;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }
    
    .berita-card .card-img-top {
        border-top-left-radius: var(--news-card-radius);
        border-top-right-radius: var(--news-card-radius);
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    
    .shadow-hover {
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }
    
    .shadow-hover:hover {
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transform: translateY(-5px);
        border-color: rgba(0,0,0,0.1);
    }
    
    .date-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: white;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        z-index: 2;
        transition: var(--news-transition);
    }
    
    .berita-card:hover .date-badge {
        transform: scale(1.05);
    }
    
    .highlight-date {
        background: linear-gradient(135deg, #3498db, #2c3e50);
        color: white;
    }
    
    .date-day {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
    }
    
    .date-month {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: -3px;
    }
    
    .date-year {
        font-size: 0.65rem;
        font-weight: 500;
        opacity: 0.8;
    }
    
    .news-content {
        padding-right: 70px;
    }
    
    .news-category {
        border-radius: 6px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        padding: 5px 10px;
    }
    
    .card-title {
        font-size: 1.1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.55em;
    }
    
    .card-text {
        font-size: 0.9rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 4.5em;
        color: #6c757d !important;
    }
    
    .news-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(0,0,0,0.05);
    }
    
    .news-author {
        font-size: 0.8rem;
        font-weight: 600;
        color: #495057;
    }
    
    .news-views {
        font-size: 0.8rem;
        color: #6c757d;
    }
    
    /* Carousel Styling */
    .berita-carousel-container {
        padding: 2px 0;
        cursor: grab;
    }
    
    .berita-carousel-container:active {
        cursor: grabbing;
    }
    
    .berita-carousel-track {
        transition: transform 0.5s ease;
        gap: 15px;
    }
    
    .berita-carousel-slide {
        flex: 0 0 calc(100% - 15px);
        min-width: 0;
    }
    
    .berita-carousel-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: white;
        border: 1px solid #dee2e6;
        color: #495057;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    
    .berita-carousel-btn:hover {
        background: #f8f9fa;
        color: #0d6efd;
        transform: scale(1.03);
    }
    
    .berita-carousel-btn:active {
        transform: scale(0.97);
    }
    
    .berita-carousel-btn a {
        color: inherit;
        text-decoration: none;
    }
    
    /* Alert Styling */
    .alert-warning {
        background-color: #fff3cd;
        border-color: #ffeeba;
        color: #856404;
    }
    
    .fa-info-circle {
        font-size: 1.2rem;
    }
    
    /* Responsive Breakpoints */
    @media (min-width: 576px) {
        .berita-carousel-slide {
            flex: 0 0 calc(80% - 12px);
        }
    }
    
    @media (min-width: 768px) {
        .berita-carousel-slide {
            flex: 0 0 calc(50% - 12px);
        }
    }
    
    @media (min-width: 992px) {
        .berita-carousel-slide {
            flex: 0 0 calc(33.333% - 12px);
        }
    }
    
    @media (min-width: 1200px) {
        .berita-carousel-slide {
            flex: 0 0 calc(33.333%  - 12px);
        }
    }
    
    @media (max-width: 768px) {
        .date-badge {
            width: 50px;
            height: 50px;
            top: 15px;
            right: 15px;
        }
        
        .date-day {
            font-size: 1.2rem;
        }
        
        .date-month {
            font-size: 0.65rem;
        }
        
        .date-year {
            font-size: 0.55rem;
        }
        
        .news-content {
            padding-right: 60px;
        }
    }
</style>

@if(!$latestNews->isEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.berita-carousel-track');
        const slides = Array.from(document.querySelectorAll('.berita-carousel-slide:not(.cloned-slide)'));
        const nextBtn = document.querySelector('.berita-next-btn a');
        const prevBtn = document.querySelector('.berita-prev-btn a');
        const container = document.querySelector('.berita-carousel-container');
        
        let currentIndex = 0;
        let isAnimating = false;
        let slideWidth = 0;
        let visibleSlides = 0;
        
        // Initialize carousel
        function initCarousel() {
            updateSlideWidth();
            updateVisibleSlides();
            
            // Start at the first real slide (after cloned slides at beginning)
            currentIndex = slides.length;
            updateCarousel(true);
        }
        
        function updateSlideWidth() {
            if (slides.length > 0) {
                slideWidth = slides[0].offsetWidth + 15; // including gap
            }
        }
        
        function updateVisibleSlides() {
            if (!container) {
                visibleSlides = 1;
                return;
            }
            
            const containerWidth = container.offsetWidth;
            if (containerWidth >= 1200) visibleSlides = 3;
            else if (containerWidth >= 992) visibleSlides = 2;
            else if (containerWidth >= 768) visibleSlides = 2;
            else if (containerWidth >= 576) visibleSlides = 1;
            else visibleSlides = 1;
        }
        
        function updateCarousel(instant = false) {
            if (isAnimating) return;
            
            const translateX = -currentIndex * slideWidth;
            
            if (instant) {
                track.style.transition = 'none';
            } else {
                track.style.transition = 'transform 0.5s ease';
            }
            
            track.style.transform = `translateX(${translateX}px)`;
            
            if (!instant) {
                isAnimating = true;
                track.addEventListener('transitionend', handleTransitionEnd, { once: true });
            }
        }
        
        function handleTransitionEnd() {
            const totalSlides = slides.length;
            
            // If we're at the cloned slides at the end, jump to the real slides without animation
            if (currentIndex >= totalSlides * 2) {
                currentIndex = totalSlides;
                updateCarousel(true);
            }
            // If we're at the cloned slides at the beginning, jump to the real slides at the end
            else if (currentIndex < 0) {
                currentIndex = totalSlides - 1;
                updateCarousel(true);
            }
            
            isAnimating = false;
        }
        
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex++;
            updateCarousel();
        });
        
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex--;
            updateCarousel();
        });
        
        // Handle responsive changes
        function handleResize() {
            updateSlideWidth();
            updateVisibleSlides();
            updateCarousel(true);
        }
        
        // Debounce resize events
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(handleResize, 100);
        });
        
        // Initialize
        initCarousel();
    });
</script>
@endif



@php
    $socialMedia = App\Models\SocialMedia::first(); // Ambil data dari database
@endphp

<!-- Belanja Section -->
<!-- Belanja Section -->
<section id="belanja" class="section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-0"><span>Produk Desa</span></h2>
                <p class="fs-6 mb-0">Produk unggulan langsung dari masyarakat desa</p>
            </div>
            <div class="carousel-nav d-flex align-items-center">
                <div class="produk-carousel-btn produk-prev-btn mx-2" aria-label="Previous">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="produk-carousel-btn produk-next-btn" aria-label="Next">
                    <a href="#" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%;">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="position-relative px-lg-3">
            @php
                $latestProducts = App\Models\Product::orderBy('created_at', 'desc')->take(8)->get();
            @endphp
            
            @if($latestProducts->isEmpty())
                <!-- Warning Alert when no products available -->
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-info-circle me-2"></i>
                    <div>
                        Data Produk belum tersedia
                    </div>
                </div>
            @else
                <!-- Carousel Container -->
                <div class="produk-carousel-container overflow-hidden">
                    <div class="produk-carousel-track d-flex">
                        <!-- Clone last few slides for infinite effect (placed at beginning) -->
                        @foreach($latestProducts->slice(-0) as $product)
                        <div class="produk-carousel-slide cloned-slide">
                            <div class="card product-card h-100 border-0">
                                @if($product->badge)
                                    <div class="badge {{ $product->badge_class }} position-absolute m-2">{{ $product->badge }}</div>
                                @endif
                                @php
                                    $imagePath = 'storage/belanja/' . $product->image;
                                    $defaultImage = 'storage/belanja/default-product.jpg';
                                    $imageExists = $product->image && file_exists(public_path($imagePath));
                                @endphp
                                <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" class="card-img-top w-100" alt="{{ $product->name }}" loading="lazy">
                                <div class="card-body p-1">
                                    <div class="product-info">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="text-muted mb-2 small"><i class="fas fa-map-marker-alt me-1"></i>{{ $product->location }}</p>
                                        <p class="product-description small text-muted mb-2">{{ Str::limit($product->description, 80) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-1">
                                        <div class="product-price text-primary fw-bold ">Rp {{ number_format($product->price) }}</div>
                                        <div class="product-rating text-warning small m-0 ">
                                            <i class="fas fa-star"> </i> {{ number_format($product->rating, 1) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 pt-0 pb-2 px-1">
                                    @if($socialMedia->active_wa && $socialMedia->link_wa)
                                        <a href="{{ $socialMedia->link_wa }}" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center">
                                            <i class="fab fa-whatsapp me-2"></i> Beli Sekarang
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Main slides -->
                        @foreach($latestProducts as $product)
                        <div class="produk-carousel-slide">
                            <div class="card product-card h-100 border-0">
                                @if($product->badge)
                                    <div class="badge {{ $product->badge_class }} position-absolute m-2">{{ $product->badge }}</div>
                                @endif
                                @php
                                    $imagePath = 'storage/belanja/' . $product->image;
                                    $defaultImage = 'storage/belanja/default-product.jpg';
                                    $imageExists = $product->image && file_exists(public_path($imagePath));
                                @endphp
                                <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" class="card-img-top w-100" alt="{{ $product->name }}" loading="lazy">
                                <div class="card-body p-1">
                                    <div class="product-info">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="text-muted mb-2 small"><i class="fas fa-map-marker-alt me-1"></i>{{ $product->location }}</p>
                                        <p class="product-description small text-muted mb-2">{{ Str::limit($product->description, 80) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mx-auto pt-1">
                                        <div class="product-price text-primary fw-bold">Rp {{ number_format($product->price) }}</div>
                                        <div class="product-rating text-warning small">
                                            <i class="fas fa-star"></i>
                                            <span>{{ number_format($product->rating, 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 pt-0 pb-2 px-1">
                                    @if($socialMedia->active_wa && $socialMedia->link_wa)
                                        <a href="{{ $socialMedia->link_wa }}" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center">
                                            <i class="fab fa-whatsapp me-2"></i> Beli Sekarang
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Clone first few slides for infinite effect (placed at end) -->
                        @foreach($latestProducts->take(4) as $product)
                        <div class="produk-carousel-slide cloned-slide">
                            <div class="card product-card h-100 border-0">
                                @if($product->badge)
                                    <div class="badge {{ $product->badge_class }} position-absolute m-2">{{ $product->badge }}</div>
                                @endif
                                @php
                                    $imagePath = 'storage/belanja/' . $product->image;
                                    $defaultImage = 'storage/belanja/default-product.jpg';
                                    $imageExists = $product->image && file_exists(public_path($imagePath));
                                @endphp
                                <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" class="card-img-top w-100" alt="{{ $product->name }}" loading="lazy">
                                <div class="card-body p-1">
                                    <div class="product-info">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="text-muted mb-2 small"><i class="fas fa-map-marker-alt me-1"></i>{{ $product->location }}</p>
                                        <p class="product-description small text-muted mb-2">{{ Str::limit($product->description, 80) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mx-auto pt-1">
                                        <div class="product-price text-primary fw-bold">Rp {{ number_format($product->price) }}</div>
                                        <div class="product-rating text-warning small">
                                            <i class="fas fa-star"></i>
                                            <span>{{ number_format($product->rating, 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top-0 pt-0 pb-2 px-1">
                                    @if($socialMedia->active_wa && $socialMedia->link_wa)
                                        <a href="{{ $socialMedia->link_wa }}" class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center">
                                            <i class="fab fa-whatsapp me-2"></i> Beli Sekarang
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('belanja') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                <i class="fas fa-store me-2"></i> Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<style>
    /* Product Card Styling */
    .product-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        background: white;
        display: flex;
        flex-direction: column;
    }
    
    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .product-card img {
        height: 180px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover img {
        transform: scale(1.03);
    }
    
    .card-title {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 0.4rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-description {
        font-size: 0.8rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .product-price {
        font-size: 1rem;
        margin-right: 15px;
    }
    
    /* Carousel Styling */
    .produk-carousel-container {
        padding: 2px 0;
        cursor: grab;
    }
    
    .produk-carousel-container:active {
        cursor: grabbing;
    }
    
    .produk-carousel-track {
        transition: transform 0.5s ease;
        gap: 15px;
    }
    
    .produk-carousel-slide {
        flex: 0 0 calc(100% - 15px);
        min-width: 0;
    }
    
    .carousel-nav {
        position: static;
        transform: none;
    }
    
    .produk-carousel-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: white;
        border: 1px solid #dee2e6;
        color: #495057;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    
    .produk-carousel-btn:hover {
        background: #f8f9fa;
        color: #0d6efd;
        transform: scale(1.03);
    }
    
    .produk-carousel-btn:active {
        transform: scale(0.97);
    }
    
    .produk-carousel-btn a {
        color: inherit;
        text-decoration: none;
    }
    
    /* Responsive Breakpoints */
    @media (min-width: 576px) {
        .produk-carousel-slide {
            flex: 0 0 calc(50% - 12px);
        }
    }
    
    @media (min-width: 768px) {
        .produk-carousel-slide {
            flex: 0 0 calc(33.333% - 12px);
        }
        
        .product-card img {
            height: 200px;
        }
    }
    
    @media (min-width: 992px) {
        .produk-carousel-slide {
            flex: 0 0 calc(33.333% - 12px);
        }
    }
    
    @media (min-width: 1200px) {
        .produk-carousel-slide {
            flex: 0 0 calc(25% - 12px);
        }
    }
</style>

@if(!$latestProducts->isEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.produk-carousel-track');
        const slides = Array.from(document.querySelectorAll('.produk-carousel-slide:not(.cloned-slide)'));
        const nextBtn = document.querySelector('.produk-next-btn a');
        const prevBtn = document.querySelector('.produk-prev-btn a');
        const container = document.querySelector('.produk-carousel-container');
        
        let currentIndex = 0;
        let isAnimating = false;
        let slideWidth = 0;
        let visibleSlides = 0;
        
        // Initialize carousel
        function initCarousel() {
            updateSlideWidth();
            updateVisibleSlides();
            
            // Start at the first real slide (after cloned slides at beginning)
            currentIndex = slides.length;
            updateCarousel(true);
        }
        
        function updateSlideWidth() {
            if (slides.length > 0) {
                slideWidth = slides[0].offsetWidth + 15; // including gap
            }
        }
        
        function updateVisibleSlides() {
            if (!container) {
                visibleSlides = 1;
                return;
            }
            
            const containerWidth = container.offsetWidth;
            if (containerWidth >= 1200) visibleSlides = 4;
            else if (containerWidth >= 992) visibleSlides = 3;
            else if (containerWidth >= 768) visibleSlides = 3;
            else if (containerWidth >= 576) visibleSlides = 2;
            else visibleSlides = 1;
        }
        
        function updateCarousel(instant = false) {
            if (isAnimating) return;
            
            const translateX = -currentIndex * slideWidth;
            
            if (instant) {
                track.style.transition = 'none';
            } else {
                track.style.transition = 'transform 0.5s ease';
            }
            
            track.style.transform = `translateX(${translateX}px)`;
            
            if (!instant) {
                isAnimating = true;
                track.addEventListener('transitionend', handleTransitionEnd, { once: true });
            }
        }
        
        function handleTransitionEnd() {
            const totalSlides = slides.length;
            
            // If we're at the cloned slides at the end, jump to the real slides without animation
            if (currentIndex >= totalSlides * 2) {
                currentIndex = totalSlides;
                updateCarousel(true);
            }
            // If we're at the cloned slides at the beginning, jump to the real slides at the end
            else if (currentIndex < 0) {
                currentIndex = totalSlides - 1;
                updateCarousel(true);
            }
            
            isAnimating = false;
        }
        
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex++;
            updateCarousel();
        });
        
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (isAnimating) return;
            currentIndex--;
            updateCarousel();
        });
        
        // Handle responsive changes
        function handleResize() {
            updateSlideWidth();
            updateVisibleSlides();
            updateCarousel(true);
        }
        
        // Debounce resize events
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(handleResize, 100);
        });
        
        // Initialize
        initCarousel();
    });
</script>
@endif

 <!-- PPID Section -->
<section id="ppid" class="section py-5">
    <div class="container">
        <!-- Animated Title -->
        <h2 class="section-title ">
            <span class="title-line">PPID Desa</span>
            
        </h2>
        <p class="fs-6 mb-3">PPID (Pejabat Pengelola Informasi dan Dokumentasi) merupakan unit yang bertugas mengelola informasi publik di lingkungan pemerintah desa.</p>
        
        <div class="row g-4 justify-content-center">
            <!-- Ubah class col menjadi col-12 untuk lebar penuh -->
            <div class="col-12 col-md-12 col-lg-12">
                <!-- First Card with Animation -->
                <div class="ppid-card animate__animated">
                    <div class="card-overlay"></div>
                    <div class="ppid-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="ppid-content">
                        <h3>Informasi Publik</h3>
                        <p class="mb-4">Dapatkan informasi resmi dari Pemerintah Gampong Baro melalui kanal PPID.</p>
                        <a href="{{ route('ppid') }}" class="btn btn-elegant">
                            <span>Akses Informasi</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="card-decoration"></div>
                </div>
            </div>
            
            <div class="col-12 col-md-10 col-lg-10 mt-4">
                <!-- Second Card with Animation -->
                {{-- <div class="ppid-card animate__animated">
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
                </div> --}}
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