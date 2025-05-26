@extends('components.main')

@section('content')
<div class="struktur-organisasi-page">
    <!-- Hero Section -->
    <div class="hero-section py-5 mb-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-3 text-primary">Struktur Organisasi</h1>
                    <p class="lead text-muted mb-4">Kenali tim kami yang berdedikasi dalam membangun dan mengembangkan desa. Kami bekerja bersama untuk menciptakan dampak positif bagi masyarakat.</p>
                    <div class="d-flex align-items-center">
                        <div class="vr me-3" style="height: 40px; opacity: 0.3;"></div>
                        <div>
                            <p class="mb-0 small text-uppercase fw-semibold">Tim Solid</p>
                            <p class="mb-0 small text-muted">Bersinergi untuk kemajuan desa</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1579389083078-4e7018379f7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Tim Kami" 
                             class="img-fluid rounded-4 shadow-lg" 
                             style="transform: rotate(3deg);">
                        <div class="position-absolute bottom-0 end-0 bg-white p-2 rounded-3 shadow-sm" style="transform: translate(20px, 20px);">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary rounded-circle me-2" style="width: 30px; height: 30px;"></div>
                                <div>
                                    <p class="mb-0 small fw-bold">Solid Team</p>
                                    <p class="mb-0 small text-muted">Bersama Membangun Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Organization Structure -->
    <div class="container mb-5">
        @php
            $struktur = App\Models\StrukturOrganisasi::aktif()->urutan()->get();
            $levels = [
                'top' => [],
                'high' => [],
                'mid' => [],
                'low' => []
            ];
            
            // Categorize by position
            foreach ($struktur as $person) {
                if (str_contains(strtolower($person->jabatan), 'kepala') || str_contains(strtolower($person->jabatan), 'ketua')) {
                    $levels['top'][] = $person;
                } elseif (str_contains(strtolower($person->jabatan), 'wakil') || str_contains(strtolower($person->jabatan), 'sekretaris') || str_contains(strtolower($person->jabatan), 'bendahara')) {
                    $levels['high'][] = $person;
                } elseif (str_contains(strtolower($person->jabatan), 'koordinator') || str_contains(strtolower($person->jabatan), 'divisi')) {
                    $levels['mid'][] = $person;
                } else {
                    $levels['low'][] = $person;
                }
            }
        @endphp

        <!-- Top Level (Leadership) -->
        @if(!empty($levels['top']))
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold mb-3 position-relative d-inline-block">
                    <span class="position-relative z-2">Pimpinan</span>
                    
                </h2>
                <p class="text-muted fs-6 max-w-800 mx-auto">Para pemimpin yang mengarahkan visi dan misi organisasi kami</p>
            </div>
            
            @foreach($levels['top'] as $leader)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card leader-card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
                    <div class="position-relative">
                        <div class="aspect-ratio-box" style="--aspect-ratio: 1/1.25;">
                            <img src="{{ asset('storage/' . $leader->foto) }}" 
                                 class="card-img-top object-fit-cover" 
                                 alt="{{ $leader->nama }}">
                        </div>
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);">
                            <h5 class="card-title mb-0">{{ $leader->nama }}</h5>
                            <p class="card-text mb-0 opacity-75">{{ $leader->jabatan }}</p>
                        </div>
                    </div>
                    <div class="card-body text-center px-4 py-3">
                        <div class="d-flex justify-content-center gap-3 mt-2">
                            @if($leader->whatsapp)
                            <a href="{{ $leader->whatsapp_link }}" target="_blank" class="btn btn-sm btn-success rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            @endif
                            
                            @if($leader->email)
                            <a href="{{ $leader->email_link }}" class="btn btn-sm btn-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- High Level (Management) -->
        @if(!empty($levels['high']))
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold mb-3 position-relative d-inline-block">
                    <span class="position-relative z-2">Manajemen</span>
                    
                </h2>
                <p class="text-muted fs-6 max-w-800 mx-auto">Tim manajemen yang menjalankan operasional organisasi</p>
            </div>
            
            @foreach($levels['high'] as $manager)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card team-card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
                    <div class="aspect-ratio-box" style="--aspect-ratio: 1/1.35;">
                        <img src="{{ asset('storage/' . $manager->foto) }}" 
                             class="card-img-top object-fit-cover" 
                             alt="{{ $manager->nama }}">
                    </div>
                    <div class="card-body text-center px-3 py-3">
                        <h5 class="card-title mb-1">{{ $manager->nama }}</h5>
                        <p class="card-text text-muted small">{{ $manager->jabatan }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            @if($manager->whatsapp)
                            <a href="{{ $manager->whatsapp_link }}" target="_blank" class="btn btn-sm btn-outline-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            @endif
                            
                            @if($manager->email)
                            <a href="{{ $manager->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="bi bi-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Mid Level (Coordinators) -->
        @if(!empty($levels['mid']))
        <div class="row justify-content-center mb-5">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold mb-3 position-relative d-inline-block">
                    <span class="position-relative z-2">Koordinator</span>
                  
                </h2>
                <p class="text-muted fs-6 max-w-800 mx-auto">Para koordinator yang memastikan setiap divisi berjalan dengan baik</p>
            </div>
            
            @foreach($levels['mid'] as $coordinator)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card team-card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
                    <div class="aspect-ratio-box" style="--aspect-ratio: 1/1.4;">
                        <img src="{{ asset('storage/' . $coordinator->foto) }}"
                             class="card-img-top object-fit-cover" 
                             alt="{{ $coordinator->nama }}">
                    </div>
                    <div class="card-body text-center px-3 py-3">
                        <h5 class="card-title mb-1 fs-6">{{ $coordinator->nama }}</h5>
                        <p class="card-text text-muted small">{{ $coordinator->jabatan }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            @if($coordinator->whatsapp)
                            <a href="{{ $coordinator->whatsapp_link }}" target="_blank" class="btn btn-sm btn-outline-success rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                <i class="bi bi-whatsapp fs-6"></i>
                            </a>
                            @endif
                            
                            @if($coordinator->email)
                            <a href="{{ $coordinator->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                <i class="bi bi-envelope fs-6"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <!-- Low Level (Staff) -->
        @if(!empty($levels['low']))
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold mb-3 position-relative d-inline-block">
                    <span class="position-relative z-2">Anggota</span>
                </h2>
                <p class="text-muted fs-6 max-w-800 mx-auto">Anggota tim yang bekerja keras di lapangan</p>
            </div>
            
            @foreach($levels['low'] as $staff)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <div class="card staff-card h-100 border-0 rounded-4 overflow-hidden shadow-sm">
                    <div class="aspect-ratio-box" style="--aspect-ratio: 1/1.2;">
                        <img src="{{ asset('storage/' . $staff->foto) }}" 
                             class="card-img-top object-fit-cover" 
                             alt="{{ $staff->nama }}">
                    </div>
                    <div class="card-body text-center p-3">
                        <h5 class="card-title mb-0 fs-6">{{ $staff->nama }}</h5>
                        <p class="card-text text-muted small mb-0">{{ $staff->jabatan }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<style>
    /* Custom CSS */
    .struktur-organisasi-page {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }
    
    .hero-section {
        border-radius: 0 0 20px 20px;
        position: relative;
        overflow: hidden;
    }
    
    .max-w-800 {
        max-width: 800px;
    }
    
    .aspect-ratio-box {
        position: relative;
        width: 100%;
    }
    
    .aspect-ratio-box::before {
        content: "";
        display: block;
        padding-bottom: calc(100% / (var(--aspect-ratio)));
    }
    
    .aspect-ratio-box img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .leader-card, .team-card, .staff-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        background-color: #fff;
    }
    
    .leader-card:hover, .team-card:hover, .staff-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .card-img-top {
        transition: transform 0.5s ease;
    }
    
    .leader-card:hover .card-img-top,
    .team-card:hover .card-img-top,
    .staff-card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    /* Section headers */
    .section-header {
        position: relative;
        display: inline-block;
    }
    
    .section-header::after {
        content: "";
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(to right, #3a7bd5, #00d2ff);
        border-radius: 3px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .leader-card, .team-card {
            margin-bottom: 20px;
        }
        
        .staff-card {
            margin-bottom: 15px;
        }
        
        .hero-section {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
    }
    
    @media (max-width: 575.98px) {
        .staff-card {
            margin-bottom: 10px;
        }
        
        .hero-section h1 {
            font-size: 2rem;
        }
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection