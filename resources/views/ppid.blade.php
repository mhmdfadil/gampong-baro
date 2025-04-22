@extends('components.main')

@section('content')
<!-- Luxurious Header Section -->
   <div class="container mt-5">
      <div class="col-12 text-center Informasi Publik Terbaru mt-3">
         <h2 class="section-title"><span>PPID</span></h2>
         <p class="text-muted text-center mt-0 mb-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab dalam pengelolaan dan pelayanan informasi publik di lingkungan pemerintahan desa. PPID bertugas untuk memastikan keterbukaan informasi yang akurat, cepat, dan mudah diakses oleh masyarakat, sesuai dengan peraturan perundang-undangan yang berlaku.
        </p>
      </div>
    </div>

<!-- Main Content -->
<div class="container py-5 position-relative">
    <!-- Latest Public Information -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
        <h2 class="h4 font-weight-bold text-gradient-primary mb-3 mb-md-0">
            <i class="fas fa-bullhorn mr-2 mx-2"></i>Informasi Publik
        </h2>
        <div class="dropdown">
            <button class="btn btn-outline-primary btn-gradient-hover dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
            <div class="dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="filterDropdown">
                <a class="dropdown-item" href="#"><i class="fas fa-sort-amount-down mr-2"></i> Terbaru</a>
                <a class="dropdown-item" href="#"><i class="fas fa-sort-amount-up mr-2"></i> Terlama</a>
                <a class="dropdown-item" href="#"><i class="fas fa-download mr-2"></i> Terbanyak Diunduh</a>
            </div>
        </div>
    </div>

    <!-- Documents Cards - Mobile Layout -->
    <div class="row document-cards d-block d-md-none">
        @for($i = 0; $i < 5; $i++)
        <div class="col-12 mb-3">
            <div class="card document-card h-100 border-0 shadow-sm">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center mb-1">
                                <h5 class="card-title font-weight-bold text-primary mb-0 text-sm">Laporan Tahunan 2023</h5>
                                <span class="badge badge-info ml-2 text-xs">PDF</span>
                            </div>
                            <p class="card-text text-muted text-xs mb-2">Laporan kinerja instansi pemerintah tahun 2023.</p>
                        </div>
                        <div class="file-icon ml-2">
                            <i class="fas fa-file-pdf text-danger fa-lg"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted text-xs">
                            <i class="far fa-calendar-alt mr-1"></i> 15 Maret 2024
                        </small>
                        <small class="text-muted text-xs">
                            <i class="fas fa-download mr-2"></i> 245
                        </small>
                    </div>
                    <div class="d-flex justify-content-end mt-2 mx-2">
                        <button class="btn btn-sm btn-outline-primary mr-2 text-xs">
                            <i class="far fa-eye mr-1"></i> Lihat
                        </button>
                        <button class="btn btn-sm btn-primary btn-gradient text-xs mx-2">
                            <i class="fas fa-download mr-1"></i> Unduh
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <!-- Documents Cards - Desktop Layout -->
    <div class="row document-cards d-none d-md-flex">
        @for($i = 0; $i < 10; $i++)
        <div class="col-lg-6 mb-4">
            <div class="card document-card h-100 border-0 shadow-sm hover-float">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="card-title font-weight-bold text-primary mb-0 text-sm">Laporan Tahunan 2023</h5>
                                <span class="badge badge-info ml-2 text-xs">PDF</span>
                            </div>
                            <p class="card-text text-muted text-xs">Laporan kinerja instansi pemerintah tahun 2023 yang berisi capaian-capaian penting selama tahun berjalan.</p>
                        </div>
                        <div class="file-icon">
                            <i class="fas fa-file-pdf text-danger"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted text-xs">
                            <i class="far fa-calendar-alt mr-1"></i> 15 Maret 2024
                        </small>
                        <div class="download-count">
                            <small class="text-muted mr-3 text-xs">
                                <i class="fas fa-download mr-1"></i> 245 unduhan
                            </small>
                            <button class="btn btn-sm btn-outline-primary text-xs">
                                <i class="far fa-eye mr-3 mx-2"></i> Lihat
                            </button>
                            <button class="btn btn-sm btn-primary btn-gradient text-xs">
                                <i class="fas fa-download mr-3 mx-2"></i> Unduh
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-hover-overlay"></div>
            </div>
        </div>
        @endfor
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center pagination-sm">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Request Information Card - Mobile -->
    <div class="row justify-content-center mt-4 d-block d-md-none">
        <div class="ppid-card-mobile animate__animated animate__zoomIn">
            <div class="ppid-icon floating-animation">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="ppid-content text-center">
                <h3 class="mb-2" style="font-size: 18px;">Pengajuan Permohonan Informasi</h3>
                <p class="mb-3" style="font-size: 14px;">Ajukan permohonan informasi publik secara online.</p>
                <a href="#" class="btn btn-elegant btn-sm" style="font-size: 14px;">
                    <span>Ajukan Permohonan</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Request Information Card - Desktop -->
    <div class="row justify-content-center mt-5 d-none d-md-flex">
        <div class="ppid-card animate__animated animate__zoomIn">
            <div class="card-overlay"></div>
            <div class="ppid-icon floating-animation">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="ppid-content">
                <h3 class="" style="font-size: 22px;">Pengajuan Permohonan Informasi</h3>
                <p class="mb-4" style="font-size: 15px;">Ajukan permohonan informasi publik secara online melalui form kami yang mudah digunakan. Proses cepat dan transparan.</p>
                <a href="#" class="btn btn-elegant" style="font-size: 15px;">
                    <span style="font-size: 15px;">Ajukan Permohonan</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="card-decoration"></div>
            <div class="card-decoration-2"></div>
        </div>
    </div>
