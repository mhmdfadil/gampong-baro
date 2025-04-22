@extends('components.main')

@section('content')
<div class="profil-desa">
    <!-- Premium Parallax Header with Particles Animation -->
    <header class="profil-header text-center py-6 mb-5" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div id="particles-js"></div>
        <div class="container position-relative">
            <div class="header-content animate__animated animate__fadeInDown">
                <h1 class="display-3 text-white fw-bold mb-3 text-shadow glitch" data-text="Gampong Baru">Gampong Baru</h1>
                <p class="lead text-light animate__animated animate__fadeInUp text-uppercase letter-spacing-2 tracking-in-expand">Kecamatan Darul Imarah, Kabupaten Aceh Besar</p>
                <div class="mt-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <span class="badge bg-gold rounded-pill px-3 py-2 me-2 scale-in-center">Desa Mandiri</span>
                    <span class="badge bg-primary rounded-pill px-3 py-2 me-2 scale-in-center" style="animation-delay: 0.2s">Desa Digital</span>
                    <span class="badge bg-success rounded-pill px-3 py-2 scale-in-center" style="animation-delay: 0.4s">Desa Wisata</span>
                </div>
            </div>
            <a href="#sejarah" class="scroll-down-btn smooth-scroll animate__animated animate__fadeIn animate__delay-2s">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </header>

    <!-- Floating Navigation with Glass Morphism -->
    <div class="floating-nav-container">
        <div class="container">
            <div class="floating-nav glass-morphism shadow-lg rounded-pill animate__animated animate__fadeInUp animate__delay-1s">
                <a href="#sejarah" class="nav-item smooth-scroll">
                    <div class="nav-icon"><i class="fas fa-history"></i></div>
                    <span>Sejarah</span>
                </a>
                <a href="#visi-misi" class="nav-item smooth-scroll">
                    <div class="nav-icon"><i class="fas fa-bullseye"></i></div>
                    <span>Visi Misi</span>
                </a>
                <a href="#peta" class="nav-item smooth-scroll">
                    <div class="nav-icon"><i class="fas fa-map-marked-alt"></i></div>
                    <span>Peta</span>
                </a>
                <a href="#struktur" class="nav-item smooth-scroll">
                    <div class="nav-icon"><i class="fas fa-sitemap"></i></div>
                    <span>Struktur</span>
                </a>
                <div class="nav-indicator"></div>
            </div>
        </div>
    </div>

    <!-- Sejarah Desa with Floating Elements -->
    <section id="sejarah" class="sejarah-desa py-6 bg-light position-relative overflow-hidden">
        <div class="floating-elements">
            <div class="floating-element element-1"></div>
            <div class="floating-element element-2"></div>
            <div class="floating-element element-3"></div>
        </div>
        <div class="container position-relative">
            <div class="section-header text-center mb-6">
                <h2 class="display-5 fw-bold section-title text-gradient-primary">Sejarah Gampong Baru</h2>
                <div class="divider mx-auto"></div>
                <p class="lead max-w-800 mx-auto text-muted">Mengenal lebih dalam akar budaya dan perjalanan panjang desa kami</p>
            </div>
            
            <div class="row align-items-center g-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden animate__animated animate__fadeInLeft h-100 hover-3d">
                        <div class="card-img-top position-relative">
                            <img src="https://images.unsplash.com/photo-1584466977773-e625c37cdd50?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid w-100" alt="Sejarah Desa">
                            <div class="img-overlay"></div>
                            <div class="img-caption">
                                <i class="fas fa-landmark me-2"></i> Balai Gampong Baru Tahun 1950
                            </div>
                            <div class="img-hover-content">
                                <button class="btn btn-light btn-sm rounded-pill">
                                    <i class="fas fa-expand me-1"></i> Lihat Detail
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="h4 card-title mb-4 text-center">Asal Usul Gampong Baru</h3>
                            <p class="card-text">Gampong Baru berdiri pada tahun 1923 sebagai pemukiman baru bagi masyarakat yang bermigrasi dari daerah pesisir Aceh Besar. Nama "Baru" dipilih sebagai simbol harapan baru bagi kehidupan yang lebih baik.</p>
                            <p>Desa kami berkembang sebagai pusat pertanian dan kerajinan tradisional Aceh. Kehidupan masyarakat awalnya berpusat di sekitar Meunasah yang berfungsi sebagai tempat ibadah dan pusat kegiatan sosial.</p>
                            <p>Setelah kemerdekaan, Gampong Baru menjadi salah satu pusat pendidikan agama di daerah ini dengan berdirinya Dayah (Pesantren) Al-Mubarok pada tahun 1952.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <button class="btn btn-outline-primary rounded-pill px-4">
                                <i class="fas fa-book-open me-2"></i> Baca Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden animate__animated animate__fadeInRight h-100 hover-3d">
                        <div class="card-body p-4">
                            <div class="premium-timeline">
                                <div class="timeline-item">
                                    <div class="timeline-year bg-gold pulse-animation">1923</div>
                                    <div class="timeline-content">
                                        <h3>Pendirian Gampong</h3>
                                        <p>Gampong Baru resmi berdiri dengan 35 kepala keluarga sebagai penduduk pertama yang dipimpin oleh Keuchik pertama, Teuku Muhammad Ali.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-primary pulse-animation">1945</div>
                                    <div class="timeline-content">
                                        <h3>Masa Revolusi</h3>
                                        <p>Warga Gampong Baru aktif mendukung perjuangan kemerdekaan Indonesia dengan menjadi basis logistik pejuang Aceh.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-success pulse-animation">1952</div>
                                    <div class="timeline-content">
                                        <h3>Pendidikan Agama</h3>
                                        <p>Didirikan Dayah Al-Mubarok yang menjadi pusat pendidikan agama terkemuka di Aceh Besar.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-purple pulse-animation">1976</div>
                                    <div class="timeline-content">
                                        <h3>Listrik Masuk Desa</h3>
                                        <p>Gampong Baru mendapatkan akses listrik untuk pertama kalinya, menandai era modernisasi.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-danger pulse-animation">2004</div>
                                    <div class="timeline-content">
                                        <h3>Pasca Tsunami</h3>
                                        <p>Pembangunan kembali Gampong setelah terdampak tsunami dengan tata ruang yang lebih baik.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-info pulse-animation">2020</div>
                                    <div class="timeline-content">
                                        <h3>Desa Digital</h3>
                                        <p>Gampong Baru mendapatkan penghargaan sebagai Desa Digital Terbaik se-Aceh Besar.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi with Animated Cards -->
    <section id="visi-misi" class="visi-misi py-6 bg-white position-relative">
        <div class="container position-relative">
            <div class="section-header text-center mb-6">
                <h2 class="display-5 fw-bold section-title text-gradient-primary">Visi & Misi Gampong</h2>
                <div class="divider mx-auto"></div>
                <p class="lead max-w-800 mx-auto text-muted">Pedoman kami dalam membangun desa yang lebih baik</p>
            </div>
            
            <div class="row g-4">
                <!-- Visi -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 bg-gradient-visi animate__animated animate__fadeInUp hover-3d">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box bg-white text-primary rounded-circle me-4 shadow">
                                    <i class="fas fa-bullseye fa-2x"></i>
                                </div>
                                <h2 class="h3 mb-0 text-white">Visi Gampong</h2>
                            </div>
                            <div class="vision-content bg-white p-4 rounded-2 shadow-sm">
                                <div class="vision-text">
                                    <p class="mb-0 fst-italic fw-bold text-center text-dark">"Mewujudkan Gampong Baru yang Madani, Berdaya Saing, dan Berkelanjutan melalui Penguatan Nilai-nilai Islami, Pemberdayaan Masyarakat berbasis Kearifan Lokal Aceh, serta Inovasi Teknologi Digital."</p>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="d-inline-block px-3 py-1 rounded-pill bg-white-10 text-white">
                                    <small><i class="fas fa-quote-left me-1"></i> Visi 2020-2030</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-3">
                            <button class="btn btn-outline-light rounded-pill px-4 btn-download-visi">
                                <i class="fas fa-download me-2"></i> Unduh Dokumen Visi
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Misi -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 bg-gradient-misi animate__animated animate__fadeInUp hover-3d">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="icon-box bg-white text-success rounded-circle me-4 shadow">
                                    <i class="fas fa-tasks fa-2x"></i>
                                </div>
                                <h2 class="h3 mb-0 text-white">Misi Gampong</h2>
                            </div>
                            <ul class="mission-list list-unstyled">
                                <li class="mb-3">
                                    <div class="mission-item bg-white p-3 rounded-2 shadow-sm hover-grow">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-primary text-white rounded-circle me-3">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <span>Meningkatkan kualitas sumber daya manusia yang berakhlak mulia dan berdaya saing</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="mission-item bg-white p-3 rounded-2 shadow-sm hover-grow">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-success text-white rounded-circle me-3">
                                                <i class="fas fa-hand-holding-usd"></i>
                                            </div>
                                            <span>Mengembangkan ekonomi kreatif berbasis potensi lokal dengan pendekatan syariah</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="mission-item bg-white p-3 rounded-2 shadow-sm hover-grow">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-danger text-white rounded-circle me-3">
                                                <i class="fas fa-landmark"></i>
                                            </div>
                                            <span>Memperkuat tata kelola pemerintahan yang transparan dan akuntabel</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="mission-item bg-white p-3 rounded-2 shadow-sm hover-grow">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-warning text-white rounded-circle me-3">
                                                <i class="fas fa-leaf"></i>
                                            </div>
                                            <span>Melestarikan lingkungan hidup dan budaya Aceh yang islami</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="mission-item bg-white p-3 rounded-2 shadow-sm hover-grow">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-info text-white rounded-circle me-3">
                                                <i class="fas fa-road"></i>
                                            </div>
                                            <span>Membangun infrastruktur yang berkelanjutan dan ramah lingkungan</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-3">
                            <button class="btn btn-outline-light rounded-pill px-4 btn-download-misi">
                                <i class="fas fa-download me-2"></i> Unduh Dokumen Misi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi with Interactive Elements -->
    <section id="peta" class="peta-lokasi py-6 bg-light position-relative">
        <div class="container position-relative">
            <div class="section-header text-center mb-6">
                <h2 class="display-5 fw-bold section-title text-gradient-primary">Peta Wilayah Gampong</h2>
                <div class="divider mx-auto"></div>
                <p class="lead max-w-800 mx-auto text-muted">Lokasi strategis di jantung Aceh Besar</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden animate__animated animate__fadeInLeft h-100 hover-3d">
                        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                            <h3 class="h5 mb-0"><i class="fas fa-map-marked-alt me-2"></i>Peta Digital Gampong Baru</h3>
                            <div class="map-controls">
                                <button class="btn btn-sm btn-light rounded-circle me-1" title="Zoom In"><i class="fas fa-search-plus"></i></button>
                                <button class="btn btn-sm btn-light rounded-circle me-1" title="Zoom Out"><i class="fas fa-search-minus"></i></button>
                                <button class="btn btn-sm btn-light rounded-circle" title="Lokasi Saya"><i class="fas fa-location-arrow"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0 position-relative">
                            <div class="map-overlay">
                                <div class="map-tooltip" style="top: 30%; left: 40%;">
                                    <div class="tooltip-content">
                                        <h5>Balai Gampong</h5>
                                        <p>Pusat pemerintahan desa</p>
                                    </div>
                                </div>
                                <div class="map-tooltip" style="top: 50%; left: 60%;">
                                    <div class="tooltip-content">
                                        <h5>Meunasah</h5>
                                        <p>Tempat ibadah dan kegiatan sosial</p>
                                    </div>
                                </div>
                                <div class="map-tooltip" style="top: 70%; left: 30%;">
                                    <div class="tooltip-content">
                                        <h5>Pasar Desa</h5>
                                        <p>Pusat ekonomi warga</p>
                                    </div>
                                </div>
                            </div>
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.329724614678!2d95.32284727501456!3d5.559933334379824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040372e5e58a36b%3A0x5a5a5a5a5a5a5a5a!2sGampong%20Baru%2C%20Kec.%20Baiturrahman%2C%20Kota%20Banda%20Aceh%2C%20Aceh!5e0!3m2!1sen!2sid!4v1620000000000!5m2!1sen!2sid" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="card-footer bg-light py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-info-circle me-1"></i> Geser dan zoom untuk menjelajahi peta</small>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-expand me-1"></i> Layar Penuh
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-lg rounded-3 h-100 animate__animated animate__fadeInRight hover-3d">
                        <div class="card-header bg-success text-white py-3">
                            <h3 class="h5 mb-0"><i class="fas fa-border-all me-2"></i>Batas Wilayah</h3>
                        </div>
                        <div class="card-body">
                            <div class="batas-wilayah">
                                <div class="batas-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="batas-icon bg-primary text-white rounded-circle me-3 flex-shrink-0">
                                            <i class="fas fa-arrow-up"></i>
                                        </div>
                                        <div>
                                            <h4 class="h5 mb-1">Utara</h4>
                                            <p class="mb-0">Gampong Lampeuneurut</p>
                                            <small class="text-muted">± 2.5 km dari pusat gampong</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="batas-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="batas-icon bg-danger text-white rounded-circle me-3 flex-shrink-0">
                                            <i class="fas fa-arrow-down"></i>
                                        </div>
                                        <div>
                                            <h4 class="h5 mb-1">Selatan</h4>
                                            <p class="mb-0">Gampong Lambaro Angan</p>
                                            <small class="text-muted">± 3 km dari pusat gampong</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="batas-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="batas-icon bg-success text-white rounded-circle me-3 flex-shrink-0">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <div>
                                            <h4 class="h5 mb-1">Timur</h4>
                                            <p class="mb-0">Krueng Aceh</p>
                                            <small class="text-muted">± 1 km dari pusat gampong</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="batas-item">
                                    <div class="d-flex align-items-start">
                                        <div class="batas-icon bg-warning text-white rounded-circle me-3 flex-shrink-0">
                                            <i class="fas fa-arrow-left"></i>
                                        </div>
                                        <div>
                                            <h4 class="h5 mb-1">Barat</h4>
                                            <p class="mb-0">Gampong Lamtamot</p>
                                            <small class="text-muted">± 2 km dari pusat gampong</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wilayah-info mt-4 p-3 rounded-2 bg-light">
                                <h5 class="h6 mb-2"><i class="fas fa-chart-pie me-2"></i>Statistik Wilayah</h5>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="p-2 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block">Luas Wilayah</small>
                                            <strong>320 Ha</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block">Ketinggian</small>
                                            <strong>45 mdpl</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block">Jumlah Penduduk</small>
                                            <strong>1.245 Jiwa</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block">Kepadatan</small>
                                            <strong>389/km²</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center">
                            <button class="btn btn-sm btn-outline-success">
                                <i class="fas fa-download me-1"></i> Unduh Peta Lengkap
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi with Interactive Chart -->
    <section id="struktur" class="struktur-organisasi py-6 bg-white position-relative">
        <div class="container position-relative">
            <div class="section-header text-center mb-6">
                <h2 class="display-5 fw-bold section-title text-gradient-primary">Struktur Organisasi</h2>
                <div class="divider mx-auto"></div>
                <p class="lead max-w-800 mx-auto text-muted">Tata kelola pemerintahan gampong yang profesional</p>
            </div>
            
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden animate__animated animate__fadeInUp hover-3d">
                <div class="card-header bg-gradient-struktur py-4">
                    <h3 class="h4 mb-0 text-white text-center"><i class="fas fa-sitemap me-2"></i>Bagan Organisasi Pemerintahan Gampong Baru</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Interactive Organizational Chart -->
                    <div class="org-chart-container">
                        <div class="org-chart">
                            <div class="org-level">
                                <div class="org-item ceo">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="Keuchik">
                                    </div>
                                    <div class="org-details">
                                        <h4>Teuku Muhammad Rizal, S.Sos</h4>
                                        <p>Keuchik Gampong</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="org-connector"></div>
                            
                            <div class="org-level">
                                <div class="org-item c-level">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Sekretaris">
                                    </div>
                                    <div class="org-details">
                                        <h4>Cut Nurul Hikmah, S.E.</h4>
                                        <p>Sekretaris</p>
                                    </div>
                                </div>
                                <div class="org-item c-level">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Bendahara">
                                    </div>
                                    <div class="org-details">
                                        <h4>Budi Santoso, S.E.</h4>
                                        <p>Bendahara</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="org-connector"></div>
                            
                            <div class="org-level">
                                <div class="org-item manager">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Kaur Pemerintahan">
                                    </div>
                                    <div class="org-details">
                                        <h4>Teuku Faisal</h4>
                                        <p>Kaur Pemerintahan</p>
                                    </div>
                                </div>
                                <div class="org-item manager">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Kaur Pembangunan">
                                    </div>
                                    <div class="org-details">
                                        <h4>Cut Sarah</h4>
                                        <p>Kaur Pembangunan</p>
                                    </div>
                                </div>
                                <div class="org-item manager">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="Kaur Keuangan">
                                    </div>
                                    <div class="org-details">
                                        <h4>Muhammad Iqbal</h4>
                                        <p>Kaur Keuangan</p>
                                    </div>
                                </div>
                                <div class="org-item manager">
                                    <div class="org-avatar">
                                        <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="Kaur Umum">
                                    </div>
                                    <div class="org-details">
                                        <h4>Nurul Aini</h4>
                                        <p>Kaur Umum</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Leadership Team -->
                    <h4 class="text-center my-5 fw-bold">Profil Pimpinan Gampong</h4>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100 hover-effect leader-card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar mx-auto mb-3">
                                        <img src="https://randomuser.me/api/portraits/men/65.jpg" class="rounded-circle shadow" width="100" alt="Keuchik">
                                        <div class="leader-badge bg-primary">Keuchik</div>
                                    </div>
                                    <h4 class="h5 mb-1">Teuku Muhammad Rizal, S.Sos</h4>
                                    <p class="text-muted small mb-2">Keuchik Gampong Baru</p>
                                    <div class="divider mx-auto my-3"></div>
                                    <p class="small text-muted mb-2"><i class="fas fa-quote-left text-primary me-2"></i>Memimpin penyelenggaraan pemerintahan gampong dan mewakili gampong di dalam dan di luar pengadilan.</p>
                                    <div class="leader-info mt-3">
                                        <div class="d-flex justify-content-center mb-2">
                                            <div class="me-3">
                                                <small class="text-muted d-block">Masa Jabatan</small>
                                                <strong>2019-2024</strong>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Usia</small>
                                                <strong>45 Tahun</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-links mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fas fa-envelope"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100 hover-effect leader-card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar mx-auto mb-3">
                                        <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle shadow" width="100" alt="Sekretaris">
                                        <div class="leader-badge bg-success">Sekretaris</div>
                                    </div>
                                    <h4 class="h5 mb-1">Cut Nurul Hikmah, S.E.</h4>
                                    <p class="text-muted small mb-2">Sekretaris Gampong</p>
                                    <div class="divider mx-auto my-3"></div>
                                    <p class="small text-muted mb-2"><i class="fas fa-quote-left text-primary me-2"></i>Membantu keuchik dalam melaksanakan tugas dan fungsi administrasi pemerintahan gampong.</p>
                                    <div class="leader-info mt-3">
                                        <div class="d-flex justify-content-center mb-2">
                                            <div class="me-3">
                                                <small class="text-muted d-block">Masa Jabatan</small>
                                                <strong>2020-2025</strong>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Usia</small>
                                                <strong>38 Tahun</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-links mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fas fa-envelope"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100 hover-effect leader-card">
                                <div class="card-body text-center p-4">
                                    <div class="avatar mx-auto mb-3">
                                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle shadow" width="100" alt="Bendahara">
                                        <div class="leader-badge bg-warning">Bendahara</div>
                                    </div>
                                    <h4 class="h5 mb-1">Budi Santoso, S.E.</h4>
                                    <p class="text-muted small mb-2">Bendahara Gampong</p>
                                    <div class="divider mx-auto my-3"></div>
                                    <p class="small text-muted mb-2"><i class="fas fa-quote-left text-primary me-2"></i>Mengelola keuangan gampong dan bertanggung jawab atas pengelolaan APBG.</p>
                                    <div class="leader-info mt-3">
                                        <div class="d-flex justify-content-center mb-2">
                                            <div class="me-3">
                                                <small class="text-muted d-block">Masa Jabatan</small>
                                                <strong>2021-2026</strong>
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Usia</small>
                                                <strong>42 Tahun</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social-links mt-3">
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle me-1"><i class="fas fa-envelope"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-primary rounded-circle"><i class="fas fa-phone"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Department Heads -->
                    <h4 class="text-center mt-5 mb-4 fw-bold">Kepala Urusan</h4>
                    <div class="row g-4">
                        <div class="col-md-3 col-6">
                            <div class="card border-0 shadow-sm h-100 hover-effect">
                                <div class="card-body text-center p-3">
                                    <div class="avatar mx-auto mb-2">
                                        <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle shadow" width="80" alt="Kaur Pemerintahan">
                                    </div>
                                    <h5 class="h6 mb-1">Teuku Faisal</h5>
                                    <p class="text-muted small mb-2">Kaur Pemerintahan</p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 rounded-pill px-3">Profil</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 shadow-sm h-100 hover-effect">
                                <div class="card-body text-center p-3">
                                    <div class="avatar mx-auto mb-2">
                                        <img src="https://randomuser.me/api/portraits/women/45.jpg" class="rounded-circle shadow" width="80" alt="Kaur Pembangunan">
                                    </div>
                                    <h5 class="h6 mb-1">Cut Sarah</h5>
                                    <p class="text-muted small mb-2">Kaur Pembangunan</p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 rounded-pill px-3">Profil</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 shadow-sm h-100 hover-effect">
                                <div class="card-body text-center p-3">
                                    <div class="avatar mx-auto mb-2">
                                        <img src="https://randomuser.me/api/portraits/men/55.jpg" class="rounded-circle shadow" width="80" alt="Kaur Keuangan">
                                    </div>
                                    <h5 class="h6 mb-1">Muhammad Iqbal</h5>
                                    <p class="text-muted small mb-2">Kaur Keuangan</p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 rounded-pill px-3">Profil</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card border-0 shadow-sm h-100 hover-effect">
                                <div class="card-body text-center p-3">
                                    <div class="avatar mx-auto mb-2">
                                        <img src="https://randomuser.me/api/portraits/women/55.jpg" class="rounded-circle shadow" width="80" alt="Kaur Umum">
                                    </div>
                                    <h5 class="h6 mb-1">Nurul Aini</h5>
                                    <p class="text-muted small mb-2">Kaur Umum</p>
                                    <button class="btn btn-sm btn-outline-primary mt-2 rounded-pill px-3">Profil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Back to Top Button -->
    <div class="back-to-top">
        <a href="#" class="btn btn-primary btn-lg rounded-circle shadow-lg">
            <i class="fas fa-arrow-up"></i>
        </a>
    </div>
</div>

<style>
    /* Premium Custom Styles with Animations */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    :root {
        --primary: #4e54c8;
        --secondary: #8f94fb;
        --success: #11998e;
        --info: #38ef7d;
        --warning: #fdc830;
        --danger: #f85032;
        --dark: #2c3e50;
        --light: #f8f9fa;
        --gold: #D4AF37;
        --purple: #6a3093;
    }
    
    .profil-desa {
        font-family: 'Poppins', sans-serif;
        position: relative;
        overflow-x: hidden;
    }
    
    /* Header with Particles Animation */
    .profil-header {
        position: relative;
        background-attachment: fixed;
        padding: 150px 0;
        display: flex;
        align-items: center;
        min-height: 100vh;
    }
    
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
    }
    
    .header-content {
        position: relative;
        z-index: 1;
    }
    
    /* Glitch Effect */
    .glitch {
        position: relative;
    }
    
    .glitch::before, .glitch::after {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.8;
    }
    
    .glitch::before {
        color: #0ff;
        z-index: -1;
        animation: glitch-effect 3s infinite;
    }
    
    .glitch::after {
        color: #f0f;
        z-index: -2;
        animation: glitch-effect 2s infinite reverse;
    }
    
    @keyframes glitch-effect {
        0% { transform: translate(0); }
        20% { transform: translate(-3px, 3px); }
        40% { transform: translate(-3px, -3px); }
        60% { transform: translate(3px, 3px); }
        80% { transform: translate(3px, -3px); }
        100% { transform: translate(0); }
    }
    
    /* Tracking in animation */
    .tracking-in-expand {
        animation: tracking-in-expand 1s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
    }
    
    @keyframes tracking-in-expand {
        0% {
            letter-spacing: -0.5em;
            opacity: 0;
        }
        40% {
            opacity: 0.6;
        }
        100% {
            opacity: 1;
        }
    }
    
    /* Scale in animation */
    .scale-in-center {
        animation: scale-in-center 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    
    @keyframes scale-in-center {
        0% {
            transform: scale(0);
            opacity: 1;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
    
    /* Scroll down button */
    .scroll-down-btn {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {transform: translateY(0);} 
        40% {transform: translateY(-20px);} 
        60% {transform: translateY(-10px);} 
    }
    
    /* Text shadow */
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .letter-spacing-2 {
        letter-spacing: 2px;
    }
    
    /* Gradient backgrounds */
    .bg-gold {
        background: linear-gradient(to right, #D4AF37, #F5D76E);
        color: #000;
    }
    
    .bg-purple {
        background: linear-gradient(to right, #6a3093, #a044ff);
        color: #fff;
    }
    
    .text-gradient-primary {
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    /* Section styling */
    .section-title {
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, #4e54c8, #8f94fb);
    }
    
    .divider {
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        margin: 15px auto;
    }
    
    .max-w-800 {
        max-width: 800px;
    }
    
    .py-6 {
        padding-top: 4rem;
        padding-bottom: 4rem;
    }
    
    .mb-6 {
        margin-bottom: 4rem;
    }
    
    /* Gradient cards */
    .bg-gradient-visi {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
    }
    
    .bg-gradient-misi {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }
    
    .bg-gradient-struktur {
        background: linear-gradient(135deg, #a044ff 0%, #6a3093 100%);
    }
    
    /* Timeline with animations */
    .premium-timeline {
        position: relative;
        padding-left: 60px;
    }
    
    .premium-timeline::before {
        content: '';
        position: absolute;
        left: 25px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #4e54c8, #8f94fb);
        border-radius: 3px;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
    }
    
    .timeline-year {
        position: absolute;
        left: -60px;
        top: 0;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        box-shadow: 0 0 0 5px white, 0 5px 15px rgba(0,0,0,0.1);
        font-size: 1.1rem;
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .timeline-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        border-left: 3px solid #4e54c8;
        transition: all 0.3s ease;
    }
    
    .timeline-content:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    .timeline-content h3 {
        color: #4e54c8;
        margin-top: 0;
        font-size: 1.2rem;
    }
    
    /* Mission list */
    .mission-list .mission-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .mission-item {
        transition: all 0.3s ease;
    }
    
    .hover-grow {
        transition: all 0.3s ease;
    }
    
    .hover-grow:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    /* Image effects */
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    }
    
    .img-caption {
        position: absolute;
        bottom: 20px;
        left: 20px;
        color: white;
        font-size: 0.9rem;
        z-index: 1;
    }
    
    .img-hover-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 1;
    }
    
    .card-img-top:hover .img-hover-content {
        opacity: 1;
    }
    
    /* Badge positioning */
    .badge-position {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
    }
    
    /* Hover effects */
    .hover-effect {
        transition: all 0.3s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .hover-3d {
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    
    .hover-3d:hover {
        transform: translateY(-5px) perspective(1000px) rotateX(5deg) rotateY(0deg) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    /* Social links */
    .social-links a {
        transition: all 0.3s ease;
    }
    
    .social-links a:hover {
        transform: scale(1.2);
    }
    
    /* Floating Navigation with Glass Morphism */
    .floating-nav-container {
        position: relative;
        margin-top: -30px;
        z-index: 100;
    }
    
    .glass-morphism {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .floating-nav {
        background: white;
        padding: 15px 30px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
    }
    
    .nav-item {
        margin: 0 15px;
        color: #555;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        padding: 5px 10px;
        border-radius: 8px;
    }
    
    .nav-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 5px;
        transition: all 0.3s ease;
    }
    
    .nav-item:hover {
        color: #4e54c8;
    }
    
    .nav-item:hover .nav-icon {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(78, 84, 200, 0.3);
    }
    
    .nav-indicator {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(to right, #4e54c8, #8f94fb);
        border-radius: 3px;
        transition: all 0.3s ease;
    }
    
    /* Floating elements */
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }
    
    .floating-element {
        position: absolute;
        border-radius: 50%;
        background: rgba(78, 84, 200, 0.1);
        animation: float 15s infinite linear;
    }
    
    .element-1 {
        width: 300px;
        height: 300px;
        top: -50px;
        left: -50px;
        animation-delay: 0s;
    }
    
    .element-2 {
        width: 200px;
        height: 200px;
        bottom: -30px;
        right: -30px;
        animation-delay: 5s;
    }
    
    .element-3 {
        width: 150px;
        height: 150px;
        top: 40%;
        right: -30px;
        animation-delay: 8s;
    }
    
    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
        100% { transform: translateY(0) rotate(360deg); }
    }
    
    /* Image zoom */
    .image-zoom {
        position: relative;
        display: inline-block;
    }
    
    .zoom-indicator {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .image-zoom:hover .zoom-indicator {
        opacity: 1;
    }
    
    /* Organizational chart */
    .org-chart-container {
        width: 100%;
        overflow-x: auto;
        padding: 20px 0;
    }
    
    .org-chart {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 800px;
        position: relative;
    }
    
    .org-level {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
        width: 100%;
    }
    
    .org-connector {
        width: 2px;
        height: 30px;
        background: linear-gradient(to bottom, #4e54c8, #8f94fb);
        margin-bottom: 30px;
    }
    
    .org-item {
        background: white;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin: 0 15px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 200px;
    }
    
    .org-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .org-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 10px;
        border: 3px solid #4e54c8;
    }
    
    .org-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .org-details h4 {
        margin: 0;
        font-size: 1rem;
        color: #333;
    }
    
    .org-details p {
        margin: 5px 0 0;
        font-size: 0.8rem;
        color: #666;
    }
    
    .ceo {
        border-top: 5px solid var(--primary);
    }
    
    .c-level {
        border-top: 5px solid var(--success);
    }
    
    .manager {
        border-top: 5px solid var(--warning);
    }
    
    /* Leader card */
    .leader-card {
        position: relative;
    }
    
    .leader-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
    }
    
    /* Back to top button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 99;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    
    .back-to-top.show {
        opacity: 1;
        visibility: visible;
    }
    
    /* Map tooltip */
    .map-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        pointer-events: none;
    }
    
    .map-tooltip {
        position: absolute;
        transform: translate(-50%, -50%);
    }
    
    .tooltip-content {
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 10px;
        border-radius: 5px;
        font-size: 0.8rem;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    
    .map-tooltip:hover .tooltip-content {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .org-chart {
            min-width: 700px;
        }
    }
    
    @media (max-width: 992px) {
        .profil-header {
            padding: 100px 0;
            min-height: auto;
        }
        
        .display-3 {
            font-size: 2.5rem;
        }
        
        .floating-nav {
            padding: 10px 15px;
        }
        
        .nav-item {
            margin: 0 10px;
            font-size: 0.9rem;
        }
        
        .org-chart {
            min-width: 600px;
        }
    }
    
    @media (max-width: 768px) {
        .profil-header {
            padding: 80px 0;
            background-attachment: scroll;
        }
        
        .display-3 {
            font-size: 2rem;
        }
        
        .floating-nav {
            border-radius: 10px !important;
            padding: 10px;
        }
        
        .nav-item {
            margin: 5px;
            font-size: 0.8rem;
        }
        
        .py-6 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
        
        .org-chart {
            min-width: 500px;
        }
        
        .org-item {
            min-width: 150px;
            padding: 10px;
            margin: 0 10px;
        }
    }
    
    @media (max-width: 576px) {
        .profil-header {
            padding: 60px 0;
        }
        
        .display-3 {
            font-size: 1.8rem;
        }
        
        .nav-item {
            margin: 3px;
            font-size: 0.7rem;
            padding: 5px;
        }
        
        .nav-icon {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }
        
        .org-chart {
            min-width: 400px;
        }
        
        .org-item {
            min-width: 120px;
            margin: 0 5px;
        }
    }
</style>

<!-- Include required libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<!-- Fancybox for image zoom -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize fancybox for image zoom
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
        
        // Smooth scrolling for navigation
        $('a.smooth-scroll').on('click', function(e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 80
            }, 800, 'swing', function() {
                window.location.hash = target;
            });
        });
        
        // Back to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });
        
        $('.back-to-top').click(function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
        
        // Initialize particles.js
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
        
        // Floating nav indicator
        function updateNavIndicator() {
            var scrollPosition = $(window).scrollTop();
            
            $('section').each(function() {
                var sectionId = $(this).attr('id');
                var sectionTop = $(this).offset().top - 100;
                var sectionBottom = sectionTop + $(this).outerHeight();
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                    $('.floating-nav a').removeClass('active');
                    $('.floating-nav a[href="#' + sectionId + '"]').addClass('active');
                    
                    var activeItem = $('.floating-nav a.active');
                    if (activeItem.length) {
                        var itemPosition = activeItem.position().left;
                        var itemWidth = activeItem.outerWidth();
                        
                        $('.nav-indicator').css({
                            'width': itemWidth,
                            'left': itemPosition
                        });
                    }
                }
            });
        }
        
        $(window).scroll(function() {
            updateNavIndicator();
        });
        
        updateNavIndicator();
        
        // Hover effects for map tooltips
        $('.map-tooltip').hover(function() {
            $(this).find('.tooltip-content').css({
                'opacity': '1',
                'transform': 'translateY(0)'
            });
        }, function() {
            $(this).find('.tooltip-content').css({
                'opacity': '0',
                'transform': 'translateY(10px)'
            });
        });
    });
</script>
@endsection