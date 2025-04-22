@extends('components.main')

@section('content')
<div class="profil-desa">
    <!-- Compact Parallax Header -->
    <header class="profil-header text-center py-4 mb-4" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div id="particles-js"></div>
        <div class="container position-relative">
            <div class="header-content animate__animated animate__fadeInDown">
                <h1 class="h2 text-white fw-bold mb-2 text-shadow glitch" data-text="Gampong Baru">Gampong Baru</h1>
                <p class="small text-light animate__animated animate__fadeInUp text-uppercase letter-spacing-2 tracking-in-expand">Kecamatan Darul Imarah, Kabupaten Aceh Besar</p>
                <div class="mt-3 animate__animated animate__fadeInUp animate__delay-1s">
                    <span class="badge bg-gold rounded-pill px-2 py-1 me-1 scale-in-center" style="font-size: 12px;">Desa Mandiri</span>
                    <span class="badge bg-primary rounded-pill px-2 py-1 me-1 scale-in-center" style="font-size: 12px; animation-delay: 0.2s">Desa Digital</span>
                    <span class="badge bg-success rounded-pill px-2 py-1 scale-in-center" style="font-size: 12px; animation-delay: 0.4s">Desa Wisata</span>
                </div>
            </div>
        </div>
    </header>


    <!-- Sejarah Desa - Compact Version -->
    <section id="sejarah" class="sejarah-desa py-4 bg-light position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="section-header text-center mb-4">
                <h2 class="h3 fw-bold section-title text-gradient-primary">Sejarah Gampong Baru</h2>
                <div class="divider mx-auto"></div>
                <p class="small max-w-800 mx-auto text-muted">Mengenal lebih dalam akar budaya dan perjalanan panjang desa kami</p>
            </div>
            
            <div class="row align-items-center g-3">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInLeft h-100">
                        <div class="card-img-top position-relative">
                            <img src="https://lh3.googleusercontent.com/p/AF1QipOPFEINQ1aYBgWTW1_Nhj_HG4XZNRxF4lkvE1pm=w506-h240-k-no" class="img-fluid w-100" alt="Sejarah Desa">
                            <div class="img-overlay"></div>
                            <div class="img-caption" style="font-size: 12px;">
                                <i class="fas fa-landmark me-1"></i> Balai Gampong Baru Tahun 1950
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <h3 class="h6 card-title mb-3 text-center">Asal Usul Gampong Baru</h3>
                            <p class="card-text small">Gampong Baru berdiri pada tahun 1923 sebagai pemukiman baru bagi masyarakat yang bermigrasi dari daerah pesisir Aceh Besar. Nama "Baru" dipilih sebagai simbol harapan baru bagi kehidupan yang lebih baik.</p>
                            <p class="small">Desa kami berkembang sebagai pusat pertanian dan kerajinan tradisional Aceh. Kehidupan masyarakat awalnya berpusat di sekitar Meunasah yang berfungsi sebagai tempat ibadah dan pusat kegiatan sosial.</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-2">
                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3" style="font-size: 12px;">
                                <i class="fas fa-book-open me-1"></i> Baca Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInRight h-100">
                        <div class="card-body p-3">
                            <div class="premium-timeline">
                                <div class="timeline-item">
                                    <div class="timeline-year bg-gold pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">1923</div>
                                    <div class="timeline-content p-2">
                                        <h3 class="h6">Pendirian Gampong</h3>
                                        <p class="small mb-0">Gampong Baru resmi berdiri dengan 35 kepala keluarga sebagai penduduk pertama yang dipimpin oleh Keuchik pertama, Teuku Muhammad Ali.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-primary pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">1945</div>
                                    <div class="timeline-content p-2">
                                        <h3 class="h6">Masa Revolusi</h3>
                                        <p class="small mb-0">Warga Gampong Baru aktif mendukung perjuangan kemerdekaan Indonesia dengan menjadi basis logistik pejuang Aceh.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-success pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">1952</div>
                                    <div class="timeline-content p-2">
                                        <h3 class="h6">Pendidikan Agama</h3>
                                        <p class="small mb-0">Didirikan Dayah Al-Mubarok yang menjadi pusat pendidikan agama terkemuka di Aceh Besar.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-purple pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">1976</div>
                                    <div class="timeline-content p-2">
                                        <h3 class="h6">Listrik Masuk Desa</h3>
                                        <p class="small mb-0">Gampong Baru mendapatkan akses listrik untuk pertama kalinya, menandai era modernisasi.</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-year bg-danger pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">2004</div>
                                    <div class="timeline-content p-2">
                                       <h3 class="h6">Pasca Tsunami</h3>
                                       <p class="small mb-0">Pembangunan kembali Gampong setelah terdampak tsunami dengan tata ruang yang lebih baik.</p>
                                    </div>
                              </div>
                              <div class="timeline-item">
                                 <div class="timeline-year bg-info pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">2020</div>
                                 <div class="timeline-content p-2">
                                     <h3 class="h6">Desa Digital</h3>
                                     <p class="small mb-0">Gampong Baru mendapatkan penghargaan sebagai Desa Digital Terbaik se-Aceh Besar.</p>
                                 </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi - Compact Version -->
    <section id="visi-misi" class="visi-misi py-4 bg-white position-relative">
        <div class="container position-relative">
            <div class="section-header text-center mb-4">
                <h2 class="h3 fw-bold section-title text-gradient-primary">Visi & Misi Gampong</h2>
                <div class="divider mx-auto"></div>
                <p class="small max-w-800 mx-auto text-muted">Pedoman kami dalam membangun desa yang lebih baik</p>
            </div>
            
            <div class="row g-3">
                <!-- Visi -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-2 bg-gradient-visi animate__animated animate__fadeInUp">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box text-primary rounded-circle me-3 shadow" style="background: white; width: 30px; height: 30px; line-height: 30px;">
                                    <i class="fas fa-bullseye fa-xs"></i>
                                </div>
                                <h2 class="h6 mb-0 text-white">Visi Gampong</h2>
                            </div>
                            <div class="vision-content bg-white p-3 rounded-2 shadow-sm">
                                <div class="vision-text">
                                    <p class="mb-0 fst-italic fw-bold text-center text-dark small">"Mewujudkan Gampong Baru yang Madani, Berdaya Saing, dan Berkelanjutan melalui Penguatan Nilai-nilai Islami, Pemberdayaan Masyarakat berbasis Kearifan Lokal Aceh, serta Inovasi Teknologi Digital."</p>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <div class="d-inline-block px-2 py-1 rounded-pill bg-white-10 text-white small">
                                    <i class="fas fa-quote-left me-1"></i> Visi 2020-2030
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-2">
                            <button class="btn btn-outline-light btn-sm rounded-pill px-3 btn-download-visi" style="font-size: 12px;">
                                <i class="fas fa-download me-1"></i> Unduh Visi
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Misi -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm rounded-2 bg-gradient-misi animate__animated animate__fadeInUp">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-box text-success rounded-circle me-3 shadow" style="background: white; width: 30px; height: 30px; line-height: 30px;">
                                    <i class="fas fa-tasks fa-xs"></i>
                                </div>
                                <h2 class="h6 mb-0 text-white">Misi Gampong</h2>
                            </div>
                            <ul class="mission-list list-unstyled">
                                <li class="mb-2">
                                    <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-primary text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                                <i class="fas fa-users fa-xs"></i>
                                            </div>
                                            <span class="small">Meningkatkan kualitas sumber daya manusia yang berakhlak mulia dan berdaya saing</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-success text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                                <i class="fas fa-hand-holding-usd fa-xs"></i>
                                            </div>
                                            <span class="small">Mengembangkan ekonomi kreatif berbasis potensi lokal dengan pendekatan syariah</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-2">
                                    <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <div class="mission-icon bg-danger text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                                <i class="fas fa-landmark fa-xs"></i>
                                            </div>
                                            <span class="small">Memperkuat tata kelola pemerintahan yang transparan dan akuntabel</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-2">
                            <button class="btn btn-outline-light btn-sm rounded-pill px-3 btn-download-misi" style="font-size: 12px;">
                                <i class="fas fa-download me-1"></i> Unduh Misi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi - Compact Version -->
    <section id="peta" class="peta-lokasi py-4 bg-light position-relative">
        <div class="container position-relative">
            <div class="section-header text-center mb-4">
                <h2 class="h3 fw-bold section-title text-gradient-primary">Peta Wilayah Gampong</h2>
                <div class="divider mx-auto"></div>
                <p class="small max-w-800 mx-auto text-muted">Lokasi strategis di jantung Aceh Besar</p>
            </div>
            
            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInLeft h-100">
                        <div class="card-header bg-primary text-white py-2 d-flex justify-content-between align-items-center">
                            <h3 class="h6 mb-0"><i class="fas fa-map-marked-alt me-1"></i>Peta Digital Gampong Baru</h3>
                            <div class="map-controls">
                                <button class="btn btn-xs btn-light rounded-circle me-1" title="Zoom In"><i class="fas fa-search-plus fa-xs"></i></button>
                                <button class="btn btn-xs btn-light rounded-circle me-1" title="Zoom Out"><i class="fas fa-search-minus fa-xs"></i></button>
                                <button class="btn btn-xs btn-light rounded-circle" title="Lokasi Saya"><i class="fas fa-location-arrow fa-xs"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0 position-relative">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.847420172643!2d95.8239667!3d4.4394903999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303f03c8b35e433b%3A0x24befd98ece5b0fb!2sBalai%20Desa%20Gampong%20Baro!5e0!3m2!1sid!2sid!4v1744319204287!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="card-footer bg-light py-1 px-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted" style="font-size: 11px;"><i class="fas fa-info-circle me-1"></i> Geser dan zoom untuk menjelajahi peta</small>
                                <button class="btn btn-xs btn-outline-primary" style="font-size: 11px;">
                                    <i class="fas fa-expand me-1"></i> Layar Penuh
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-2 h-100 animate__animated animate__fadeInRight">
                        <div class="card-header bg-success text-white py-2">
                            <h3 class="h6 mb-0"><i class="fas fa-border-all me-1"></i>Batas Wilayah</h3>
                        </div>
                        <div class="card-body p-2">
                            <div class="batas-wilayah">
                              <div class="batas-item mb-3">
                                 <div class="d-flex align-items-start">
                                     <div class="batas-icon rounded-circle me-2 flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 30px; height: 30px; line-height: 30px;">
                                         <i class="fas fa-arrow-up text-primary fa-xs"></i>
                                     </div>
                                     <div>
                                         <h4 class="h6 mb-1">Utara</h4>
                                         <p class="mb-0 small">Gampong Lampeuneurut</p>
                                         <small class="text-muted" style="font-size: 11px;">± 2.5 km dari pusat gampong</small>
                                     </div>
                                 </div>
                             </div>
                             <div class="batas-item mb-3">
                                 <div class="d-flex align-items-start">
                                     <div class="batas-icon rounded-circle me-2 flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 30px; height: 30px; line-height: 30px;">
                                         <i class="fas fa-arrow-down text-danger fa-xs"></i>
                                     </div>
                                     <div>
                                         <h4 class="h6 mb-1">Selatan</h4>
                                         <p class="mb-0 small">Gampong Lambaro Angan</p>
                                         <small class="text-muted" style="font-size: 11px;">± 3 km dari pusat gampong</small>
                                     </div>
                                 </div>
                             </div>
                             <div class="batas-item mb-3">
                                 <div class="d-flex align-items-start">
                                     <div class="batas-icon rounded-circle me-2 flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 30px; height: 30px; line-height: 30px;">
                                         <i class="fas fa-arrow-right text-success fa-xs"></i>
                                     </div>
                                     <div>
                                         <h4 class="h6 mb-1">Timur</h4>
                                         <p class="mb-0 small">Krueng Aceh</p>
                                         <small class="text-muted" style="font-size: 11px;">± 1 km dari pusat gampong</small>
                                     </div>
                                 </div>
                             </div>
                             <div class="batas-item">
                                 <div class="d-flex align-items-start">
                                     <div class="batas-icon rounded-circle me-2 flex-shrink-0 d-flex justify-content-center align-items-center" style="width: 30px; height: 30px; line-height: 30px;">
                                         <i class="fas fa-arrow-left text-warning fa-xs"></i>
                                     </div>
                                     <div>
                                         <h4 class="h6 mb-1">Barat</h4>
                                         <p class="mb-0 small">Gampong Lamtamot</p>
                                         <small class="text-muted" style="font-size: 11px;">± 2 km dari pusat gampong</small>
                                     </div>
                                 </div>
                             </div>
                            </div>
                            <div class="wilayah-info mt-3 p-2 rounded-2 bg-light">
                                <h5 class="h6 mb-2"><i class="fas fa-chart-pie me-1"></i>Statistik Wilayah</h5>
                                <div class="row g-1">
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Luas Wilayah</small>
                                            <strong class="small">320 Ha</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Ketinggian</small>
                                            <strong class="small">45 mdpl</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Jumlah Penduduk</small>
                                            <strong class="small">1.245 Jiwa</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Kepadatan</small>
                                            <strong class="small">389/km²</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center py-2">
                            <button class="btn btn-xs btn-outline-success" style="font-size: 11px;">
                                <i class="fas fa-download me-1"></i> Unduh Peta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi - Compact Version -->
    <section id="struktur" class="struktur-organisasi py-4 bg-white position-relative">
      <div class="container position-relative">
          <div class="section-header text-center mb-4">
              <h2 class="h3 fw-bold section-title">Struktur Organisasi</h2>
              <div class="divider mx-auto"></div>
              <p class="small max-w-800 mx-auto">Tata kelola pemerintahan gampong yang profesional</p>
          </div>
          
          <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInUp">
              <div class="card-header bg-gradient-struktur py-2">
                  <h3 class="h6 mb-0 text-white text-center"><i class="fas fa-sitemap me-1"></i>Bagan Organisasi Pemerintahan Gampong Baru</h3>
              </div>
              <div class="card-body p-2">
                  <!-- Compact Organizational Chart -->
                  <div class="text-center mb-3">
                      <a href="https://images.unsplash.com/photo-1547981609-4b6bfe67ca0b" class="image-zoom" data-fancybox="struktur" data-caption="Struktur Organisasi Gampong Baru">
                          <img src="https://images.unsplash.com/photo-1547981609-4b6bfe67ca0b" alt="Struktur Organisasi" class="img-fluid rounded-2 shadow-sm border" style="max-height: 300px; cursor: zoom-in;">
                          <div class="zoom-indicator" style="font-size: 11px;">
                              <i class="fas fa-search-plus"></i> Klik untuk memperbesar
                          </div>
                      </a>
                  </div>
                  
                  <!-- Compact Leadership Team -->
                  <h4 class="text-center mb-3 fw-bold small">Pimpinan Gampong</h4>
                  <div class="row g-2">
                      <div class="col-md-4">
                          <div class="card border-0 shadow-sm h-100">
                              <div class="card-body text-center p-2">
                                  <div class="avatar mx-auto mb-2">
                                      <img src="https://randomuser.me/api/portraits/men/65.jpg" class="rounded-circle shadow" width="60" alt="Keuchik">
                                      <div class="badge-position bg-primary" style="width: 20px; height: 20px; font-size: 10px;">1</div>
                                  </div>
                                  <h4 class="h6 mb-1">Teuku Muhammad Rizal, S.Sos</h4>
                                  <p class="text-muted small mb-2">Keuchik Gampong Baru</p>
                                  <div class="social-links mt-2">
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fab fa-whatsapp"></i></a>
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fas fa-envelope"></i></a>
                                      <a href="#" class="text-primary" style="font-size: 12px;"><i class="fas fa-phone"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="card border-0 shadow-sm h-100">
                              <div class="card-body text-center p-2">
                                  <div class="avatar mx-auto mb-2">
                                      <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle shadow" width="60" alt="Sekretaris">
                                      <div class="badge-position bg-success" style="width: 20px; height: 20px; font-size: 10px;">2</div>
                                  </div>
                                  <h4 class="h6 mb-1">Cut Nurul Hikmah, S.E.</h4>
                                  <p class="text-muted small mb-2">Sekretaris Gampong</p>
                                  <div class="social-links mt-2">
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fab fa-whatsapp"></i></a>
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fas fa-envelope"></i></a>
                                      <a href="#" class="text-primary" style="font-size: 12px;"><i class="fas fa-phone"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="col-md-4">
                          <div class="card border-0 shadow-sm h-100">
                              <div class="card-body text-center p-2">
                                  <div class="avatar mx-auto mb-2">
                                      <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle shadow" width="60" alt="Bendahara">
                                      <div class="badge-position bg-warning" style="width: 20px; height: 20px; font-size: 10px;">3</div>
                                  </div>
                                  <h4 class="h6 mb-1">Budi Santoso, S.E.</h4>
                                  <p class="text-muted small mb-2">Bendahara Gampong</p>
                                  <div class="social-links mt-2">
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fab fa-whatsapp"></i></a>
                                      <a href="#" class="text-primary me-1" style="font-size: 12px;"><i class="fas fa-envelope"></i></a>
                                      <a href="#" class="text-primary" style="font-size: 12px;"><i class="fas fa-phone"></i></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Compact Department Heads -->
                  <h4 class="text-center mt-3 mb-2 fw-bold small">Kepala Urusan</h4>
                  <div class="row g-1">
                      <div class="col-md-3 col-6">
                          <div class="card border-0 shadow-sm">
                              <div class="card-body text-center p-1">
                                  <div class="avatar mx-auto mb-1">
                                      <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle shadow" width="50" alt="Kaur Pemerintahan">
                                  </div>
                                  <h5 class="h6 mb-1">Teuku Faisal</h5>
                                  <p class="text-muted small mb-0">Kaur Pemerintahan</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-6">
                          <div class="card border-0 shadow-sm">
                              <div class="card-body text-center p-1">
                                  <div class="avatar mx-auto mb-1">
                                      <img src="https://randomuser.me/api/portraits/women/45.jpg" class="rounded-circle shadow" width="50" alt="Kaur Pembangunan">
                                  </div>
                                  <h5 class="h6 mb-1">Cut Sarah</h5>
                                  <p class="text-muted small mb-0">Kaur Pembangunan</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-6">
                          <div class="card border-0 shadow-sm">
                              <div class="card-body text-center p-1">
                                  <div class="avatar mx-auto mb-1">
                                      <img src="https://randomuser.me/api/portraits/men/55.jpg" class="rounded-circle shadow" width="50" alt="Kaur Keuangan">
                                  </div>
                                  <h5 class="h6 mb-1">Muhammad Iqbal</h5>
                                  <p class="text-muted small mb-0">Kaur Keuangan</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-3 col-6">
                          <div class="card border-0 shadow-sm">
                              <div class="card-body text-center p-1">
                                  <div class="avatar mx-auto mb-1">
                                      <img src="https://randomuser.me/api/portraits/women/55.jpg" class="rounded-circle shadow" width="50" alt="Kaur Umum">
                                  </div>
                                  <h5 class="h6 mb-1">Nurul Aini</h5>
                                  <p class="text-muted small mb-0">Kaur Umum</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
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
        padding: 100px 0;
        display: flex;
        align-items: center;
        min-height: 80vh;
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
    
    .py-5 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
    
    .mb-5 {
        margin-bottom: 3rem;
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
        padding-left: 50px;
    }
    
    .premium-timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #4e54c8, #8f94fb);
        border-radius: 3px;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .timeline-year {
        position: absolute;
        left: -50px;
        top: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        box-shadow: 0 0 0 4px white, 0 3px 10px rgba(0,0,0,0.1);
        font-size: 0.7rem;
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
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        border-left: 3px solid #4e54c8;
        transition: all 0.3s ease;
    }
    
    .timeline-content:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .timeline-content h3 {
        color: #4e54c8;
        margin-top: 0;
        font-size: 0.8rem;
    }
    
    /* Mission list */
    .mission-list .mission-icon {
        width: 30px;
        height: 30px;
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
        transform: scale(1.02);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
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
        bottom: 15px;
        left: 15px;
        color: white;
        font-size: 0.8rem;
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
        top: -8px;
        right: -8px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 0.7rem;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    /* Hover effects */
    .hover-effect {
        transition: all 0.3s ease;
    }
    
    .hover-effect:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .hover-3d {
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    
    .hover-3d:hover {
        transform: translateY(-3px) perspective(1000px) rotateX(5deg) rotateY(0deg) scale(1.01);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }
    
    /* Social links */
    .social-links a {
        transition: all 0.3s ease;
    }
    
    .social-links a:hover {
        transform: scale(1.1);
    }
    
    /* Floating Navigation with Glass Morphism */
    .floating-nav-container {
        position: relative;
        margin-top: -25px;
        z-index: 100;
    }
    
    .glass-morphism {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .floating-nav {
        background: white;
        padding: 10px 20px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
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
        width: 250px;
        height: 250px;
        top: -40px;
        left: -40px;
        animation-delay: 0s;
    }
    
    .element-2 {
        width: 150px;
        height: 150px;
        bottom: -20px;
        right: -20px;
        animation-delay: 5s;
    }
    
    .element-3 {
        width: 120px;
        height: 120px;
        top: 40%;
        right: -20px;
        animation-delay: 8s;
    }
    
    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(180deg); }
        100% { transform: translateY(0) rotate(360deg); }
    }
    
    /* Image zoom */
    .image-zoom {
        position: relative;
        display: inline-block;
    }
    
    .zoom-indicator {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 3px 10px;
        border-radius: 15px;
        font-size: 0.7rem;
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
        padding: 15px 0;
    }
    
    .org-chart {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 700px;
        position: relative;
    }
    
    .org-level {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        width: 100%;
    }
    
    .org-connector {
        width: 2px;
        height: 20px;
        background: linear-gradient(to bottom, #4e54c8, #8f94fb);
        margin-bottom: 20px;
    }
    
    .org-item {
        background: white;
        border-radius: 8px;
        padding: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        margin: 0 10px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 180px;
    }
    
    .org-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .org-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 8px;
        border: 2px solid #4e54c8;
    }
    
    .org-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .org-details h4 {
        margin: 0;
        font-size: 0.8rem;
        color: #333;
    }
    
    .org-details p {
        margin: 3px 0 0;
        font-size: 0.7rem;
        color: #666;
    }
    
    .ceo {
        border-top: 3px solid var(--primary);
    }
    
    .c-level {
        border-top: 3px solid var(--success);
    }
    
    .manager {
        border-top: 3px solid var(--warning);
    }
    
    /* Leader card */
    .leader-card {
        position: relative;
    }
    
    .leader-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        padding: 2px 8px;
        border-radius: 15px;
        font-size: 0.6rem;
        font-weight: bold;
        color: white;
    }
    
    /* Back to top button */
    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
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
        padding: 8px;
        border-radius: 4px;
        font-size: 0.7rem;
        opacity: 0;
        transform: translateY(8px);
        transition: all 0.3s ease;
    }
    
    .map-tooltip:hover .tooltip-content {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive adjustments */
    @media (max-width: 1200px) {
        .org-chart {
            min-width: 600px;
        }
    }
    
    @media (max-width: 992px) {
        .profil-header {
            padding: 80px 0;
            min-height: auto;
        }
        
        .display-4 {
            font-size: 1.8rem;
        }
        
        .floating-nav {
            padding: 8px 12px;
        }
        
        .org-chart {
            min-width: 500px;
        }
    }
    
    @media (max-width: 768px) {
        .profil-header {
            padding: 60px 0;
            background-attachment: scroll;
        }
        
        .display-4 {
            font-size: 1.5rem;
        }
        
        .floating-nav {
            border-radius: 8px !important;
            padding: 8px;
        }
        
        .py-5 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .org-chart {
            min-width: 400px;
        }
        
        .org-item {
            min-width: 130px;
            padding: 8px;
            margin: 0 5px;
        }
    }
    
    @media (max-width: 576px) {
        .profil-header {
            padding: 50px 0;
        }
        
        .display-4 {
            font-size: 1.3rem;
        }
        
        
        .org-chart {
            min-width: 300px;
        }
        
        .org-item {
            min-width: 100px;
            margin: 0 3px;
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
                'scrollTop': $target.offset().top - 70
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
                    "value": 60,
                    "density": {
                        "enable": true,
                        "value_area": 700
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
                    "value": 0.4,
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
                    "distance": 130,
                    "color": "#ffffff",
                    "opacity": 0.3,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1.5,
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
                        "distance": 120,
                        "line_linked": {
                            "opacity": 0.8
                        }
                    },
                    "bubble": {
                        "distance": 300,
                        "size": 30,
                        "duration": 2,
                        "opacity": 6,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 150,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 3
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
                var sectionTop = $(this).offset().top - 80;
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
                'transform': 'translateY(8px)'
            });
        });
    });
</script>
@endsection