</div>

<!-- Floating Action Button for Mobile -->
<div class="ppid-fab-container d-block d-md-none">
    <button class="btn btn-primary btn-fab btn-gradient rounded-circle hover-grow mb-2" data-toggle="tooltip" title="Ajukan Permohonan">
        <i class="fas fa-file-alt"></i>
    </button>
</div>



<style>
    /* Base Styles */
    .text-xs {
        font-size: 0.75rem !important;
    }
    
    .text-sm {
        font-size: 0.875rem !important;
    }
    
    /* Luxurious Header Styles */
    .ppid-header {
        background: linear-gradient(135deg, #1a2980 0%, #26d0ce 100%);
        padding: 5rem 0;
        margin-bottom: 3rem;
        box-shadow: 0 4px 30px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }
    
    .ppid-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAzKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
        z-index: 0;
    }
    
    .header-shape-1 {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
        top: -150px;
        right: -150px;
    }
    
    .header-shape-2 {
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255,255,255,0.03);
        bottom: -100px;
        left: -100px;
    }
    
    .header-shape-3 {
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255,255,255,0.02);
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    
    /* Text Gradient */
    .text-gradient-primary {
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    /* Document Cards */
    .document-card {
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border-radius: 12px;
        overflow: hidden;
        position: relative;
    }
    
    .document-card .file-icon {
        font-size: 1.5rem;
        opacity: 0.7;
        transition: all 0.3s ease;
    }
    
    .document-card:hover .file-icon {
        opacity: 1;
        transform: scale(1.1);
    }
    
    .card-hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26, 41, 128, 0.03) 0%, rgba(38, 208, 206, 0.03) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .document-card:hover .card-hover-overlay {
        opacity: 1;
    }
    
    /* Button Gradient */
    .btn-gradient {
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-gradient:hover {
        background: linear-gradient(90deg, #26d0ce, #1a2980);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(38, 208, 206, 0.3);
    }
    
    .btn-gradient-hover:hover {
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        color: white !important;
    }
    
    /* PPID Card Styles - Desktop */
    .ppid-card {
        position: relative;
        background: white;
        border-radius: 16px;
        padding: 25px;
        width: 100%;
        max-width: 800px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        z-index: 1;
    }
    
    /* PPID Card Styles - Mobile */
    .ppid-card-mobile {
        position: relative;
        background: white;
        border-radius: 16px;
        padding: 20px;
        width: 100%;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        z-index: 1;
    }
    
    .ppid-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
    }
    
    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(26, 41, 128, 0.1) 0%, rgba(38, 208, 206, 0.1) 100%);
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .ppid-card:hover .card-overlay {
        opacity: 1;
    }
    
    .ppid-icon {
        font-size: 3rem;
        color: #1a2980;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    
    .ppid-card:hover .ppid-icon {
        transform: scale(1.1);
        color: #26d0ce;
    }
    
    .ppid-content h3 {
        font-weight: 700;
        color: #1a2980;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .ppid-content h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        transition: width 0.3s ease;
    }
    
    .ppid-card:hover .ppid-content h3::after {
        width: 100px;
    }
    
    .btn-elegant {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(90deg, #1a2980, #26d0ce);
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 50px;
        font-weight: 400;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 5px 15px rgba(26, 41, 128, 0.2);
    }
    
    .btn-elegant::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, #26d0ce, #1a2980);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }
    
    .btn-elegant:hover::before {
        opacity: 1;
    }
    
    .btn-elegant:hover {
        box-shadow: 0 10px 25px rgba(38, 208, 206, 0.3);
        transform: translateY(-2px);
    }
    
    .card-decoration {
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(26, 41, 128, 0.1) 0%, rgba(38, 208, 206, 0.1) 100%);
        transition: all 0.5s ease;
    }
    
    .card-decoration-2 {
        position: absolute;
        top: -30px;
        left: -30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(38, 208, 206, 0.1) 0%, rgba(26, 41, 128, 0.1) 100%);
        transition: all 0.5s ease;
    }
    
    .ppid-card:hover .card-decoration {
        transform: scale(1.5);
    }
    
    .ppid-card:hover .card-decoration-2 {
        transform: scale(1.5);
    }
    
    /* Floating Animation */
    .floating-animation {
        animation: floating 3s ease-in-out infinite;
    }
    
    @keyframes floating {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    /* FAB Styles */
    .ppid-fab-container {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .btn-fab {
        width: 60px;
        height: 60px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .hover-grow:hover {
        transform: scale(1.15);
    }
    
    /* Chat Widget */
    .chat-widget {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
    }
    
    .chat-button {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1a2980, #26d0ce);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(26, 41, 128, 0.3);
        transition: all 0.3s ease;
    }
    
    .chat-button:hover {
        transform: scale(1.1);
    }
    
    .chat-container {
        position: absolute;
        bottom: 80px;
        right: 0;
        width: 300px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        transform: scale(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease;
        opacity: 0;
    }
    
    .chat-widget.active .chat-container {
        transform: scale(1);
        opacity: 1;
    }
    
    .chat-header {
        background: linear-gradient(135deg, #1a2980, #26d0ce);
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chat-body {
        padding: 15px;
        height: 200px;
        overflow-y: auto;
    }
    
    .chat-input {
        display: flex;
        padding: 10px;
        border-top: 1px solid #eee;
    }
    
    .chat-input input {
        flex: 1;
        border: none;
        padding: 10px;
        border-radius: 20px;
        background: #f8f9fa;
    }
    
    .chat-input button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1a2980, #26d0ce);
        color: white;
        border: none;
        margin-left: 10px;
    }
    
    /* Mobile-Specific Styles */
    @media (max-width: 767.98px) {
        .ppid-header {
            padding: 3rem 0;
        }
        
        .ppid-header h1 {
            font-size: 2rem;
        }
        
        .ppid-header p {
            font-size: 1rem;
        }
        
        .document-card {
            border-radius: 10px;
        }
        
        .ppid-card-mobile .ppid-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .ppid-card-mobile .ppid-content h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        .ppid-card-mobile .ppid-content p {
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        
        .btn-fab {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
    }
    
    /* Tablet-Specific Styles */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .ppid-header {
            padding: 4rem 0;
        }
        
        .ppid-card {
            padding: 20px;
        }
        
        .ppid-content h3 {
            font-size: 1.2rem;
        }
    }
</style>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Include AOS for scroll animations -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function(){
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
        
        // Add animation when scrolling
        $(window).scroll(function() {
            $('.animate__animated').each(function() {
                var position = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                
                if (scroll + windowHeight > position) {
                    $(this).addClass($(this).data('animation'));
                }
            });
        });
        
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Chat widget toggle
        $('.chat-button').click(function() {
            $('.chat-widget').toggleClass('active');
        });
        
        $('.close-chat').click(function() {
            $('.chat-widget').removeClass('active');
        });
        
        // Mobile FAB click handler
        $('.btn-fab').click(function() {
            // Scroll to request form or open modal
            $('html, body').animate({
                scrollTop: $('.ppid-card-mobile').offset().top - 20
            }, 500);
        });
    });
</script>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
@endsection