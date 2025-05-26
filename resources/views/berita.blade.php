@extends('components.main')

@section('content')
<div class="container-fluid px-lg-5 py-4">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="section-title"><span>Berita Desa</span></h2>
            <p class="fs-6 text-center mt-0 mb-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
               Berita Desa merupakan sarana informasi resmi yang menyajikan berbagai perkembangan, kegiatan, serta pengumuman penting yang terjadi di lingkungan desa.
            </p>
        </div>
    </div>

    @php
        $newss = App\Models\News::orderBy('created_at', 'desc')->paginate(6);
    @endphp

    <!-- News Grid -->
    <div class="row g-4">
        @forelse($newss as $news)
        <!-- News Item -->
        <div class="col-md-6 col-lg-4">
            <a href="{{ route('berita.show', $news->slug) }}" class="text-decoration-none text-dark">
                <div class="card news-card border-0 shadow-hover">
                    @php
                        \Carbon\Carbon::setLocale('id');
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
        @empty
        <div class="col-12 text-center py-5">
            <div class="alert alert-warning">
               <i class="fas fa-info-circle me-3 fs-4"></i> Tidak ada berita yang tersedia saat ini.
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($newss->hasPages())
        <div class="container mb-4 mt-5">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center" id="pagination-container">
                            {{-- Previous Page Link --}}
                            @if($newss->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $newss->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach($newss->getUrlRange(1, $newss->lastPage()) as $page => $url)
                                @if($page == $newss->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if($newss->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $newss->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    @endif
</div>


<!-- Custom CSS -->
<style>
    :root {
        --news-card-radius: 16px;
        --news-transition: all 0.3s ease-in-out;
        --purple: #6f42c1;
        --orange: #fd7e14;
        --pink: #d63384;
    }
    
    .bg-purple {
        background-color: var(--purple) !important;
    }
    .bg-orange {
        background-color: var(--orange) !important;
    }
    .bg-pink {
        background-color: var(--pink) !important;
    }
    
    .text-purple {
        color: var(--purple) !important;
    }
    .text-orange {
        color: var(--orange) !important;
    }
    .text-pink {
        color: var(--pink) !important;
    }
    
    .news-card {
        border-radius: var(--news-card-radius);
        transition: var(--news-transition);
        height: 100%;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }
    
    .news-card .card-img-top {
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
    
    .news-card:hover .date-badge {
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
        min-height: 3.2em;
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
    
    .page-item.active .page-link {
        background: linear-gradient(135deg, #3498db, #2c3e50);
        border-color: transparent;
        color: white;
    }
    
    .page-link {
        color: #495057;
        border-radius: 8px !important;
        margin: 0 5px;
        border: 1px solid rgba(0,0,0,0.05);
        padding: 8px 16px;
        font-weight: 500;
    }
    
    .page-link:hover {
        background-color: #f8f9fa;
        color: #3498db;
        border-color: rgba(0,0,0,0.1);
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

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection