@extends('components.main')

@section('content')

    @php
        $dusunData = App\Models\Penduduk::getDataDusun();
        $piramidaData = App\Models\Penduduk::getDataPiramidaPenduduk();
        $pendidikanData = App\Models\Penduduk::getDataPendidikan();
        $pekerjaanData = App\Models\Penduduk::getDataPekerjaan();
        $agamaData = App\Models\Penduduk::getDataAgama();
        $statistik = App\Models\Penduduk::getStatistikKependudukan();
    @endphp
<div class="demografi-container">
    <div class="demografi-header">
        <h2 class="section-title text-center">
            {{-- <span class="title-decorator"></span> --}}
            <span class="title-text">Demografi Penduduk</span>
            {{-- <span class="title-decorator"></span> --}}
        </h2>
        <p class="section-description text-center fs-6">
            Visualisasi data kependudukan yang menyajikan informasi komprehensif tentang struktur populasi 
            berdasarkan berbagai parameter demografis. Data ini diperbarui secara berkala dan dapat digunakan 
            untuk perencanaan pembangunan wilayah.
        </p>
    </div>
    
    <!-- Summary Cards -->
    <div class="row summary-cards mb-4">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="floating-card summary-card primary-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="summary-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="card-subtitle">Total Penduduk</h6>
                                <h2 class="card-title" id="totalPenduduk">{{ App\Models\Penduduk::count() }} jiwa</h2>
                                <div class="trend-indicator">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>+2.1% YoY</span>
                                </div>
                            </div>
                        </div>
                        <div class="download-actions">
                            <button class="btn btn-icon btn-download" title="Download CSV" data-type="total">
                                <i class="fas fa-file-csv"></i>
                            </button>
                            <button class="btn btn-icon btn-download" title="Download Image" data-type="total">
                                <i class="fas fa-image"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="floating-card summary-card success-gradient">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="summary-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="card-subtitle">Kepala Keluarga</h6>
                                <h2 class="card-title" id="totalKK">{{ App\Models\Penduduk::kepalaKeluarga()->count() }} jiwa</h2>
                                <div class="trend-indicator">
                                    <i class="fas fa-arrow-up"></i>
                                    <span>+1.8% YoY</span>
                                </div>
                            </div>
                        </div>
                        <div class="download-actions">
                            <button class="btn btn-icon btn-download" title="Download CSV" data-type="kk">
                                <i class="fas fa-file-csv"></i>
                            </button>
                            <button class="btn btn-icon btn-download" title="Download Image" data-type="kk">
                                <i class="fas fa-image"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Demographic Charts -->
    <div class="demographic-charts">
        <!-- Row 1: Piramida Penduduk dan Distribusi -->
        <div class="row mb-4">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="floating-card chart-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-bar me-2 chart-icon"></i>
                            <h4 class="card-title">Piramida Penduduk</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="pyramid" data-type="csv">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="pyramid" data-type="image">
                                <i class="fas fa-image me-1"></i> PNG
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="agePyramidChart"></canvas>
                        </div>
                        <div class="chart-footer">
                            <p class="chart-caption fs-6">
                                Piramida penduduk menunjukkan distribusi populasi berdasarkan kelompok usia dan jenis kelamin. 
                                Bentuk piramida ini mencerminkan struktur demografi wilayah tersebut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="floating-card chart-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marked-alt me-2 chart-icon"></i>
                            <h4 class="card-title">Distribusi Wilayah</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="dusun" data-type="csv">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="dusun" data-type="image">
                                <i class="fas fa-image me-1"></i> PNG
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="dusunChart"></canvas>
                        </div>
                        <div class="chart-footer">
                            <p class="chart-caption fs-6">
                                Distribusi penduduk berdasarkan wilayah administrasi terkecil (Dusun/RW). 
                                Data ini penting untuk perencanaan pelayanan publik yang merata.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2: Pendidikan dan Pekerjaan -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="floating-card chart-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-graduation-cap me-2 chart-icon"></i>
                            <h4 class="card-title">Tingkat Pendidikan</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="education" data-type="csv">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="education" data-type="image">
                                <i class="fas fa-image me-1"></i> PNG
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="educationChart"></canvas>
                        </div>
                        <div class="chart-footer">
                            <p class="chart-caption fs-6">
                                Komposisi penduduk berdasarkan tingkat pendidikan tertinggi yang ditamatkan. 
                                Indikator penting untuk mengukur kualitas sumber daya manusia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="floating-card chart-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-briefcase me-2 chart-icon"></i>
                            <h4 class="card-title">Komposisi Pekerjaan</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="job" data-type="csv">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="job" data-type="image">
                                <i class="fas fa-image me-1"></i> PNG
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="jobChart"></canvas>
                        </div>
                        <div class="chart-footer">
                            <p class="chart-caption fs-6">
                                Distribusi penduduk berdasarkan jenis pekerjaan utama. 
                                Menunjukkan struktur ekonomi dan sektor-sektor yang dominan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3: Agama dan Statistik -->
        <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="floating-card chart-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-praying-hands me-2 chart-icon"></i>
                            <h4 class="card-title">Komposisi Agama</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="religion" data-type="csv">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                            <button class="btn btn-sm btn-outline-light btn-download" data-chart="religion" data-type="image">
                                <i class="fas fa-image me-1"></i> PNG
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="religionChart"></canvas>
                        </div>
                        <div class="chart-footer">
                            <p class="chart-caption fs-6">
                                Distribusi penduduk berdasarkan agama/kepercayaan. 
                                Data ini penting untuk memahami keragaman sosial dan perencanaan kegiatan kemasyarakatan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="floating-card stats-card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line me-2 chart-icon"></i>
                            <h4 class="card-title">Indikator Demografi</h4>
                        </div>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-light btn-download" id="downloadStatsCSV">
                                <i class="fas fa-file-csv me-1"></i> CSV
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="stat-info">
                                <h6>Laju Pertumbuhan Penduduk</h6>
                                <p>Per tahun ({{ date('Y')-1 }} - {{ date('Y') }})</p>
                            </div>
                            <div class="stat-value success">
                                +{{ $statistik['pertumbuhan'] }}%
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-info">
                                <h6>Kepadatan Penduduk</h6>
                                <p>Jiwa per km<sup>2</sup></p>
                            </div>
                            <div class="stat-value warning">
                                {{ number_format($statistik['kepadatan'], 2) }}
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-venus-mars"></i>
                            </div>
                            <div class="stat-info">
                                <h6>Rasio Jenis Kelamin</h6>
                                <p>Laki-laki : Perempuan</p>
                            </div>
                            <div class="stat-value primary">
                                {{ $statistik['rasio_jk'] }}
                            </div>
                        </div>
                        {{-- <div class="stat-item">
                            <div class="stat-icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <div class="stat-info">
                                <h6>Dependency Ratio</h6>
                                <p>Rasio ketergantungan</p>
                            </div>
                            <div class="stat-value info">
                                45.2
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer">
                        <p class="chart-caption fs-6 mx-3">
                            Indikator demografi kunci yang menggambarkan dinamika populasi. 
                            Rasio ketergantungan menunjukkan beban ekonomi penduduk produktif terhadap non-produktif.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Source and Metadata -->
    <div class="data-meta mt-4">
        <div class="floating-card meta-card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="meta-info">
                        <i class="fas fa-database me-2"></i>
                        <span>Sumber Data: Sistem Gampong ({{ date('d F Y') }})</span>
                    </div>
                    <div class="meta-actions mt-2 mt-md-0">
                        {{-- <button class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-book me-1"></i> Metadata
                        </button> --}}
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-download me-1"></i> Unduh Dataset Lengkap
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS Styles -->
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
        --success-gradient: linear-gradient(135deg, #0f9b0f 0%, #56ab2f 100%);
        --info-gradient: linear-gradient(135deg, #1fa2ff 0%, #12d8fa 50%, #a6ffcb 100%);
        --warning-gradient: linear-gradient(135deg, #f46b45 0%, #eea849 100%);
        --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        --purple-gradient: linear-gradient(135deg, #4776e6 0%, #8e54e9 100%);
        --teal-gradient: linear-gradient(135deg, #1fa2ff 0%, #12d8fa 50%, #a6ffcb 100%);
        --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%);
    }
    
    /* Base Container */
    .demografi-container {
        background-color: #f8fafc;
        padding: 20px;
        min-height: 100vh;
    }
    
    /* Header Section */
    .demografi-header {
        margin-bottom: 30px;
    }
    
    
    
    .title-decorator {
        display: inline-block;
        width: 50px;
        height: 3px;
        background: var(--primary-gradient);
        margin: 0 15px;
    }
    
    .section-description {
   
        margin: 0 auto;
        line-height: 1.6;
    }
    
    /* Floating Cards */
    .floating-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-bottom: 20px;
        background-color: white;
        overflow: hidden;
        height: 100%;
    }
    
    .floating-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.12);
    }
    
    .floating-card .card-header {
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .floating-card .card-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 0;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
    }
    
    .chart-icon {
        color: #3a7bd5;
        font-size: 1rem;
        background: rgba(58, 123, 213, 0.1);
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .floating-card .card-body {
        padding: 15px 20px;
    }
    
    .chart-footer, .card-footer {
        padding-top: 15px;
        margin-top: 15px;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .chart-caption {
        color: #6c757d;
        font-size: 0.85rem;
        line-height: 1.5;
        margin-bottom: 0;
    }
    
    /* Chart Containers */
    .chart-container {
        position: relative;
        height: 250px;
        width: 100%;
    }
    
    /* Summary Cards */
    .summary-card {
        color: white;
        border: none;
        overflow: hidden;
        position: relative;
    }
    
    .summary-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
        transform: rotate(30deg);
    }
    
    .primary-gradient {
        background: var(--primary-gradient);
    }
    
    .success-gradient {
        background: var(--success-gradient);
    }
    
    .info-gradient {
        background: var(--info-gradient);
    }
    
    .warning-gradient {
        background: var(--warning-gradient);
    }
    
    .danger-gradient {
        background: var(--danger-gradient);
    }
    
    .purple-gradient {
        background: var(--purple-gradient);
    }
    
    .summary-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .summary-card .card-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.85rem;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }
    
    .summary-card .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .trend-indicator {
        display: flex;
        align-items: center;
        font-size: 0.8rem;
        opacity: 0.9;
    }
    
    .trend-indicator i {
        margin-right: 5px;
    }
    
    /* Download Buttons */
    .chart-actions .btn {
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 0.75rem;
        margin-left: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .chart-actions .btn-outline-light {
        color: #495057;
        border-color: #dee2e6;
        background-color: white;
    }
    
    .chart-actions .btn-outline-light:hover {
        background-color: #f8f9fa;
    }
    
    .btn-download {
        background: rgba(58, 123, 213, 0.1);
        color: #3a7bd5;
    }
    
    .btn-download:hover {
        background: rgba(58, 123, 213, 0.2);
    }
    
    .btn-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin-left: 8px;
        font-size: 0.9rem;
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        border: none;
    }
    
    .btn-icon:hover {
        background-color: rgba(255, 255, 255, 0.3);
    }
    
    /* Stats Card */
    .stats-card .stat-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stats-card .stat-item:last-child {
        border-bottom: none;
    }
    
    .stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background-color: rgba(58, 123, 213, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: #3a7bd5;
        font-size: 1rem;
    }
    
    .stat-info {
        flex: 1;
    }
    
    .stats-card .stat-info h6 {
        font-size: 0.9rem;
        margin-bottom: 3px;
        color: #495057;
        font-weight: 500;
    }
    
    .stats-card .stat-info p {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    .stat-value {
        font-weight: 700;
        font-size: 1rem;
        min-width: 70px;
        text-align: right;
    }
    
    .stat-value.primary {
        color: #3a7bd5;
    }
    
    .stat-value.success {
        color: #28a745;
    }
    
    .stat-value.warning {
        color: #fd7e14;
    }
    
    .stat-value.info {
        color: #17a2b8;
    }
    
    /* Data Meta */
    .meta-card {
        background-color: white;
        padding: 15px 20px;
    }
    
    .meta-info {
        display: flex;
        align-items: center;
        color: #6c757d;
        font-size: 0.85rem;
    }
    
    .meta-actions .btn {
        font-size: 0.85rem;
        padding: 5px 15px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
       font-size: 1.5rem;
        }
        
        .title-decorator {
            width: 30px;
            margin: 0 10px;
        }
        
        .summary-card .card-title {
            font-size: 1.3rem;
        }
        
        .chart-container {
            height: 220px;
        }
        
        .floating-card .card-header {
            padding: 12px 15px;
        }
        
        .floating-card .card-body {
            padding: 15px;
        }
    }
    
    @media (max-width: 576px) {
       
        
        .title-decorator {
            display: none;
        }
        
        .summary-card .card-title {
            font-size: 1.2rem;
        }
        
        .chart-container {
            height: 200px;
        }
        
        .chart-actions .btn {
            padding: 3px 8px;
            font-size: 0.7rem;
            margin-left: 5px;
        }
    }
    
    /* Animation Effects */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .floating-card {
        animation: fadeInUp 0.6s ease forwards;
        opacity: 0;
    }
    
    .summary-cards .floating-card {
        animation-delay: 0.1s;
    }
    
    .demographic-charts .row:nth-child(1) .floating-card {
        animation-delay: 0.2s;
    }
    
    .demographic-charts .row:nth-child(2) .floating-card {
        animation-delay: 0.3s;
    }
    
    .demographic-charts .row:nth-child(3) .floating-card {
        animation-delay: 0.4s;
    }
    
    .data-meta .floating-card {
        animation-delay: 0.5s;
    }
</style>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-gradient-colors"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- JavaScript for Charts and Data -->
<script>
document.addEventListener('DOMContentLoaded', function() {
   

    // Penduduk Data
    const pendudukData = {
        total: {{ App\Models\Penduduk::count() }},
        kepalaKeluarga: {{ App\Models\Penduduk::kepalaKeluarga()->count() }},
        dusun: {
            labels: {!! json_encode($dusunData->pluck('dusun')) !!},
            data: {!! json_encode($dusunData->pluck('total')) !!},
            colors: ['#3a7bd5', '#00d2ff', '#0f9b0f', '#fd7e14', '#8e54e9', '#ff416c']
        },
        umur: {
            labels: {!! json_encode($piramidaData['labels']) !!},
            maleData: {!! json_encode($piramidaData['maleData']) !!},
            femaleData: {!! json_encode($piramidaData['femaleData']) !!},
            colors: ['#3a7bd5', '#00d2ff', '#0f9b0f', '#fd7e14', '#8e54e9', '#ff416c', '#2c3e50', '#4ca1af', '#56ab2f']
        },
        pendidikan: {
            labels: {!! json_encode($pendidikanData->pluck('pendidikan_terakhir')) !!},
            data: {!! json_encode($pendidikanData->pluck('total')) !!},
            colors: ['#3a7bd5', '#00d2ff', '#0f9b0f', '#fd7e14', '#8e54e9', '#ff416c', '#2c3e50']
        },
        pekerjaan: {
            labels: {!! json_encode($pekerjaanData->pluck('pekerjaan')) !!},
            data: {!! json_encode($pekerjaanData->pluck('total')) !!},
            colors: ['#3a7bd5', '#00d2ff', '#0f9b0f', '#fd7e14', '#8e54e9', '#ff416c', '#2c3e50']
        },
        agama: {
            labels: {!! json_encode($agamaData->pluck('agama')) !!},
            data: {!! json_encode($agamaData->pluck('total')) !!},
            colors: ['#3a7bd5', '#00d2ff', '#0f9b0f', '#fd7e14', '#8e54e9', '#ff416c']
        },
        statistik: {
            pertumbuhan: {{ $statistik['pertumbuhan'] }},
            kepadatan: {{ $statistik['kepadatan'] }},
            rasio_jk: {{ $statistik['rasio_jk'] }}
        }
    };

    // Set total penduduk and KK
    document.getElementById('totalPenduduk').textContent = pendudukData.total.toLocaleString() + ' jiwa';
    document.getElementById('totalKK').textContent = pendudukData.kepalaKeluarga.toLocaleString() + ' jiwa';

    // Chart Configuration
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 12,
                    padding: 15,
                    usePointStyle: true,
                    pointStyle: 'circle',
                    font: {
                        size: 12
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.85)',
                titleFont: {
                    size: 14,
                    weight: 'bold'
                },
                bodyFont: {
                    size: 12
                },
                padding: 12,
                cornerRadius: 8,
                displayColors: true,
                boxPadding: 6
            }
        }
    };

    // Age Pyramid Chart
    const agePyramidCtx = document.getElementById('agePyramidChart').getContext('2d');
    const agePyramidChart = new Chart(agePyramidCtx, {
        type: 'bar',
        data: {
            labels: pendudukData.umur.labels,
            datasets: [
                {
                    label: 'Laki-laki',
                    data: pendudukData.umur.maleData,
                    backgroundColor: '#3a7bd5',
                    borderWidth: 0,
                    borderRadius: 6,
                    borderSkipped: false,
                    barPercentage: 0.9,
                    categoryPercentage: 0.8
                },
                {
                    label: 'Perempuan',
                    data: pendudukData.umur.femaleData.map(item => -item),
                    backgroundColor: '#8e54e9',
                    borderWidth: 0,
                    borderRadius: 6,
                    borderSkipped: false,
                    barPercentage: 0.9,
                    categoryPercentage: 0.8
                }
            ]
        },
        options: {
            ...chartOptions,
            indexAxis: 'y',
            scales: {
                x: {
                    stacked: true,
                    ticks: {
                        callback: function(value) {
                            return Math.abs(value);
                        },
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    stacked: true,
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            },
            plugins: {
                ...chartOptions.plugins,
                tooltip: {
                    ...chartOptions.plugins.tooltip,
                    callbacks: {
                        label: function(context) {
                            const label = context.dataset.label || '';
                            const value = Math.abs(context.raw || 0);
                            const total = context.chart.data.datasets.reduce((sum, dataset) => {
                                const val = Math.abs(dataset.data[context.dataIndex]);
                                return sum + val;
                            }, 0);
                            const percentage = Math.round((Math.abs(context.raw) / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Dusun Distribution Chart
    const dusunCtx = document.getElementById('dusunChart').getContext('2d');
    const dusunChart = new Chart(dusunCtx, {
        type: 'doughnut',
        data: {
            labels: pendudukData.dusun.labels,
            datasets: [{
                data: pendudukData.dusun.data,
                backgroundColor: pendudukData.dusun.colors,
                borderWidth: 0,
                hoverBorderWidth: 2,
                hoverBorderColor: '#fff',
                hoverOffset: 10
            }]
        },
        options: {
            ...chartOptions,
            cutout: '65%',
            plugins: {
                ...chartOptions.plugins,
                tooltip: {
                    ...chartOptions.plugins.tooltip,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });

    // Education Chart
    const educationCtx = document.getElementById('educationChart').getContext('2d');
    const educationChart = new Chart(educationCtx, {
        type: 'pie',
        data: {
            labels: pendudukData.pendidikan.labels,
            datasets: [{
                data: pendudukData.pendidikan.data,
                backgroundColor: pendudukData.pendidikan.colors,
                borderWidth: 0,
                hoverBorderWidth: 2,
                hoverBorderColor: '#fff'
            }]
        },
        options: {
            ...chartOptions,
            cutout: '55%',
            plugins: {
                ...chartOptions.plugins,
                datalabels: {
                    display: false
                }
            }
        }
    });

    // Job Chart
    const jobCtx = document.getElementById('jobChart').getContext('2d');
    const jobChart = new Chart(jobCtx, {
        type: 'polarArea',
        data: {
            labels: pendudukData.pekerjaan.labels,
            datasets: [{
                data: pendudukData.pekerjaan.data,
                backgroundColor: pendudukData.pekerjaan.colors,
                borderWidth: 0,
                hoverBorderWidth: 2,
                hoverBorderColor: '#fff'
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                r: {
                    pointLabels: {
                        display: false
                    },
                    ticks: {
                        display: false,
                        stepSize: Math.max(...pendudukData.pekerjaan.data) / 5
                    },
                    grid: {
                        circular: true
                    }
                }
            },
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    ...chartOptions.plugins.legend,
                    position: 'right'
                }
            }
        }
    });

    // Religion Chart
    const religionCtx = document.getElementById('religionChart').getContext('2d');
    const religionChart = new Chart(religionCtx, {
        type: 'bar',
        data: {
            labels: pendudukData.agama.labels,
            datasets: [{
                label: 'Jumlah Penganut',
                data: pendudukData.agama.data,
                backgroundColor: pendudukData.agama.colors,
                borderWidth: 0,
                borderRadius: 6,
                borderSkipped: false,
                maxBarThickness: 40
            }]
        },
        options: {
            ...chartOptions,
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                }
            }
        }
    });

    // Download Functions
    function downloadChartImage(chart, filename) {
        const link = document.createElement('a');
        link.download = filename + '.png';
        link.href = chart.toBase64Image('image/png', 1);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function convertToCSV(data) {
        const headers = Object.keys(data[0]).join(',');
        const rows = data.map(obj => Object.values(obj).join(','));
        return [headers, ...rows].join('\n');
    }

    function downloadCSV(data, filename) {
        const csv = convertToCSV(data);
        const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        
        link.setAttribute('href', url);
        link.setAttribute('download', filename + '.csv');
        link.style.visibility = 'hidden';
        
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Event Listeners for Download Buttons
    document.querySelectorAll('[data-chart="pyramid"]').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const title = 'Piramida Penduduk';
            
            if (type === 'csv') {
                const data = pendudukData.umur.labels.map((label, i) => ({
                    'Kelompok Umur': label,
                    'Laki-laki': pendudukData.umur.maleData[i],
                    'Perempuan': pendudukData.umur.femaleData[i]
                }));
                downloadCSV(data, title);
            } else {
                downloadChartImage(agePyramidChart, title);
            }
        });
    });

    document.querySelectorAll('[data-chart="dusun"]').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const title = 'Distribusi Wilayah Penduduk';
            
            if (type === 'csv') {
                const data = pendudukData.dusun.labels.map((label, i) => ({
                    'Dusun': label,
                    'Jumlah Penduduk': pendudukData.dusun.data[i]
                }));
                downloadCSV(data, title);
            } else {
                downloadChartImage(dusunChart, title);
            }
        });
    });

    document.querySelectorAll('[data-chart="education"]').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const title = 'Tingkat Pendidikan Penduduk';
            
            if (type === 'csv') {
                const data = pendudukData.pendidikan.labels.map((label, i) => ({
                    'Pendidikan': label,
                    'Jumlah': pendudukData.pendidikan.data[i]
                }));
                downloadCSV(data, title);
            } else {
                downloadChartImage(educationChart, title);
            }
        });
    });

    document.querySelectorAll('[data-chart="job"]').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const title = 'Komposisi Pekerjaan Penduduk';
            
            if (type === 'csv') {
                const data = pendudukData.pekerjaan.labels.map((label, i) => ({
                    'Pekerjaan': label,
                    'Jumlah': pendudukData.pekerjaan.data[i]
                }));
                downloadCSV(data, title);
            } else {
                downloadChartImage(jobChart, title);
            }
        });
    });

    document.querySelectorAll('[data-chart="religion"]').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const title = 'Komposisi Agama Penduduk';
            
            if (type === 'csv') {
                const data = pendudukData.agama.labels.map((label, i) => ({
                    'Agama': label,
                    'Jumlah Penganut': pendudukData.agama.data[i]
                }));
                downloadCSV(data, title);
            } else {
                downloadChartImage(religionChart, title);
            }
        });
    });

    // Summary Card Downloads
    document.querySelectorAll('.summary-card .btn-download').forEach(button => {
        button.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            const isCSV = this.querySelector('.fa-file-csv');
            const card = this.closest('.summary-card');
            const title = card.querySelector('.card-subtitle').textContent.trim();
            
            if (isCSV) {
                let data;
                if (type === 'total') {
                    data = [{ 'Total Penduduk': pendudukData.total }];
                } else {
                    data = [{ 'Kepala Keluarga': pendudukData.kepalaKeluarga }];
                }
                downloadCSV(data, title);
            } else {
                html2canvas(card).then(canvas => {
                    const link = document.createElement('a');
                    link.download = title + '.png';
                    link.href = canvas.toDataURL();
                    link.click();
                });
            }
        });
    });

    // Stats Card Download
    document.getElementById('downloadStatsCSV').addEventListener('click', function() {
        const title = 'Indikator Demografi Penduduk';
        const data = [
            { 'Indikator': 'Laju Pertumbuhan Penduduk', 'Nilai': `+${pendudukData.statistik.pertumbuhan}%`, 'Periode': `Tahun ${new Date().getFullYear()-1}-${new Date().getFullYear()}` },
            { 'Indikator': 'Kepadatan Penduduk', 'Nilai': pendudukData.statistik.kepadatan, 'Satuan': 'Jiwa per km²' },
            { 'Indikator': 'Rasio Jenis Kelamin', 'Nilai': pendudukData.statistik.rasio_jk, 'Keterangan': 'Laki-laki : Perempuan' },
            { 'Indikator': 'Dependency Ratio', 'Nilai': '45.2', 'Keterangan': 'Rasio ketergantungan' }
        ];
        
        downloadCSV(data, title);
    });

    // Full Dataset Download
    document.querySelector('.btn-primary').addEventListener('click', function() {
        // Prepare comprehensive dataset
        const datasets = {
            'Total Penduduk': [{ 'Total Penduduk': pendudukData.total }],
            'Kepala Keluarga': [{ 'Kepala Keluarga': pendudukData.kepalaKeluarga }],
            'Distribusi Dusun': pendudukData.dusun.labels.map((label, i) => ({
                'Dusun': label,
                'Jumlah Penduduk': pendudukData.dusun.data[i]
            })),
            'Piramida Penduduk': pendudukData.umur.labels.map((label, i) => ({
                'Kelompok Umur': label,
                'Laki-laki': pendudukData.umur.maleData[i],
                'Perempuan': pendudukData.umur.femaleData[i]
            })),
            'Pendidikan': pendudukData.pendidikan.labels.map((label, i) => ({
                'Tingkat Pendidikan': label,
                'Jumlah': pendudukData.pendidikan.data[i]
            })),
            'Pekerjaan': pendudukData.pekerjaan.labels.map((label, i) => ({
                'Jenis Pekerjaan': label,
                'Jumlah': pendudukData.pekerjaan.data[i]
            })),
            'Agama': pendudukData.agama.labels.map((label, i) => ({
                'Agama': label,
                'Jumlah Penganut': pendudukData.agama.data[i]
            })),
            'Statistik': [
                { 'Indikator': 'Laju Pertumbuhan Penduduk', 'Nilai': `+${pendudukData.statistik.pertumbuhan}%`, 'Periode': `Tahun ${new Date().getFullYear()-1}-${new Date().getFullYear()}` },
                { 'Indikator': 'Kepadatan Penduduk', 'Nilai': pendudukData.statistik.kepadatan, 'Satuan': 'Jiwa per km²' },
                { 'Indikator': 'Rasio Jenis Kelamin', 'Nilai': pendudukData.statistik.rasio_jk, 'Keterangan': 'Laki-laki : Perempuan' },
                { 'Indikator': 'Dependency Ratio', 'Nilai': '45.2', 'Keterangan': 'Rasio ketergantungan' }
            ]
        };

        // Convert to single CSV
        let fullCSV = '';
        for (const [sheetName, data] of Object.entries(datasets)) {
            fullCSV += `=== ${sheetName} ===\n`;
            fullCSV += convertToCSV(data);
            fullCSV += '\n\n';
        }

        // Download
        const blob = new Blob([fullCSV], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        
        link.setAttribute('href', url);
        link.setAttribute('download', 'Dataset Lengkap Demografi Penduduk.csv');
        link.style.visibility = 'hidden';
        
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    // Responsive Adjustments
    window.addEventListener('resize', function() {
        agePyramidChart.resize();
        dusunChart.resize();
        educationChart.resize();
        jobChart.resize();
        religionChart.resize();
    });
});
</script>

<!-- Add html2canvas library for card image downloads -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
@endsection