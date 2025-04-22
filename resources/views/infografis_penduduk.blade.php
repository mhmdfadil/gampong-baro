@extends('components.main')

@section('content')
<div class="infographic-container">
    <h2 class="section-title text-center mb-5">
        <span class="title-line">Demografi Penduduk</span>
    </h2>
    @yield('infografis')
    
    <!-- Content Area -->
    <div class="tab-content" id="infographicTabsContent">
        <!-- Penduduk Tab -->
        <div class="tab-pane fade show active" id="penduduk" role="tabpanel" aria-labelledby="penduduk-tab">
            <!-- Summary Cards -->
            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="floating-card summary-card primary-gradient">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="card-subtitle">Total Penduduk</h6>
                                        <h2 class="card-title" id="totalPenduduk">0</h2>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="download-actions">
                                    <button class="btn btn-icon btn-download" title="Download CSV">
                                        <i class="fas fa-file-csv"></i>
                                    </button>
                                    <button class="btn btn-icon btn-download" title="Download Image">
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
                                        <h2 class="card-title" id="totalKK">0</h2>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 72%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="download-actions">
                                    <button class="btn btn-icon btn-download" title="Download CSV">
                                        <i class="fas fa-file-csv"></i>
                                    </button>
                                    <button class="btn btn-icon btn-download" title="Download Image">
                                        <i class="fas fa-image"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Charts Row 1 -->
            <div class="row mb-3">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marked-alt me-2 chart-icon"></i>
                                <h4 class="card-title">Distribusi Penduduk per Dusun</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv me-1"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image me-1"></i> PNG
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <canvas id="dusunChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-birthday-cake me-2 chart-icon"></i>
                                <h4 class="card-title">Piramida Penduduk</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image"></i> PNG
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <canvas id="agePyramidChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Charts Row 2 -->
            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-graduation-cap me-2 chart-icon"></i>
                                <h4 class="card-title">Tingkat Pendidikan</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image"></i> PNG
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <canvas id="educationChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-briefcase me-2 chart-icon"></i>
                                <h4 class="card-title">Jenis Pekerjaan</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image"></i> PNG
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <canvas id="jobChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Data Row -->
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-praying-hands me-2 chart-icon"></i>
                                <h4 class="card-title">Agama</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image"></i> PNG
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <canvas id="religionChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="floating-card stats-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chart-line me-2 chart-icon"></i>
                                <h4 class="card-title">Statistik Kependudukan</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv"></i> CSV
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="stat-item">
                                <div class="stat-info">
                                    <h6>Pertumbuhan Penduduk</h6>
                                    <p>Tahun 2023</p>
                                </div>
                                <div class="stat-value success">
                                    +2.4% <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-info">
                                    <h6>Kepadatan Penduduk</h6>
                                    <p>Per km<sup>2</sup></p>
                                </div>
                                <div class="stat-value warning">
                                    1,245 <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-info">
                                    <h6>Rasio Jenis Kelamin</h6>
                                    <p>Laki-laki : Perempuan</p>
                                </div>
                                <div class="stat-value primary">
                                    1.02 <i class="fas fa-venus-mars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS Styles -->
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        --success-gradient: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
        --info-gradient: linear-gradient(135deg, #00c6fb 0%, #005bea 100%);
        --warning-gradient: linear-gradient(135deg, #f46b45 0%, #eea849 100%);
        --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        --purple-gradient: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
        --teal-gradient: linear-gradient(135deg, #1FA2FF 0%, #12D8FA 50%, #A6FFCB 100%);
    }
    
    /* Base Styles */
    .infographic-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 15px;
        min-height: 100vh;
        position: relative;
    }
   
    /* Floating Cards */
    .floating-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-bottom: 5px;
        background-color: white;
        overflow: hidden;
        position: relative;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .floating-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }
    
    .floating-card .card-header {
        background-color: rgba(255, 255, 255, 0.9);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .floating-card .card-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 0;
        display: flex;
        align-items: center;
        font-size: 1rem;
    }
    
    .chart-icon {
        color: #6a11cb;
        font-size: 1rem;
        background: rgba(106, 17, 203, 0.1);
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .floating-card .card-body {
        padding: 15px;
    }
    
    .chart-actions .btn {
        border-radius: 10px;
        padding: 4px 10px;
        font-size: 0.7rem;
        margin-left: 6px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    
    .chart-actions .btn:hover {
        background: rgba(0, 0, 0, 0.05);
    }
    
    .btn-download {
        background: rgba(106, 17, 203, 0.1);
        color: #6a11cb;
    }
    
    .btn-download:hover {
        background: rgba(106, 17, 203, 0.2);
    }
    
    .btn-icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        margin-left: 6px;
        font-size: 0.8rem;
    }
    
    /* Summary Cards */
    .summary-card {
        color: white;
        border: none;
        overflow: hidden;
        position: relative;
        border: none;
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
    
    .danger-gradient {
        background: var(--danger-gradient);
    }
    
    .warning-gradient {
        background: var(--warning-gradient);
    }
    
    .download-actions {
        display: flex;
    }
    
    .summary-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .summary-card .card-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.8rem;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }
    
    .summary-card .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .summary-card .progress {
        height: 5px;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 3px;
        width: 80%;
    }
    
    .summary-card .progress-bar {
        background-color: white;
        border-radius: 3px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Stats Card */
    .stats-card .stat-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stats-card .stat-item:last-child {
        border-bottom: none;
    }
    
    .stats-card .stat-info h6 {
        font-size: 0.85rem;
        margin-bottom: 3px;
        color: #495057;
        font-weight: 500;
    }
    
    .stats-card .stat-info p {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    .stats-card .stat-value {
        font-weight: 700;
        font-size: 1rem;
        display: flex;
        align-items: center;
    }
    
    .stats-card .stat-value i {
        margin-left: 6px;
        font-size: 0.9rem;
    }
    
    .stats-card .stat-value.primary {
        color: #6a11cb;
    }
    
    .stats-card .stat-value.success {
        color: #00b09b;
    }
    
    .stats-card .stat-value.warning {
        color: #f39c12;
    }
    
    /* Chart Containers */
    canvas {
        width: 100% !important;
        height: auto !important;
        max-height: 250px;
        min-height: 200px;
    }
    
    /* Responsive Adjustments */
    @media (min-width: 768px) {
        .infographic-container {
            padding: 20px;
        }
        
        .floating-card .card-title {
            font-size: 0.85rem;
        }
        
        .chart-icon {
            font-size: 1.1rem;
            width: 36px;
            height: 36px;
        }
        
        .summary-card .card-title {
            font-size: 1.3rem;
        }
        
        .summary-icon {
            width: 55px;
            height: 55px;
            font-size: 1.3rem;
        }
        
        canvas {
            max-height: 300px;
        }
    }
    
    @media (min-width: 992px) {
        .infographic-container {
            padding: 25px;
        }
        
        .summary-card .card-title {
            font-size: 1.5rem;
        }
        
        .summary-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        
        canvas {
            max-height: 350px;
        }
    }
    
    /* Animation Effects */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .floating-card {
        animation: fadeIn 0.6s ease forwards;
    }
    
    .floating-card:nth-child(1) { animation-delay: 0.1s; }
    .floating-card:nth-child(2) { animation-delay: 0.2s; }
    .floating-card:nth-child(3) { animation-delay: 0.3s; }
    .floating-card:nth-child(4) { animation-delay: 0.4s; }
</style>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-gradient-colors"></script>

<!-- JavaScript for Charts and Data -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
       // Penduduk Data
       const pendudukData = {
           total: '5243 jiwa',
           kepalaKeluarga: '1428 jiwa',
           dusun: {
               labels: ['Dusun Krajan', 'Dusun Ngemplak', 'Dusun Pucang', 'Dusun Wonosari'],
               data: [1892, 1254, 987, 1110],
               colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12']
           },
           umur: {
               labels: ['0-5', '6-12', '13-17', '18-25', '26-35', '36-45', '46-55', '56-65', '65+'],
               maleData: [210, 290, 260, 380, 420, 350, 220, 180, 220],
               femaleData: [213, 297, 252, 409, 425, 373, 236, 209, 299],
               colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c', '#3498db', '#2ecc71', '#9b59b6', '#34495e']
           },
           pendidikan: {
               labels: ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Pascasarjana'],
               data: [123, 1542, 1289, 1567, 342, 456, 24],
               colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c', '#3498db', '#2ecc71']
           },
           pekerjaan: {
               labels: ['Petani', 'PNS', 'Wiraswasta', 'Buruh', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga', 'Lainnya'],
               data: [1245, 234, 876, 567, 987, 1023, 311],
               colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c', '#3498db', '#2ecc71']
           },
           agama: {
               labels: ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'],
               data: [4789, 234, 56, 98, 42, 24],
               colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c', '#3498db']
           }
       };

       // Set total penduduk and KK
       document.getElementById('totalPenduduk').textContent = pendudukData.total.toLocaleString();
       document.getElementById('totalKK').textContent = pendudukData.kepalaKeluarga.toLocaleString();

       // Initialize Charts with responsive settings
       const chartOptions = {
           responsive: true,
           maintainAspectRatio: true,
           plugins: {
               legend: {
                   position: 'bottom',
                   labels: {
                       boxWidth: 12,
                       padding: 10,
                       usePointStyle: true,
                       pointStyle: 'circle',
                       font: {
                           size: window.innerWidth < 768 ? 10 : 12
                       }
                   }
               }
           }
       };

       const dusunChart = new Chart(document.getElementById('dusunChart'), {
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
                       backgroundColor: 'rgba(0,0,0,0.8)',
                       titleFont: {
                           size: window.innerWidth < 768 ? 12 : 14,
                           weight: 'bold'
                       },
                       bodyFont: {
                           size: window.innerWidth < 768 ? 10 : 12
                       },
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

       const agePyramidChart = new Chart(document.getElementById('agePyramidChart'), {
           type: 'bar',
           data: {
               labels: pendudukData.umur.labels,
               datasets: [
                   {
                       label: 'Laki-laki',
                       data: pendudukData.umur.maleData,
                       backgroundColor: '#2575fc',
                       borderWidth: 0,
                       borderRadius: 4,
                       borderSkipped: false
                   },
                   {
                       label: 'Perempuan',
                       data: pendudukData.umur.femaleData.map(item => -item),
                       backgroundColor: '#6a11cb',
                       borderWidth: 0,
                       borderRadius: 4,
                       borderSkipped: false
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
                               size: window.innerWidth < 768 ? 10 : 12
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
                               size: window.innerWidth < 768 ? 10 : 12
                           }
                       }
                   }
               },
               plugins: {
                   ...chartOptions.plugins,
                   tooltip: {
                       backgroundColor: 'rgba(0,0,0,0.8)',
                       callbacks: {
                           label: function(context) {
                               const label = context.dataset.label || '';
                               const value = Math.abs(context.raw || 0);
                               return `${label}: ${value}`;
                           }
                       }
                   }
               }
           }
       });

       const educationChart = new Chart(document.getElementById('educationChart'), {
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
               cutout: '55%'
           }
       });

       const jobChart = new Chart(document.getElementById('jobChart'), {
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
                           stepSize: window.innerWidth < 768 ? 200 : 300
                       }
                   }
               }
           }
       });

       const religionChart = new Chart(document.getElementById('religionChart'), {
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
                               size: window.innerWidth < 768 ? 10 : 12
                           }
                       }
                   },
                   x: {
                       grid: {
                           display: false
                       },
                       ticks: {
                           font: {
                               size: window.innerWidth < 768 ? 10 : 12
                           }
                       }
                   }
               }
           }
       });

       // Function to download chart as image
       function downloadChartImage(chart, filename) {
           const link = document.createElement('a');
           link.download = filename + '.png';
           link.href = chart.toBase64Image();
           document.body.appendChild(link);
           link.click();
           document.body.removeChild(link);
       }

       // Function to convert data to CSV
       function convertToCSV(data) {
           const headers = Object.keys(data[0]).join(',');
           const rows = data.map(obj => Object.values(obj).join(','));
           return [headers, ...rows].join('\n');
       }

       // Function to download CSV
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

       // Add download functionality for summary cards
       document.querySelectorAll('.summary-card .btn-download').forEach(button => {
           button.addEventListener('click', function(e) {
               e.preventDefault();
               const card = this.closest('.summary-card');
               const title = card.querySelector('.card-subtitle').textContent.trim();
               
               if (this.querySelector('.fa-file-csv')) {
                   // Prepare CSV data for summary cards
                   let data;
                   if (title === 'Total Penduduk') {
                       data = [{ 'Total Penduduk': pendudukData.total }];
                   } else if (title === 'Kepala Keluarga') {
                       data = [{ 'Kepala Keluarga': pendudukData.kepalaKeluarga }];
                   }
                   downloadCSV(data, title);
               } else {
                   // For image download, we'll use html2canvas to capture the card
                   const cardTitle = card.querySelector('.card-subtitle').textContent.trim();
                   html2canvas(card).then(canvas => {
                       const link = document.createElement('a');
                       link.download = cardTitle + '.png';
                       link.href = canvas.toDataURL();
                       link.click();
                   });
               }
           });
       });

       // Add download functionality for charts
       document.querySelectorAll('.chart-card .btn-download').forEach(button => {
           button.addEventListener('click', function(e) {
               e.preventDefault();
               const card = this.closest('.chart-card');
               const title = card.querySelector('.card-title').textContent.trim();
               const chartId = card.querySelector('canvas').id;
               
               if (this.querySelector('.fa-file-csv')) {
                   // Prepare CSV data for each chart
                   let data = [];
                   
                   switch(chartId) {
                       case 'dusunChart':
                           data = pendudukData.dusun.labels.map((label, i) => ({
                               Dusun: label,
                               Penduduk: pendudukData.dusun.data[i]
                           }));
                           break;
                       case 'agePyramidChart':
                           data = pendudukData.umur.labels.map((label, i) => ({
                               'Kelompok Umur': label,
                               'Laki-laki': pendudukData.umur.maleData[i],
                               'Perempuan': pendudukData.umur.femaleData[i]
                           }));
                           break;
                       case 'educationChart':
                           data = pendudukData.pendidikan.labels.map((label, i) => ({
                               Pendidikan: label,
                               Jumlah: pendudukData.pendidikan.data[i]
                           }));
                           break;
                       case 'jobChart':
                           data = pendudukData.pekerjaan.labels.map((label, i) => ({
                               Pekerjaan: label,
                               Jumlah: pendudukData.pekerjaan.data[i]
                           }));
                           break;
                       case 'religionChart':
                           data = pendudukData.agama.labels.map((label, i) => ({
                               Agama: label,
                               Jumlah: pendudukData.agama.data[i]
                           }));
                           break;
                   }
                   
                   downloadCSV(data, title);
               } else {
                   // Download chart as image
                   let chart;
                   switch(chartId) {
                       case 'dusunChart': chart = dusunChart; break;
                       case 'agePyramidChart': chart = agePyramidChart; break;
                       case 'educationChart': chart = educationChart; break;
                       case 'jobChart': chart = jobChart; break;
                       case 'religionChart': chart = religionChart; break;
                   }
                   downloadChartImage(chart, title);
               }
           });
       });

       // Add download functionality for stats card
       document.querySelector('.stats-card .btn-download').addEventListener('click', function(e) {
           e.preventDefault();
           const title = this.closest('.stats-card').querySelector('.card-title').textContent.trim();
           
           const data = [
               { 'Statistik': 'Pertumbuhan Penduduk', 'Nilai': '+2.4%', 'Tahun': '2023' },
               { 'Statistik': 'Kepadatan Penduduk', 'Nilai': '1,245', 'Satuan': 'Per km²' },
               { 'Statistik': 'Rasio Jenis Kelamin', 'Nilai': '1.02', 'Keterangan': 'Laki-laki : Perempuan' }
           ];
           
           downloadCSV(data, title);
       });

       // Handle window resize for better mobile responsiveness
       window.addEventListener('resize', function() {
           dusunChart.resize();
           agePyramidChart.resize();
           educationChart.resize();
           jobChart.resize();
           religionChart.resize();
       });
   });
</script>

<!-- Add html2canvas library for card image downloads -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
@endsection