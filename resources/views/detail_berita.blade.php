@extends('components.main')

@section('content')
<div class="container-fluid px-lg-5 px-md-3 px-2 py-4">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('berita') }}" class="text-decoration-none">
                    <i class="fas fa-home me-1"></i> Berita
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($news->title, 50) }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Main Content (Left Column) -->
        <div class="col-lg-8">
            <article class="news-detail bg-white rounded-4 shadow-sm p-3 p-md-4 p-lg-5">
                <!-- News Header -->
                <div class="news-header mb-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                        <span class="badge news-category bg-{{ $news->category_color }} bg-opacity-10 text-{{ $news->category_color }} px-3 py-2 rounded-pill fw-medium">
                            {{ $news->category }}
                        </span>
                        
                        <!-- Social Share Buttons -->
                        <div class="social-share d-flex gap-2">
                            @php
                                $shareText = "Baca berita: " . $news->title;
                                $shareUrl = url()->current();
                            @endphp
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-icon btn-outline-primary rounded-circle"
                               title="Share on Facebook"
                               data-bs-toggle="tooltip">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($shareText . ' ' . $shareUrl) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-icon btn-outline-success rounded-circle"
                               title="Share on WhatsApp"
                               data-bs-toggle="tooltip">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($shareText) }}&url={{ urlencode($shareUrl) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-icon btn-outline-dark rounded-circle"
                               title="Share on X"
                               data-bs-toggle="tooltip">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    
                    <h1 class="mb-1 fw-bold">{{ $news->title }}</h1>
                    
                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted mb-4 small">
                        <div class="d-flex align-items-center">
                            <i class="far fa-calendar-alt me-2"></i> 
                            {{ Carbon\Carbon::parse($news->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </div>
                        <div class="vr d-none d-sm-block"></div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user me-2"></i> {{ $news->author }}
                        </div>
                        <div class="vr d-none d-sm-block"></div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye me-2"></i> {{ number_format($news->views) }}x dilihat
                        </div>
                    </div>
                </div>
                
                <!-- News Image -->
                @php
                    $imagePath = 'storage/berita/' . $news->image;
                    $defaultImage = 'storage/berita/default-news.jpg';
                    $imageExists = $news->image && file_exists(public_path($imagePath));
                @endphp
                <div class="news-image mb-4 mb-md-5">
                    <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                         class="img-fluid rounded-4 w-100" 
                         alt="{{ $news->title }}"
                         style="max-height: 500px; object-fit: cover; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                </div>
                
                <!-- News Content -->
                <div class="news-content mb-5">
                    {!! $news->content !!}
                </div>
                
                <!-- Tags (if available) -->
                @if($news->tags)
                <div class="news-tags mt-4 mt-md-5 pt-3 pt-md-4 border-top">
                    <h5 class="fw-bold mb-3 d-flex align-items-center gap-2">
                        <i class="fas fa-tags"></i> Tags
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(explode(',', $news->tags) as $tag)
                        <a href="#" class="badge bg-light text-dark text-decoration-none px-3 py-2 rounded-pill">
                            <i class="fas fa-hashtag me-1"></i> {{ trim($tag) }}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </article>
        </div>
        
        <!-- Sidebar (Right Column) -->
        <div class="col-lg-4">
            <!-- Latest News Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-primary bg-opacity-10 border-0 py-3">
                    <h4 class="fw-bold mb-0 d-flex align-items-center gap-2">
                        <i class="fas fa-newspaper"></i> Berita Terbaru
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($latestNews as $latest)
                        <a href="{{ route('berita.show', $latest->slug) }}" 
                           class="list-group-item list-group-item-action border-0 py-3 px-3 hover-bg-light">
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    @php
                                        $latestImagePath = 'storage/berita/' . $latest->image;
                                        $latestImageExists = $latest->image && file_exists(public_path($latestImagePath));
                                    @endphp
                                    <img src="{{ $latestImageExists ? asset($latestImagePath) : asset($defaultImage) }}" 
                                         class="img-fluid rounded-3" 
                                         alt="{{ $latest->title }}"
                                         style="height: 60px; width: 100%; object-fit: cover;">
                                </div>
                                <div class="col-9">
                                    <h6 class="fw-bold mb-1">{{ Str::limit($latest->title, 50) }}</h6>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <span><i class="far fa-calendar-alt me-1"></i> 
                                            {{ Carbon\Carbon::parse($latest->created_at)->locale('id')->isoFormat('D MMM Y') }}
                                        </span>
                                        <span class="vr d-none d-sm-inline-block"></span>
                                        <span class="d-none d-sm-inline-block"><i class="fas fa-eye me-1"></i> {{ number_format($latest->views) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Newsletter Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-gradient-primary text-white border-0 py-3">
                    <h4 class="fw-bold mb-0 d-flex align-items-center gap-2" style="color: white">
                        <i class="fas fa-envelope"></i> Newsletter
                    </h4>
                </div>
                <div class="card-body p-3 p-md-4">
                    <p class="mb-3">Dapatkan update berita terbaru langsung ke email Anda</p>
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <input type="email" class="form-control rounded-pill" placeholder="Alamat Email" required>
                            <div class="invalid-feedback">
                                Harap masukkan email yang valid
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .news-detail {
        line-height: 1.8;
    }
    
    .news-header h1 {
        color: #2c3e50;
        line-height: 1.3;
        font-size: 2.1rem;
        font-weight: 500;
    }
    
    .news-content {
        color: #4a5568;
        font-size: 1rem;
        line-height: 1.8;
    }
    
    .news-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 1.5rem 0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .news-content p {
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }
    
    .news-content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 1.25rem;
        color: #2d3748;
    }
    
    .news-content h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-top: 1.75rem;
        margin-bottom: 1rem;
        color: #2d3748;
    }
    
    .news-content h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        color: #2d3748;
    }
    
    .news-content blockquote {
        border-left: 4px solid #4299e1;
        padding: 0.5rem 1.5rem;
        margin: 1.5rem 0;
        color: #4a5568;
        font-style: italic;
        background-color: #f8fafc;
        border-radius: 0 8px 8px 0;
    }
    
    .news-content ul,
    .news-content ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }
    
    .news-content li {
        margin-bottom: 0.5rem;
    }
    
    .btn-icon {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
    
    .hover-bg-light:hover {
        background-color: #f8f9fa !important;
    }
    
    .breadcrumb {
        background-color: transparent;
        padding: 0;
        font-size: 0.9rem;
    }
    
    .breadcrumb-item a {
        color: #64748b;
        transition: color 0.2s;
    }
    
    .breadcrumb-item a:hover {
        color: #3b82f6;
    }
    
    .social-share .btn {
        transition: all 0.2s;
        width: 32px;
        height: 32px;
    }
    
    .social-share .btn:hover {
        transform: translateY(-2px);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }
    
    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .news-header h1 {
            font-size: 1.5rem;
            font-weight: 500;
        }
        
        .news-header .d-flex {
            gap: 0.5rem;
        }
        
        .news-header .vr {
            display: none;
        }
        
        .news-content {
            font-size: 0.95rem;
        }
        
        .news-content h2 {
            font-size: 1.3rem;
        }
        
        .news-content h3 {
            font-size: 1.2rem;
        }
        
        .news-content h4 {
            font-size: 1.1rem;
        }
        
        .card-header h4 {
            font-size: 1.1rem;
        }
        
        .news-tags h5 {
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 575.98px) {
        .news-header h1 {
            font-size: 1.35rem;
        }
        
        .news-content {
            font-size: 0.925rem;
        }
        
        .news-content h2 {
            font-size: 1.2rem;
        }
        
        .news-content h3 {
            font-size: 1.1rem;
        }
        
        .news-content p {
            margin-bottom: 1.25rem;
        }
        
        .list-group-item h6 {
            font-size: 0.95rem;
        }
    }
</style>

<script>
    // Enable Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Enable form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    });
</script>
@endsection