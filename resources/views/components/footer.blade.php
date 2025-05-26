<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <span class="logo-icon"><i class="fas fa-leaf"></i></span>
                            @php
                            $ssetting = App\Models\Setting::first(); // Ambil data dari database
                            
                            // Handle nama_desa
                            $nama_desa = $ssetting->nama_desa ?? '-';
                            if ($nama_desa != '-') {
                                $nama_desa_parts = explode(' ', $nama_desa);
                                if (count($nama_desa_parts) > 1) {
                                    $first_word = array_shift($nama_desa_parts);
                                    $rest_words = implode(' ', $nama_desa_parts);
                                    $nama_desa = $first_word.'<span>'.$rest_words.'</span>';
                                }
                            }
                            
                            // Handle deskripsi_singkat
                            $deskripsi_singkat = $ssetting->deskripsi_singkat ?? '-';
                        @endphp

                        <span class="logo-text">{!! $nama_desa !!}</span>
                    </div>
                    <p>{{ $deskripsi_singkat }}</p>
                    @php
                        $socialMedia = App\Models\SocialMedia::first(); // Ambil data dari database
                    @endphp

                    <div class="social-links">
                        @if($socialMedia->active_fb && $socialMedia->link_fb)
                            <a href="{{ $socialMedia->link_fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        
                        @if($socialMedia->active_ig && $socialMedia->link_ig)
                            <a href="{{ $socialMedia->link_ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        
                        @if($socialMedia->active_yt && $socialMedia->link_yt)
                            <a href="{{ $socialMedia->link_yt }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                        
                        @if($socialMedia->active_wa && $socialMedia->link_wa)
                            <a href="{{ $socialMedia->link_wa }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Tautan Cepat dengan accordion mobile -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h5 class="mobile-accordion-header">Tautan Cepat <i class="fas fa-chevron-down accordion-icon"></i></h5>
                    <ul class="mobile-accordion-content">
                        <li><a href="{{ route('beranda') }}">Home</a></li>
                        <li><a href="{{ route('profil') }}">Profil Desa</a></li>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('belanja') }}">Belanja</a></li>
                        <li><a href="{{ route('ppid') }}">PPID</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Kontak Kami dengan accordion mobile -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h5 class="mobile-accordion-header">Kontak Kami <i class="fas fa-chevron-down accordion-icon"></i></h5>
                    @php
                        $ssetting = App\Models\Setting::first(); // Ambil data dari database
                        
                        // Data kontak dengan fallback '-'
                        $alamat = $ssetting->alamat ?? '-';
                        $nomor_hp = $ssetting->nomor_hp ?? '-';
                        $email = $ssetting->email ?? '-';
                    @endphp

                    <ul class="contact-info mobile-accordion-content">
                        <li><i class="fas fa-map-marker-alt"></i> {{ $alamat }}</li>
                        <li><i class="fas fa-phone-alt"></i> {{ $nomor_hp }}</li>
                        <li><i class="fas fa-envelope"></i> {{ $email }}</li>
                    </ul>
                </div>
            </div>
            
            <!-- Newsletter dengan accordion mobile -->
            <div class="col-lg-3 mb-5">
                <div class="footer-widget">
                    <h5 class="mobile-accordion-header">Newsletter <i class="fas fa-chevron-down accordion-icon"></i></h5>
                    <div class="mobile-accordion-content">
                        <p>Dapatkan informasi terbaru dari {!! $nama_desa !!} langsung ke email Anda.</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Alamat Email Anda">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
        </div>
    </div>
</footer>

<style>

    
    .footer-logo {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
   
    
    .logo-text {
        font-size: 22px;
        font-weight: 700;
    }
    
    
    .footer p {
        color: #bbb;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
    }
    
    .social-links {
        display: flex;
        gap: 12px;
    }
    
    .social-links a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        color: #fff;
        transition: all 0.3s ease;
    }
    
    
    .footer-widget h5, 
    .footer-widget h3 {
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 8px;
    }
    
    .footer-widget h5::after,
    .footer-widget h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 2px;
    }
    
    .footer-widget ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .footer-widget ul li {
        margin-bottom: 10px;
    }
    
    .footer-widget ul li a {
        color: #bbb;
        transition: all 0.3s ease;
        display: block;
        font-size: 14px;
    }
    
    .footer-widget ul li a:hover {
        padding-left: 5px;
    }
    
    .contact-info li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 12px;
        color: #bbb;
        font-size: 14px;
        line-height: 1.5;
    }
    
    .contact-info li i {
        margin-right: 10px;

        margin-top: 3px;
    }
    
    .footer-bottom {
        background: #ff5722;
        padding: 3px 0;
    }
    
    .footer-bottom p {
        color: #999;
        font-size: 13px;
        margin: 0;
    }
    
    .footer-links {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }
    
    .footer-links a {
        color: #999;
        font-size: 13px;
        transition: all 0.3s ease;
    }
    
    .footer-links a:hover {
   
    }
    
    /* Brutal Animation Styles */
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        transform: scaleX(0);
        transform-origin: left;
        animation: brutalLine 2s cubic-bezier(0.19, 1, 0.22, 1) forwards;
    }
    
    @keyframes brutalLine {
        0% {
            transform: scaleX(0);
        }
        50% {
            transform: scaleX(1);
            background: #ff5722;
        }
        75% {
            background: #ff5722;
        }
        100% {
            transform: scaleX(1);
            background: #ff5722;
        }
    }
    
    .footer-bottom {
        position: relative;
        overflow: hidden;
    }
    
    .footer-bottom::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, #ff5722, transparent);
        transform: translateX(-100%);
        animation: brutalSlide 3s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.5s infinite;
    }
    
    @keyframes brutalSlide {
        0% {
            transform: translateX(-100%);
        }
        50% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(100%);
        }
    }
    
    /* Mobile Accordion Styles */
    .mobile-accordion-header {
        cursor: pointer;
        position: relative;
        padding-right: 25px;
    }
    
    .accordion-icon {
        transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
    }
    
    .mobile-accordion-content {
        transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        overflow: hidden;
    }
    
    /* Desktop Styles */
    @media (min-width: 992px) {
        .mobile-accordion-content {
            display: block !important;
            max-height: none !important;
            opacity: 1 !important;
        }
        
        .accordion-icon {
            display: none;
        }
        
        .footer-widget {
            padding-right: 15px;
        }
    }
    
    /* Mobile Styles */
    @media (max-width: 991px) {
        .footer {
            padding: 20px 0 0;
        }
        
        .footer-widget {
            margin-bottom: 15px;
        }
        
        .mobile-accordion-content:not(.active) {
            max-height: 0;
            opacity: 0;
        }
        
        .mobile-accordion-content.active {
            max-height: 500px;
            opacity: 1;
            padding-top: 10px;
        }
        
        .mobile-accordion-header.active .accordion-icon {
            transform: translateY(-50%) rotate(180deg);
        }
        
        .footer-bottom .row > div {
            text-align: center;
            margin-bottom: 10px;
        }
        
        .footer-links {
            justify-content: center;
        }
    }
</style>

<script>
    // Enhanced Accordion with Brutal Animation
    document.addEventListener('DOMContentLoaded', function() {
        const accordionHeaders = document.querySelectorAll('.mobile-accordion-header');
        
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                if (window.innerWidth <= 991) {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.accordion-icon');
                    
                    // Add brutal animation class
                    content.style.transform = 'scaleY(0.8)';
                    content.style.opacity = '0.5';
                    
                    setTimeout(() => {
                        this.classList.toggle('active');
                        content.classList.toggle('active');
                        
                        // Animate with brutal effect
                        content.style.transform = 'scaleY(1.1)';
                        content.style.opacity = '1';
                        
                        setTimeout(() => {
                            content.style.transform = 'scaleY(1)';
                        }, 300);
                    }, 50);
                    
                    // Close other accordions
                    accordionHeaders.forEach(otherHeader => {
                        if (otherHeader !== header && otherHeader.classList.contains('active')) {
                            const otherContent = otherHeader.nextElementSibling;
                            otherHeader.classList.remove('active');
                            
                            // Brutal close animation
                            otherContent.style.transform = 'scaleY(1.1)';
                            setTimeout(() => {
                                otherContent.style.transform = 'scaleY(0.8)';
                                otherContent.style.opacity = '0';
                                setTimeout(() => {
                                    otherContent.classList.remove('active');
                                    otherContent.style.transform = 'scaleY(1)';
                                    otherContent.style.opacity = '';
                                }, 200);
                            }, 100);
                        }
                    });
                }
            });
        });
        
        // Open first accordion by default on mobile
        if (window.innerWidth <= 991 && accordionHeaders.length > 0) {
            setTimeout(() => {
                accordionHeaders[0].classList.add('active');
                accordionHeaders[0].nextElementSibling.classList.add('active');
                
                // Brutal open animation
                const firstContent = accordionHeaders[0].nextElementSibling;
                firstContent.style.transform = 'scaleY(1.2)';
                firstContent.style.opacity = '0';
                
                setTimeout(() => {
                    firstContent.style.transform = 'scaleY(0.9)';
                    firstContent.style.opacity = '1';
                    
                    setTimeout(() => {
                        firstContent.style.transform = 'scaleY(1)';
                    }, 200);
                }, 50);
            }, 500);
        }
        
        // Add brutal hover effect to social links
        const socialLinks = document.querySelectorAll('.social-links a');
        socialLinks.forEach(link => {
            link.addEventListener('mouseover', () => {
                link.style.transform = 'scale(1.2) rotate(10deg)';
                link.style.boxShadow = '0 5px 15px rgba(0,0,0,0.3)';
            });
            
            link.addEventListener('mouseout', () => {
                link.style.transform = '';
                link.style.boxShadow = '';
            });
        });
    });
</script>