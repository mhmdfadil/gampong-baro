@extends('components.main')

@section('content')
<div class="container-fluid py-4 m-0" style="background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <!-- Header Section -->
            <div class="text-center mb-4 animate__animated animate__fadeIn">
                <h3 class="h4 fw-bold text-gradient-primary mb-2">Pengaduan Terkirim</h3>
                <p class="text-muted">Terima kasih telah menyampaikan pengaduan Anda</p>
            </div>

            <!-- Success Card -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-4 animate__animated animate__fadeInUp">
                <div class="card-body p-3 p-md-4">
                    <div class="text-center">
                        <!-- Animated Checkmark with Glow Effect -->
                        <div class="mx-auto mb-3 position-relative" style="width: 100px; height: 100px;">
                            <div class="position-absolute top-0 start-0 w-100 h-100 rounded-circle bg-primary bg-opacity-10 animate__animated animate__pulse animate__infinite" style="animation-delay: 0.5s;"></div>
                            <div class="position-absolute top-0 start-0 w-100 h-100 rounded-circle bg-primary bg-opacity-10 animate__animated animate__pulse animate__infinite" style="animation-delay: 1s;"></div>
                            <div class="position-relative z-index-1 bg-white d-flex align-items-center justify-content-center rounded-circle shadow-sm" style="width: 100px; height: 100px; border: 3px solid rgba(16, 185, 129, 0.3);">
                                <svg id="checkmark" style="width: 50px; height: 50px; color: #10b981;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                            </div>
                        </div>
                        
                        <h2 class="h3 fw-bold mb-2 text-gradient-primary">Pengaduan Anda Berhasil Dikirim!</h2>
                        
                        <p class="text-muted mb-3 mx-auto" style="max-width: 500px; font-size: 0.9rem;">
                            Kami telah menerima pengaduan Anda dengan nomor pengaduan: 
                            <span class="fw-bold text-primary">{{ $nomor_pengaduan  ?? 'PGB-XXXXXX' }}</span>. 
                            Tim kami akan segera menindaklanjuti pengaduan Anda.
                        </p>
                        
                        <!-- Progress Timeline -->
                        <div class="mb-4">
                            <div class="position-relative">
                                <!-- Progress line -->
                                <div class="progress-line position-absolute start-0 top-0 h-100" style="width: 3px; background: linear-gradient(to bottom, #e9ecef, #dee2e6); left: 18px;"></div>
                                <div class="progress-line-active position-absolute start-0 top-0 h-0" style="width: 3px; background: linear-gradient(to bottom, #10b981, #3b82f6); left: 18px; z-index: 2;"></div>
                                
                                <div class="row g-3 ps-3">
                                    <!-- Step 1 - Active -->
                                    <div class="col-12 step-item active">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3 position-relative">
                                                <div class="step-badge rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px;">
                                                    <i class="bi bi-check2-circle"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 pt-1">
                                                <h5 class="mb-1 fw-semibold" style="color: #2c3e50; font-size: 0.95rem;">Verifikasi Pengaduan</h5>
                                                <p class="text-muted small mb-0" style="font-size: 0.8rem;">Pengaduan Anda sedang diverifikasi oleh tim kami</p>
                                                <div class="mt-1">
                                                    <span class="badge bg-success bg-opacity-10 text-success fw-normal" style="font-size: 0.7rem;">
                                                        <i class="bi bi-clock me-1"></i> Sedang diproses
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Step 2 -->
                                    <div class="col-12 step-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3 position-relative">
                                                <div class="step-badge rounded-circle bg-secondary bg-opacity-10 text-secondary d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px;">
                                                    <i class="bi bi-gear"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 pt-1">
                                                <h5 class="mb-1 fw-semibold text-muted" style="font-size: 0.95rem;">Proses Penanganan</h5>
                                                <p class="text-muted small mb-0" style="font-size: 0.8rem;">Tim akan menangani pengaduan Anda</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Step 3 -->
                                    <div class="col-12 step-item">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3 position-relative">
                                                <div class="step-badge rounded-circle bg-secondary bg-opacity-10 text-secondary d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px;">
                                                    <i class="bi bi-check-circle"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 pt-1">
                                                <h5 class="mb-1 fw-semibold text-muted" style="font-size: 0.95rem;">Selesai</h5>
                                                <p class="text-muted small mb-0" style="font-size: 0.8rem;">Pengaduan selesai ditangani</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                            <a href="{{ route('pengaduan') }}" class="btn btn-primary px-3 py-2 fw-semibold shadow-sm animate__animated animate__pulse animate__delay-2s" style="font-size: 0.9rem;">
                                <i class="bi bi-house-door me-1"></i> Kembali
                            </a>
                            <a href="{{ route('coming.soon') }}" class="btn btn-outline-primary px-3 py-2 fw-semibold" style="font-size: 0.9rem;">
                                <i class="bi bi-search me-1"></i> Lacak Pengaduan
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Footer Note -->
                <div class="card-footer bg-primary text-white bg-opacity-5 py-2 border-top-0">
                    <p class="text-center text-white mb-0" style="font-size: 0.8rem;">
                        <i class="bi bi-info-circle me-1"></i> Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi kami melalui 
                        <a href="mailto:contact@example.com" class="fw-bold text-decoration-underline text-white">contact@example.com</a>
                    </p>
                </div>
            </div>
            
            <!-- Additional Info -->
            <div class="text-center animate__animated animate__fadeIn animate__delay-1s">
                <p class="text-muted small" style="font-size: 0.8rem;">
                    <i class="bi bi-clock-history me-1"></i> Waktu respon rata-rata kami adalah 1-3 hari kerja. Anda akan menerima notifikasi via email.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<style>
    /* Text gradient effect */
    .text-gradient-primary {
        background: linear-gradient(45deg, #3b82f6, #10b981);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    /* Step animation */
    .step-item.active .step-badge {
        background: linear-gradient(45deg, #10b981, #3b82f6) !important;
        color: white !important;
        transform: scale(1.1);
        transition: all 0.3s ease;
    }
    
    .step-badge {
        transition: all 0.3s ease;
    }
    
    .step-item:not(.active) .step-badge:hover {
        transform: scale(1.05);
    }
</style>

<!-- Animation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animate checkmark
        const checkmark = document.getElementById('checkmark');
        checkmark.style.strokeDasharray = '100';
        checkmark.style.strokeDashoffset = '100';
        
        setTimeout(() => {
            checkmark.style.transition = 'stroke-dashoffset 0.7s ease-in-out, opacity 0.3s ease';
            checkmark.style.strokeDashoffset = '0';
        }, 300);
        
        // Animate progress line
        setTimeout(() => {
            const progressLine = document.querySelector('.progress-line-active');
            progressLine.style.transition = 'height 1.5s ease-in-out';
            progressLine.style.height = '33%';
        }, 1000);
        
        // Add hover effects to buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.classList.add('animate__animated', 'animate__pulse');
            });
            btn.addEventListener('mouseleave', () => {
                setTimeout(() => {
                    btn.classList.remove('animate__animated', 'animate__pulse');
                }, 1000);
            });
        });
    });
</script>
@endsection