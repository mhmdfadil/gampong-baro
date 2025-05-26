@extends('components.main')

@section('content')
<div class="struktur-organisasi-page">
    <!-- Hero Section -->
    <div class="hero-section py-4 mb-4" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title"><span>Struktur Organisasi</span></h2>
                    <p class="mb-3 fs-6">Kenali tim kami yang berdedikasi dalam membangun dan mengembangkan desa. Kami bekerja bersama untuk menciptakan dampak positif bagi masyarakat.</p>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1579389083078-4e7018379f7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" 
                         alt="Tim Kami" 
                         class="img-fluid rounded-3 shadow" 
                         style="transform: rotate(3deg);">
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
            
            // Categorize by position (you might want to adjust this logic based on your actual data)
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
            <div class="col-12 text-center mb-4">
                <h3 class="h4 fw-bold" style="color: #3a7bd5;">Pimpinan</h3>
                <div class="divider mx-auto" style="width: 80px; height: 3px; background: #3a7bd5;"></div>
            </div>
            
            @foreach($levels['top'] as $leader)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card leader-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $leader->foto) }}" 
                             class="card-img-top" 
                             alt="{{ $leader->nama }}" 
                             style="height: 280px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 p-3 text-white" style="background: rgba(0,0,0,0.6);">
                            <h5 class="card-title mb-0">{{ $leader->nama }}</h5>
                            <p class="card-text mb-0" style="font-size: 14px;">{{ $leader->jabatan }}</p>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            @if($leader->whatsapp)
                            <a href="{{ $leader->whatsapp_link }}" target="_blank" class="btn btn-sm btn-success rounded-circle" style="width: 36px; height: 36px;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            @endif
                            
                            @if($leader->email)
                            <a href="{{ $leader->email_link }}" class="btn btn-sm btn-primary rounded-circle" style="width: 36px; height: 36px;">
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
            <div class="col-12 text-center mb-4">
                <h3 class="h4 fw-bold" style="color: #3a7bd5;">Manajemen</h3>
                <div class="divider mx-auto" style="width: 80px; height: 3px; background: #3a7bd5;"></div>
            </div>
            
            @foreach($levels['high'] as $manager)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card team-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $manager->foto) }}" 
                         class="card-img-top" 
                         alt="{{ $manager->nama }}" 
                         style="height: 220px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1">{{ $manager->nama }}</h5>
                        <p class="card-text text-muted" style="font-size: 14px;">{{ $manager->jabatan }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            @if($manager->whatsapp)
                            <a href="{{ $manager->whatsapp_link }}" target="_blank" class="btn btn-sm btn-outline-success rounded-circle" style="width: 32px; height: 32px;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            @endif
                            
                            @if($manager->email)
                            <a href="{{ $manager->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 32px; height: 32px;">
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
            <div class="col-12 text-center mb-4">
                <h3 class="h4 fw-bold" style="color: #3a7bd5;">Koordinator</h3>
                <div class="divider mx-auto" style="width: 80px; height: 3px; background: #3a7bd5;"></div>
            </div>
            
            @foreach($levels['mid'] as $coordinator)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card team-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $coordinator->foto) }} "
                         class="card-img-top" 
                         alt="{{ $coordinator->nama }}" 
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-1" style="font-size: 16px;">{{ $coordinator->nama }}</h5>
                        <p class="card-text text-muted" style="font-size: 13px;">{{ $coordinator->jabatan }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            @if($coordinator->whatsapp)
                            <a href="{{ $coordinator->whatsapp_link }}" target="_blank" class="btn btn-sm btn-outline-success rounded-circle" style="width: 30px; height: 30px;">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            @endif
                            
                            @if($coordinator->email)
                            <a href="{{ $coordinator->email_link }}" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 30px; height: 30px;">
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

        <!-- Low Level (Staff) -->
        @if(!empty($levels['low']))
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <h3 class="h4 fw-bold" style="color: #3a7bd5;">Anggota</h3>
                <div class="divider mx-auto" style="width: 80px; height: 3px; background: #3a7bd5;"></div>
            </div>
            
            @foreach($levels['low'] as $staff)
            <div class="col-6 col-md-4 col-lg-2 mb-4">
                <div class="card staff-card h-100 border-0 rounded-3 overflow-hidden shadow-sm">
                    <img src="{{ asset('storage/' . $staff->foto) }}" 
                         class="card-img-top" 
                         alt="{{ $staff->nama }}" 
                         style="height: 150px; object-fit: cover;">
                    <div class="card-body text-center p-2">
                        <h5 class="card-title mb-0" style="font-size: 14px;">{{ $staff->nama }}</h5>
                        <p class="card-text text-muted mb-1" style="font-size: 12px;">{{ $staff->jabatan }}</p>
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
    }
    
    .hero-section {
        border-radius: 0 0 20px 20px;
    }
    
    .leader-card, .team-card, .staff-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .leader-card:hover, .team-card:hover, .staff-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .card-img-top {
        transition: transform 0.5s ease;
    }
    
    .leader-card:hover .card-img-top,
    .team-card:hover .card-img-top,
    .staff-card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .leader-card, .team-card {
            margin-bottom: 20px;
        }
        
        .staff-card {
            margin-bottom: 15px;
        }
    }
    
    @media (max-width: 575.98px) {
        .staff-card {
            margin-bottom: 10px;
        }
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection