@extends('components.main')

@section('content')
<div class="profil-desa">
    <!-- Compact Parallax Header -->
    <header class="profil-header text-center py-0 mb-4" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; background-attachment: fixed;">
        <div id="particles-js"></div>
        @php
                            $setting = App\Models\Setting::first(); // Ambil data dari database
                            @endphp
        <div class="container position-relative">
            <div class="header-content animate__animated animate__fadeInDown">
            <h1 class="h3 display-6 text-white fw-bold mb-2 text-shadow" data-text="{{ $setting->nama_desa ?? '-' }}">
            {{ $setting->nama_desa ?? '-' }}
        </h1>
        <p class="fs-5 text-light animate__animated animate__fadeInUp text-uppercase letter-spacing-2 tracking-in-expand">
            {{ $setting->alamat ?? '-' }}
        </p>


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
            <div class="section">
                  <h2 class="section-title mt-0"><span>Sejarah </span></h2>
                <p class="fs-6 mb-0">Mengenal lebih dalam akar budaya dan perjalanan panjang desa kami</p>
            </div>
            
            <div class="row align-items-center g-3">
                @php
use App\Models\History;

// Get the first history record or create a dummy one if none exists
$history = History::first() ?? new History([
    'title' => 'Asal Usul Gampong Baru',
    'description' => 'Gampong Baru berdiri pada tahun 1923 sebagai pemukiman baru bagi masyarakat yang bermigrasi dari daerah pesisir Aceh Besar. Nama "Baru" dipilih sebagai simbol harapan baru bagi kehidupan yang lebih baik. Desa kami berkembang sebagai pusat pertanian dan kerajinan tradisional Aceh. Kehidupan masyarakat awalnya berpusat di sekitar Meunasah yang berfungsi sebagai tempat ibadah dan pusat kegiatan sosial.',
    'image' => null,
    'title_image' => 'Balai Gampong Baru Tahun 1950'
]);

// Prepare short description (first 50 words)
$shortDescription = str($history->description)->words(50, '...');
$shouldShowReadMore = str($history->description)->wordCount() > 50;
@endphp

<div class="col-lg-6 mb-3 mb-lg-0">
    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInLeft h-100">
        <div class="card-img-top position-relative">
            <img src="{{ $history->image ? asset('storage/sejarah/'.$history->image) : asset('storage/sejarah/default-history.png') }}" class="img-fluid w-100" alt="{{ $history->title }}">
            <div class="img-overlay"></div>
            <div class="img-caption" style="font-size: 12px;">
                <i class="fas fa-landmark me-1"></i> {{ $history->title_image }}
            </div>
        </div>
        <div class="card-body p-3">
            <h3 class="h6 card-title mb-3 text-center">{{ $history->title }}</h3>
            <p class="card-text small short-description">{{ $shortDescription }}</p>
            @if($shouldShowReadMore)
                <p class="card-text small full-description d-none">{{ $history->description }}</p>
            @endif
        </div>
        @if($shouldShowReadMore)
        <div class="card-footer bg-transparent border-0 text-center py-2">
            <button class="btn btn-outline-primary btn-sm rounded-pill px-3 read-more-btn" style="font-size: 12px;">
                <i class="fas fa-book-open me-1"></i> Baca Selengkapnya
            </button>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreBtn = document.querySelector('.read-more-btn');
        if (readMoreBtn) {
            readMoreBtn.addEventListener('click', function() {
                const cardBody = this.closest('.card').querySelector('.card-body');
                const shortDesc = cardBody.querySelector('.short-description');
                const fullDesc = cardBody.querySelector('.full-description');
                
                if (shortDesc.classList.contains('d-none')) {
                    shortDesc.classList.remove('d-none');
                    fullDesc.classList.add('d-none');
                    this.innerHTML = '<i class="fas fa-book-open me-1"></i> Baca Selengkapnya';
                } else {
                    shortDesc.classList.add('d-none');
                    fullDesc.classList.remove('d-none');
                    this.innerHTML = '<i class="fas fa-book-open me-1"></i> Sembunyikan';
                }
            });
        }
    });
</script>
@endpush
                
                <div class="col-lg-6">
    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInRight h-100">
        <div class="card-body p-3">
            <div class="premium-timeline">
               @php
                    $histories = \App\Models\DetailHistory::distinct()
                                    ->orderBy('year', 'asc')
                                    ->get();
                @endphp
                @forelse($histories as $history)
                    <div class="timeline-item">
                        <div class="timeline-year {{ $history->bg_year }} pulse-animation" style="width: 40px; height: 40px; font-size: 12px;">
                            {{ $history->year }}
                        </div>
                        <div class="timeline-content p-2">
                            <h3 class="h6">{{ $history->title }}</h3>
                            <p class="small mb-0">{{ $history->description_singkat }}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">
                       <i class="fas fa-exclamation-circle me-2"></i> Data Sejarah (Rincian) belum tersedia.
                    </div>
                @endforelse
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
            <div class="section">
                 <h2 class="section-title"><span>Visi & Misi </span></h2>
                <p class="fs-6 mb-0">Arah kebijakan dalam membangun desa berfokus pada peningkatan kesejahteraan, penguatan partisipasi masyarakat, dan pembangunan yang berkelanjutan</p>
            </div>
            
            <div class="row g-3">
         <!-- Visi Section -->
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
                                <div class="vision-text" id="vision-text">
                                    @if($vision = App\Models\Vision::first())
                                        <p class="mb-0 fst-italic fw-bold text-center text-dark small">"{{ $vision->visi }}"</p>
                                    @else
                                        <p class="mb-0 fst-italic fw-bold text-center text-dark small">"Mewujudkan Gampong Baru yang Madani, Berdaya Saing, dan Berkelanjutan melalui Penguatan Nilai-nilai Islami, Pemberdayaan Masyakarat berbasis Kearifan Lokal Aceh, serta Inovasi Teknologi Digital."</p>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3 text-center" id="vision-title-container">
                                @php($vision = App\Models\Vision::first())
                                @if($vision)
                                    <div class="vision-title d-inline-block px-2 py-1 rounded-pill bg-white-10 text-white small">
                                        <i class="fas fa-quote-left me-1"></i> {{ $vision->title }}
                                    </div>
                                @else
                                    <div class="vision-title d-inline-block px-2 py-1 rounded-pill bg-white-10 text-white small">
                                        <i class="fas fa-quote-left me-1"></i> Visi 2023
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center py-2">
                            <button class="btn btn-outline-light btn-sm rounded-pill px-3 btn-download-visi" style="font-size: 12px;" id="downloadVisionBtn">
                                <i class="fas fa-download me-1"></i> Unduh Visi
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Gunakan versi terbaru html2pdf -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script>
                document.getElementById('downloadVisionBtn').addEventListener('click', function() {
                    // Buat elemen container khusus untuk PDF
                    const pdfContainer = document.createElement('div');
                    pdfContainer.style.padding = '20px';
                    
                    // Tambahkan header
                    const header = document.createElement('h3');
                    header.textContent = 'VISI GAMPONG';
                    header.style.textAlign = 'center';
                    header.style.marginBottom = '20px';
                    header.style.color = '#2c3e50';
                    pdfContainer.appendChild(header);
                    
                    // Clone konten visi
                    const visionText = document.getElementById('vision-text').cloneNode(true);
                    visionText.style.marginBottom = '30px';
                    pdfContainer.appendChild(visionText);
                    
                    // Clone title visi dan ubah styling untuk PDF
                    const visionTitle = document.querySelector('#vision-title-container .vision-title').cloneNode(true);
                    visionTitle.style.background = '#f8f9fa';
                    visionTitle.style.color = '#2c3e50 !important';
                    visionTitle.style.marginTop = '20px';
                    pdfContainer.appendChild(visionTitle);
                    
                    // Opsi untuk PDF
                    const opt = {
                        margin: 10,
                        filename: 'Visi_Gampong.pdf',
                    
                        html2canvas: { 
                            scale: 2,
                            logging: true,
                            useCORS: true,
                            allowTaint: true,
                            scrollX: 0,
                            scrollY: 0
                        },
                        jsPDF: { 
                            unit: 'mm', 
                            format: 'a4', 
                            orientation: 'portrait',
                            compress: true
                        }
                    };
                    
                    // Tampilkan loading
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Membuat PDF...';
                    this.disabled = true;
                    
                    // Generate PDF
                    html2pdf()
                        .set(opt)
                        .from(pdfContainer)
                        .toPdf()
                        .get('pdf')
                        .then(function(pdf) {
                            // Tambahkan footer
                            const totalPages = pdf.internal.getNumberOfPages();
                            for (let i = 1; i <= totalPages; i++) {
                                pdf.setPage(i);
                                pdf.setFontSize(10);
                                pdf.setTextColor(150);
                                pdf.text(
                                    'Dokumen resmi Gampong - Halaman ' + i + ' dari ' + totalPages,
                                    pdf.internal.pageSize.getWidth() / 2,
                                    pdf.internal.pageSize.getHeight() - 10,
                                    { align: 'center' }
                                );
                            }
                        })
                        .save()
                        .finally(function() {
                            // Kembalikan tombol ke state semula
                            document.getElementById('downloadVisionBtn').innerHTML = originalText;
                            document.getElementById('downloadVisionBtn').disabled = false;
                        });
                });
                </script>

                <!-- Misi Section -->
<div class="col-lg-6">
    <div class="card h-100 border-0 shadow-sm rounded-2 bg-gradient-misi animate__animated animate__fadeInUp">
        <div class="card-body p-3">
            <div class="d-flex align-items-center mb-3">
                <div class="icon-box text-success rounded-circle me-3 shadow" style="background: white; width: 30px; height: 30px; line-height: 30px;">
                    <i class="fas fa-tasks fa-xs"></i>
                </div>
                <h2 class="h6 mb-0 text-white">Misi Gampong</h2>
            </div>
            <ul class="mission-list list-unstyled" id="mission-list">
                @php($missions = App\Models\Mission::orderBy('index', 'asc')->get())
                @if($missions->count() > 0)
                    @foreach($missions as $mission)
                        <li class="mb-2">
                            <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="mission-icon {{ $mission->bg_index }} rounded-circle me-2 text-white" style="width: 25px; height: 25px; line-height: 25px; ">
                                        {{ $mission->index }}
                                    </div>
                                    <span class="small">{{ $mission->misi }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <!-- Default missions if no data exists -->
                    <li class="mb-2">
                        <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="mission-icon bg-primary text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                    1
                                </div>
                                <span class="small">Meningkatkan kualitas sumber daya manusia yang berakhlak mulia dan berdaya saing</span>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="mission-icon bg-success text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                    2
                                </div>
                                <span class="small">Mengembangkan ekonomi kreatif berbasis potensi lokal dengan pendekatan syariah</span>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="mission-item bg-white p-2 rounded-2 shadow-sm">
                            <div class="d-flex align-items-center">
                                <div class="mission-icon bg-danger text-white rounded-circle me-2" style="width: 25px; height: 25px; line-height: 25px;">
                                    3
                                </div>
                                <span class="small">Memperkuat tata kelola pemerintahan yang transparan dan akuntabel</span>
                            </div>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <div class="card-footer bg-transparent border-0 text-center py-2">
            <button class="btn btn-outline-light btn-sm rounded-pill px-3 btn-download-misi" style="font-size: 12px;" id="downloadMissionBtn">
                <i class="fas fa-download me-1"></i> Unduh Misi
            </button>
        </div>
    </div>
</div>

<script>
document.getElementById('downloadMissionBtn').addEventListener('click', function() {
    // Buat elemen container khusus untuk PDF
    const pdfContainer = document.createElement('div');
    pdfContainer.style.padding = '20px';
    
    // Tambahkan header
    const header = document.createElement('h3');
    header.textContent = 'MISI GAMPONG';
    header.style.textAlign = 'center';
    header.style.marginBottom = '20px';
    header.style.color = '#2c3e50';
    pdfContainer.appendChild(header);
    
    // Clone konten misi
    const missionList = document.getElementById('mission-list').cloneNode(true);
    missionList.style.marginBottom = '30px';
    pdfContainer.appendChild(missionList);
    
    // Opsi untuk PDF
    const opt = {
        margin: 10,
        filename: 'Misi_Gampong.pdf',
    
        html2canvas: { 
            scale: 2,
            logging: true,
            useCORS: true,
            allowTaint: true,
            scrollX: 0,
            scrollY: 0
        },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'portrait',
            compress: true
        }
    };
    
    // Tampilkan loading
    const originalText = this.innerHTML;
    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Membuat PDF...';
    this.disabled = true;
    
    // Generate PDF
    html2pdf()
        .set(opt)
        .from(pdfContainer)
        .toPdf()
        .get('pdf')
        .then(function(pdf) {
            // Tambahkan footer
            const totalPages = pdf.internal.getNumberOfPages();
            for (let i = 1; i <= totalPages; i++) {
                pdf.setPage(i);
                pdf.setFontSize(10);
                pdf.setTextColor(150);
                pdf.text(
                    'Dokumen resmi Gampong - Halaman ' + i + ' dari ' + totalPages,
                    pdf.internal.pageSize.getWidth() / 2,
                    pdf.internal.pageSize.getHeight() - 10,
                    { align: 'center' }
                );
            }
        })
        .save()
        .finally(function() {
            // Kembalikan tombol ke state semula
            document.getElementById('downloadMissionBtn').innerHTML = originalText;
            document.getElementById('downloadMissionBtn').disabled = false;
        });
});
</script>
            </div>
        </div>
    </section>

    <!-- Peta Lokasi - Compact Version -->
    <section id="peta" class="peta-lokasi py-4 bg-light position-relative">
        <div class="container position-relative">
            <?php $wilayah = App\Models\Wilayah::first(); ?>
            
            <div class="section">
                <h2 class="section-title"><span>Peta Wilayah </span></h2>
                <p class="fs-6 mb-0">Peta administratif memudahkan identifikasi batas antar kecamatan dan lokasi fasilitas umum.</p>
            </div>
            
            <div class="row g-2">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInLeft h-100">
                        <div class="card-header bg-primary text-white py-2 d-flex justify-content-between align-items-center">
                            <h3 class="h6 mb-0"><i class="fas fa-map-marked-alt me-1"></i>Peta Digital Gampong Baru</h3>
                            <div class="map-controls">
                                <button id="refreshMapBtn" class="btn btn-xs btn-outline-light" style="font-size: 11px;">
                                    <i class="fas fa-sync-alt me-1"></i> Refresh
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 position-relative">
                            <div class="ratio ratio-16x9">
                                <iframe id="mapFrame" src="<?= $wilayah->peta_wilayah ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.847420172643!2d95.8239667!3d4.4394903999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303f03c8b35e433b%3A0x24befd98ece5b0fb!2sBalai%20Desa%20Gampong%20Baro!5e0!3m2!1sid!2sid!4v1744319204287!5m2!1sid!2sid' ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- Preview container -->
                            <div id="mapPreviewContainer" class="position-absolute top-0 start-0 w-100 h-100 d-none" style="pointer-events: none; z-index: 10;">
                                <img id="mapPreview" class="w-100 h-100" style="object-fit: contain; background: white;">
                            </div>
                        </div>
                        <div class="card-footer bg-light py-1 px-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted" style="font-size: 11px;"><i class="fas fa-info-circle me-1"></i> Geser dan zoom untuk menjelajahi peta</small>
                                <button id="fullscreenBtn" class="btn btn-xs btn-outline-primary" style="font-size: 11px;">
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
                                        <p class="mb-0 small"><?= $wilayah->batas_utara ?? '-' ?></p>
                                        <small class="text-muted" style="font-size: 11px;">± <?= $wilayah->jarak_utara ?? '-' ?> km dari pusat gampong</small>
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
                                        <p class="mb-0 small"><?= $wilayah->batas_selatan ?? '-' ?></p>
                                        <small class="text-muted" style="font-size: 11px;">± <?= $wilayah->jarak_selatan ?? '-' ?> km dari pusat gampong</small>
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
                                        <p class="mb-0 small"><?= $wilayah->batas_timur ?? '-' ?></p>
                                        <small class="text-muted" style="font-size: 11px;">± <?= $wilayah->jarak_timur ?? '-' ?> km dari pusat gampong</small>
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
                                        <p class="mb-0 small"><?= $wilayah->batas_barat ?? '-' ?></p>
                                        <small class="text-muted" style="font-size: 11px;">± <?= $wilayah->jarak_barat ?? '-' ?> km dari pusat gampong</small>
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
                                            <strong class="small"><?= $wilayah->luas_wilayah_ha ?? '-' ?> Ha</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Ketinggian</small>
                                            <strong class="small"><?= $wilayah->ketinggian_mdl ?? '-' ?> mdpl</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Jumlah Penduduk</small>
                                            <strong class="small"><?= $wilayah->jumlah_penduduk ?? '-' ?> Jiwa</strong>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-1 bg-white rounded-1 shadow-sm text-center">
                                            <small class="text-muted d-block" style="font-size: 11px;">Kepadatan</small>
                                            <strong class="small"><?= $wilayah->kepadatan_penduduk ?? '-' ?>/km²</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light text-center py-2">
                            {{-- <button id="downloadMapBtn2" class="btn btn-xs btn-outline-success" style="font-size: 11px;">
                                <i class="fas fa-download me-1"></i> Unduh Peta
                            </button>
                            <button id="previewMapBtn" class="btn btn-xs btn-outline-info ms-2" style="font-size: 11px;">
                                <i class="fas fa-eye me-1"></i> Preview
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal untuk layar penuh -->
    <div class="modal fade" id="fullscreenMapModal" tabindex="-1" aria-hidden="true" style="z-index: 10000">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" style="color: white"><i class="fas fa-map-marked-alt me-1"></i>Peta (Mode Layar Penuh)</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe id="fullscreenMapFrame" style="width:100%; height:100%; min-height:80vh;" frameborder="0" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="modal-footer bg-light py-1">
                    <small class="text-muted me-auto"><i class="fas fa-info-circle me-1"></i> Gunakan tombol di pojok kanan atas untuk kontrol peta</small>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk konfirmasi unduh -->
    <div class="modal fade" id="downloadConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-download me-1"></i> Unduh Peta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="downloadType" class="form-label">Pilih Format:</label>
                        <select id="downloadType" class="form-select">
                            <option value="jpg">JPEG Image</option>
                            <option value="png">PNG Image</option>
                            <option value="pdf">PDF Document</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="downloadQuality" class="form-label">Kualitas:</label>
                        <input type="range" class="form-range" id="downloadQuality" min="0.1" max="1" step="0.1" value="0.9">
                        <small class="text-muted" id="qualityValue">90%</small>
                    </div>
                    <div id="previewSection" class="mt-3 text-center">
                        <img id="downloadPreview" class="img-fluid border rounded" style="max-height: 150px;">
                        <small class="text-muted d-block mt-1">Pratinjau peta</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmDownloadBtn">Unduh</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const mapFrame = document.getElementById('mapFrame');
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        const refreshMapBtn = document.getElementById('refreshMapBtn');
        const previewMapBtn = document.getElementById('previewMapBtn');
        const mapPreviewContainer = document.getElementById('mapPreviewContainer');
        const mapPreview = document.getElementById('mapPreview');
        
        const downloadMapBtn2 = document.getElementById('downloadMapBtn2');
        const fullscreenMapModal = new bootstrap.Modal(document.getElementById('fullscreenMapModal'));
        const fullscreenMapFrame = document.getElementById('fullscreenMapFrame');
        const downloadConfirmModal = new bootstrap.Modal(document.getElementById('downloadConfirmModal'));
        const downloadQuality = document.getElementById('downloadQuality');
        const qualityValue = document.getElementById('qualityValue');
        const confirmDownloadBtn = document.getElementById('confirmDownloadBtn');
        const downloadPreview = document.getElementById('downloadPreview');
        
        // Set src untuk iframe layar penuh
        fullscreenMapFrame.src = mapFrame.src;
        
        // Update tampilan kualitas
        downloadQuality.addEventListener('input', function() {
            qualityValue.textContent = Math.round(this.value * 100) + '%';
        });
        
        // Fungsi layar penuh
        fullscreenBtn.addEventListener('click', function() {
            fullscreenMapModal.show();
        });
        
        // Fungsi refresh peta
        refreshMapBtn.addEventListener('click', function() {
            mapFrame.src = mapFrame.src.split('?')[0] + '?refresh=' + new Date().getTime();
            fullscreenMapFrame.src = mapFrame.src; // Update juga iframe layar penuh
        });
        
        // Fungsi untuk menampilkan preview peta
        previewMapBtn.addEventListener('click', function() {
            captureMapPreview();
        });
        
        // Fungsi untuk menangkap preview peta
        function captureMapPreview() {
            const mapContainer = document.querySelector('.peta-lokasi .card');
            
            // Tampilkan loading
            const btnText = previewMapBtn.innerHTML;
            previewMapBtn.disabled = true;
            previewMapBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Memproses...';
            
            // Tambahkan class khusus untuk screenshot
            mapContainer.classList.add('capturing-screenshot');
            
            // Opsi untuk html2canvas
            const options = {
                scale: 1,
                logging: false,
                useCORS: true,
                allowTaint: true,
                backgroundColor: null,
                scrollX: 0,
                scrollY: 0,
                windowWidth: mapContainer.scrollWidth,
                windowHeight: mapContainer.scrollHeight,
                onclone: function(clonedDoc) {
                    // Pastikan iframe terlihat saat di-clone
                    const clonedIframe = clonedDoc.getElementById('mapFrame');
                    if (clonedIframe) {
                        clonedIframe.style.visibility = 'visible';
                        clonedIframe.style.opacity = '1';
                    }
                }
            };
            
            // Capture preview
            html2canvas(mapContainer, options).then(canvas => {
                // Set preview image
                mapPreview.src = canvas.toDataURL('image/png');
                mapPreviewContainer.classList.remove('d-none');
                
                // Sembunyikan preview setelah 5 detik
                setTimeout(() => {
                    mapPreviewContainer.classList.add('d-none');
                }, 5000);
                
                // Kembalikan tombol ke keadaan semula
                previewMapBtn.disabled = false;
                previewMapBtn.innerHTML = '<i class="fas fa-eye me-1"></i> Preview';
                
                // Hapus class capturing
                mapContainer.classList.remove('capturing-screenshot');
            }).catch(err => {
                console.error('Gagal mengambil preview:', err);
                alert('Gagal mengambil preview peta');
                previewMapBtn.disabled = false;
                previewMapBtn.innerHTML = btnText;
                mapContainer.classList.remove('capturing-screenshot');
            });
        }
        
        // Fungsi untuk menangkap screenshot peta
        function captureMapScreenshot(format, quality) {
            const mapContainer = document.querySelector('.peta-lokasi .card');
            
            // Tampilkan loading
            const btnText = confirmDownloadBtn.innerHTML;
            confirmDownloadBtn.disabled = true;
            confirmDownloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Memproses...';
            
            // Tambahkan class khusus untuk screenshot
            mapContainer.classList.add('capturing-screenshot');
            
            // Opsi untuk html2canvas
            const options = {
                scale: 2, // Resolusi lebih tinggi
                logging: false,
                useCORS: true,
                allowTaint: true,
                backgroundColor: null,
                scrollX: 0,
                scrollY: 0,
                windowWidth: mapContainer.scrollWidth,
                windowHeight: mapContainer.scrollHeight,
                onclone: function(clonedDoc) {
                    // Pastikan iframe terlihat saat di-clone
                    const clonedIframe = clonedDoc.getElementById('mapFrame');
                    if (clonedIframe) {
                        clonedIframe.style.visibility = 'visible';
                        clonedIframe.style.opacity = '1';
                    }
                }
            };
            
            // Capture screenshot
            html2canvas(mapContainer, options).then(canvas => {
                // Konversi ke format yang diminta
                let mimeType, fileName, dataUrl;
                
                if (format === 'pdf') {
                    // Gunakan jsPDF untuk ekspor PDF
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF({
                        orientation: 'landscape',
                        unit: 'mm'
                    });
                    
                    // Hitung dimensi PDF berdasarkan canvas
                    const imgData = canvas.toDataURL('image/jpeg', 0.9);
                    const pdfWidth = pdf.internal.pageSize.getWidth();
                    const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                    
                    pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);
                    pdf.save('peta-gampong-baru.pdf');
                } else {
                    if (format === 'png') {
                        mimeType = 'image/png';
                        fileName = 'peta-gampong-baru.png';
                        dataUrl = canvas.toDataURL(mimeType);
                    } else {
                        mimeType = 'image/jpeg';
                        fileName = 'peta-gampong-baru.jpg';
                        dataUrl = canvas.toDataURL(mimeType, quality);
                    }
                    
                    // Buat link download
                    const link = document.createElement('a');
                    link.download = fileName;
                    link.href = dataUrl;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }
                
                // Kembalikan tombol ke keadaan semula
                confirmDownloadBtn.disabled = false;
                confirmDownloadBtn.innerHTML = btnText;
                mapContainer.classList.remove('capturing-screenshot');
            }).catch(err => {
                console.error('Gagal mengambil screenshot:', err);
                alert('Gagal mengambil screenshot: ' + err.message);
                confirmDownloadBtn.disabled = false;
                confirmDownloadBtn.innerHTML = btnText;
                mapContainer.classList.remove('capturing-screenshot');
            });
        }
        
        // Fungsi untuk menampilkan modal konfirmasi unduh
        function showDownloadDialog() {
            // Ambil preview terlebih dahulu
            const mapContainer = document.querySelector('.peta-lokasi .card');
            
            // Tambahkan class khusus untuk screenshot
            mapContainer.classList.add('capturing-screenshot');
            
            html2canvas(mapContainer, {
                scale: 0.5,
                logging: false,
                useCORS: true,
                allowTaint: true,
                backgroundColor: null,
                onclone: function(clonedDoc) {
                    // Pastikan iframe terlihat saat di-clone
                    const clonedIframe = clonedDoc.getElementById('mapFrame');
                    if (clonedIframe) {
                        clonedIframe.style.visibility = 'visible';
                        clonedIframe.style.opacity = '1';
                    }
                }
            }).then(canvas => {
                downloadPreview.src = canvas.toDataURL('image/jpeg', 0.7);
                downloadConfirmModal.show();
                mapContainer.classList.remove('capturing-screenshot');
            }).catch(err => {
                console.error('Gagal mengambil preview:', err);
                downloadConfirmModal.show();
                mapContainer.classList.remove('capturing-screenshot');
            });
        }
        
        // Event listener untuk tombol unduh
        downloadMapBtn2.addEventListener('click', showDownloadDialog);
        
        // Event listener untuk tombol konfirmasi unduh
        confirmDownloadBtn.addEventListener('click', function() {
            const format = document.getElementById('downloadType').value;
            const quality = parseFloat(downloadQuality.value);
            
            downloadConfirmModal.hide();
            captureMapScreenshot(format, quality);
        });
        
        // CSS untuk memastikan iframe terlihat saat screenshot
        const style = document.createElement('style');
        style.textContent = `
            .capturing-screenshot iframe {
                visibility: visible !important;
                opacity: 1 !important;
                z-index: 9999 !important;
            }
        `;
        document.head.appendChild(style);
    });
    </script>

    <!-- Struktur Organisasi - Compact Version -->
    <section id="struktur" class="struktur-organisasi py-4 bg-white position-relative">
      <div class="container position-relative">
          <div class="section ">
            <h2 class="section-title mt-0"><span>Struktur Organisasi</span></h2>
                <p class="fs-6 mb-0">Struktur organisasi menggambarkan pembagian tugas, wewenang, dan hubungan kerja antar bagian dalam suatu organisasi.</p>
       
          
          </div>
          
          <div class="card border-0 shadow-sm rounded-2 overflow-hidden animate__animated animate__fadeInUp">
              <div class="card-header bg-gradient-struktur py-2">
                  <h3 class="h6 mb-0 text-white text-center"><i class="fas fa-sitemap me-1"></i>Bagan Organisasi Pemerintahan</h3>
              </div>
              <div class="card-body p-2">
                  <div class="text-center mb-3">
   
    
    @if($setting && $setting->bagan)  {{-- Pastikan setting dan field 'bagan' ada --}}
        <a href="{{ asset('storage/bagan/' . $setting->bagan) }}" class="image-zoom" data-fancybox="struktur" data-caption="Struktur Organisasi">
            <img src="{{ asset('storage/bagan/' . $setting->bagan) }}" alt="Struktur Organisasi" class="img-fluid rounded-2 shadow-sm border" style="max-height: 350px; cursor: zoom-in;">
            <div class="zoom-indicator" style="font-size: 11px;">
                <i class="fas fa-search-plus"></i> Klik untuk memperbesar
            </div>
        </a>
    @else
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-circle me-2"></i> Gambar struktur organisasi belum tersedia
        </div>
    @endif
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