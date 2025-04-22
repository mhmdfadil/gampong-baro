@extends('components.main')

@section('content')
<div class="container-fluid px-lg-5 py-4">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="section-title"><span>Berita Desa</span></h2>
            <p class="text-muted text-center mt-0 mb-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
               Berita Desa merupakan sarana informasi resmi yang menyajikan berbagai perkembangan, kegiatan, serta pengumuman penting yang terjadi di lingkungan desa. Melalui halaman ini, masyarakat dapat mengikuti update terkini yang berkaitan dengan pembangunan, pelayanan publik, dan aktivitas masyarakat desa secara transparan dan akuntabel.
           </p>
        </div>
    </div>

    <!-- News Grid -->
    <div class="row g-4">
        <!-- News Item 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card news-card border-0 shadow-hover">
                <div class="card-img-top position-relative overflow-hidden">
                    <img src="https://tse3.mm.bing.net/th?id=OIP.lDpXouZvUpLNPhTt5C2gsAHaE8&w=200&h=133&c=7" class="img-fluid w-100" alt="Luxury Hotel Opening">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-danger bg-opacity-90 text-white px-3 py-2">HOT</span>
                    </div>
                    <div class="img-overlay"></div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary small fw-bold">HOTEL & TRAVEL</span>
                        <span class="text-muted small"><i class="far fa-clock me-1"></i> 2 jam lalu</span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">Hotel Bintang 5 Terbuka di Bali Dengan Fasilitas...</h5>
                    <p class="card-text text-secondary mb-4">Menawarkan pengalaman menginap kelas dunia dengan private beach dan butler service eksklusif untuk tamu VIP.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-2" width="30" alt="Reporter">
                            <span class="small">Sarah Wijaya</span>
                        </div>
                        <div class="text-muted small">
                            <i class="far fa-eye me-1"></i> 1.4K
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Item 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card news-card border-0 shadow-hover">
                <div class="card-img-top position-relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?fashion,runway" class="img-fluid w-100" alt="Fashion Week">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-dark bg-opacity-90 text-white px-3 py-2">TRENDING</span>
                    </div>
                    <div class="img-overlay"></div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-danger small fw-bold">FASHION</span>
                        <span class="text-muted small"><i class="far fa-clock me-1"></i> 5 jam lalu</span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">Koleksi Terbaru Desainer Lokal Tampil di Paris...</h5>
                    <p class="card-text text-secondary mb-4">Membawa budaya Indonesia ke panggung dunia dengan sentuhan modern yang memukau para kritikus fashion.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-2" width="30" alt="Reporter">
                            <span class="small">Andi Pratama</span>
                        </div>
                        <div class="text-muted small">
                            <i class="far fa-eye me-1"></i> 2.7K
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Item 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="card news-card border-0 shadow-hover">
                <div class="card-img-top position-relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?technology,gadget" class="img-fluid w-100" alt="Tech Innovation">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-info bg-opacity-90 text-white px-3 py-2">NEW</span>
                    </div>
                    <div class="img-overlay"></div>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-info small fw-bold">TEKNOLOGI</span>
                        <span class="text-muted small"><i class="far fa-clock me-1"></i> 1 hari lalu</span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">Smartphone Flagship dengan Layar Lipat Hadir...</h5>
                    <p class="card-text text-secondary mb-4">Dengan teknologi terbaru yang membuat layar hampir tidak terlihat lipatannya dan ketahanan 2x lebih kuat.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-2" width="30" alt="Reporter">
                            <span class="small">Dewi Tech</span>
                        </div>
                        <div class="text-muted small">
                            <i class="far fa-eye me-1"></i> 3.1K
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continue with more news items... (total 9 items for 3 rows) -->
        
    </div>

    <!-- Pagination -->
    <nav aria-label="News pagination" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- Custom CSS -->
<style>
    :root {
        --news-card-radius: 12px;
        --news-transition: all 0.3s ease-in-out;
    }
    
    body {
        background-color: #f8f9fa;
    }
    
    .text-gradient {
        background: linear-gradient(45deg, #2c3e50, #3498db);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .news-card {
        border-radius: var(--news-card-radius);
        overflow: hidden;
        transition: var(--news-transition);
        height: 100%;
        background-color: #fff;
    }
    
    .shadow-hover {
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .shadow-hover:hover {
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
        transform: translateY(-5px);
    }
    
    .card-img-top {
        height: 200px;
        border-top-left-radius: var(--news-card-radius);
        border-top-right-radius: var(--news-card-radius);
    }
    
    .img-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 50%;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
    }
    
    .card-title {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 3em;
    }
    
    .card-text {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 4.5em;
    }
    
    .page-item.active .page-link {
        background-color: #3498db;
        border-color: #3498db;
    }
    
    .page-link {
        color: #2c3e50;
        border-radius: 8px;
        margin: 0 5px;
        border: none;
        padding: 8px 16px;
    }
    
    .page-link:hover {
        background-color: #f1f1f1;
        color: #3498db;
    }
    
    @media (max-width: 768px) {
        .card-img-top {
            height: 180px;
        }
        
        .card-body {
            padding: 1.5rem;
        }
    }
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection