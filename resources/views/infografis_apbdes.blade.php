@extends('components.main')

@section('content')
<div class="infographic-container">
    <h2 class="section-title text-center mb-5">
        <span class="title-line">APB Desa</span>
    </h2>
    @yield('infografis')
    
    <!-- Content Area -->
    <div class="tab-content" id="infographicTabsContent">
        <!-- APBDes Tab -->
        <div class="tab-pane fade show active" id="apbdes" role="tabpanel" aria-labelledby="apbdes-tab">
            <!-- APBDes Summary -->
            <div class="row mb-3">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="floating-card summary-card info-gradient">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon">
                                        <i class="fas fa-wallet"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="card-subtitle">Total Pendapatan</h6>
                                        <h2 class="card-title" id="totalIncome">Rp1.450.000.000,00</h2>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 100%"></div>
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
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="floating-card summary-card danger-gradient">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="card-subtitle">Total Belanja</h6>
                                        <h2 class="card-title" id="totalExpense">Rp1.350.000.000,00</h2>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 93%"></div>
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
                <div class="col-md-4">
                    <div class="floating-card summary-card success-gradient">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="summary-icon">
                                        <i class="fas fa-piggy-bank"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="card-subtitle">Surplus/Defisit</h6>
                                        <h2 class="card-title" id="totalSurplus">Rp100.000.000,00</h2>
                                        <div class="progress mt-2">
                                            <div class="progress-bar" role="progressbar" style="width: 7%"></div>
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

            <!-- APBDes Main Charts -->
            <div class="row mb-3">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-chart-pie me-2 chart-icon"></i>
                                <h4 class="card-title">Komposisi APBDes</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv me-1"></i> CSV
                                </button>
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download Image">
                                    <i class="fas fa-image me-1"></i> PNG
                                </button>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        Tahun 2023
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">2023</a></li>
                                        <li><a class="dropdown-item" href="#">2022</a></li>
                                        <li><a class="dropdown-item" href="#">2021</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="apbdesComparisonChart" height="280"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-percentage me-2 chart-icon"></i>
                                <h4 class="card-title">Persentase Belanja</h4>
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
                        <div class="card-body">
                            <canvas id="apbdesExpenseChart" height="280"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- APBDes Detailed Charts -->
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-money-bill-alt me-2 chart-icon"></i>
                                <h4 class="card-title">Sumber Pendapatan</h4>
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
                        <div class="card-body">
                            <canvas id="apbdesIncomeChart" height="250"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="floating-card chart-card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-tasks me-2 chart-icon"></i>
                                <h4 class="card-title">Realisasi Anggaran</h4>
                            </div>
                            <div class="chart-actions">
                                <button class="btn btn-sm btn-outline-light btn-download" title="Download CSV">
                                    <i class="fas fa-file-csv me-1"></i> CSV
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="realization-item">
                                <div class="realization-info">
                                    <h6>Pembangunan Infrastruktur</h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 92%"></div>
                                    </div>
                                </div>
                                <div class="realization-value">
                                    92%
                                </div>
                            </div>
                            <div class="realization-item">
                                <div class="realization-info">
                                    <h6>Program Pemberdayaan</h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                                    </div>
                                </div>
                                <div class="realization-value">
                                    85%
                                </div>
                            </div>
                            <div class="realization-item">
                                <div class="realization-info">
                                    <h6>Pelayanan Kesehatan</h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                                <div class="realization-value">
                                    78%
                                </div>
                            </div>
                            <div class="realization-item">
                                <div class="realization-info">
                                    <h6>Pendidikan</h6>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="realization-value">
                                    65%
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
        padding: 20px;
        min-height: 100vh;
        position: relative;
    }
   
    /* Floating Cards */
    .floating-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin-bottom: 5px;
        background-color: white;
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .floating-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }
    
    .floating-card .card-header {
        background-color: rgba(255, 255, 255, 0.9);
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
        display: flex;
        align-items: center;
        font-size: 0.8rem;
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
        padding: 18px;
    }
    
    .chart-actions .btn {
        border-radius: 10px;
        font-size: 0.7rem;
        margin-left: 6px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        padding: 4px 8px;
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
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .summary-card .card-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.8rem;
        margin-bottom: 4px;
        letter-spacing: 0.5px;
    }
    
    .summary-card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
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
    
    /* Realization Items */
    .realization-item {
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .realization-item:last-child {
        margin-bottom: 0;
    }
    
    .realization-item h6 {
        font-size: 0.8rem;
        margin-bottom: 4px;
        color: #495057;
    }
    
    .realization-value {
        font-weight: 600;
        color: #6a11cb;
        font-size: 0.85rem;
        min-width: 35px;
        text-align: right;
    }
    
    .realization-info {
        flex-grow: 1;
        padding-right: 12px;
    }
    
    /* Chart Containers */
    canvas {
        width: 100% !important;
        height: auto !important;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .floating-card {
            border-radius: 10px;
        }
        
        .summary-card .card-title {
            font-size: 1.05rem;
        }
        
        .summary-icon {
            width: 45px;
            height: 45px;
            font-size: 1.1rem;
        }
        
        .chart-actions .btn {
            font-size: 0.65rem;
            margin-left: 4px;
            padding: 3px 6px;
        }
        
        .download-actions {
            position: absolute;
            top: 12px;
            right: 12px;
        }
    }
</style>

<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<!-- JavaScript for Charts and Data -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Format currency function
        function formatCurrency(value) {
            return 'Rp' + value.toLocaleString('id-ID') + ',00';
        }

        // APBDes Data
        const apbdesData = {
            pendapatan: {
                labels: ['Dana Desa', 'Bagi Hasil Pajak', 'Bantuan Provinsi', 'Bantuan Kabupaten', 'Lain-lain'],
                data: [850000000, 250000000, 150000000, 120000000, 80000000],
                colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c']
            },
            belanja: {
                labels: ['Pembangunan', 'Pemerintahan', 'Pembinaan', 'Pemberdayaan', 'Daratasan', 'Tak Terduga'],
                data: [450000000, 200000000, 150000000, 180000000, 250000000, 120000000],
                colors: ['#6a11cb', '#2575fc', '#1abc9c', '#f39c12', '#e74c3c', '#3498db']
            },
            perbandingan: {
                labels: ['Pendapatan', 'Belanja', 'Surplus'],
                data: [1450000000, 1350000000, 100000000],
                colors: ['#1abc9c', '#e74c3c', '#3498db']
            },
            realisasi: [
                { name: 'Pembangunan Infrastruktur', value: 92 },
                { name: 'Program Pemberdayaan', value: 85 },
                { name: 'Pelayanan Kesehatan', value: 78 },
                { name: 'Pendidikan', value: 65 }
            ]
        };

        // Update summary cards with formatted values
        document.getElementById('totalIncome').textContent = formatCurrency(apbdesData.perbandingan.data[0]);
        document.getElementById('totalExpense').textContent = formatCurrency(apbdesData.perbandingan.data[1]);
        document.getElementById('totalSurplus').textContent = formatCurrency(apbdesData.perbandingan.data[2]);

        // Initialize Charts
        const apbdesIncomeChart = new Chart(document.getElementById('apbdesIncomeChart'), {
            type: 'bar',
            data: {
                labels: apbdesData.pendapatan.labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: apbdesData.pendapatan.data,
                    backgroundColor: apbdesData.pendapatan.colors,
                    borderWidth: 0,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return formatCurrency(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: function(value) {
                                return formatCurrency(value);
                            }
                        }
                    }
                }
            }
        });

        const apbdesExpenseChart = new Chart(document.getElementById('apbdesExpenseChart'), {
            type: 'doughnut',
            data: {
                labels: apbdesData.belanja.labels,
                datasets: [{
                    data: apbdesData.belanja.data,
                    backgroundColor: apbdesData.belanja.colors,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 10,
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'circle',
                            font: {
                                size: 10
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.raw || 0;
                                return context.label + ': ' + formatCurrency(value);
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });

        const apbdesComparisonChart = new Chart(document.getElementById('apbdesComparisonChart'), {
            type: 'bar',
            data: {
                labels: apbdesData.perbandingan.labels,
                datasets: [{
                    label: 'Jumlah (Rp)',
                    data: apbdesData.perbandingan.data,
                    backgroundColor: apbdesData.perbandingan.colors,
                    borderWidth: 0,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return formatCurrency(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: function(value) {
                                return formatCurrency(value);
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
                    if (title === 'Total Pendapatan') {
                        data = [{ 'Total Pendapatan': formatCurrency(apbdesData.perbandingan.data[0]) }];
                    } else if (title === 'Total Belanja') {
                        data = [{ 'Total Belanja': formatCurrency(apbdesData.perbandingan.data[1]) }];
                    } else if (title === 'Surplus/Defisit') {
                        data = [{ 'Surplus/Defisit': formatCurrency(apbdesData.perbandingan.data[2]) }];
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
                const chartId = card.querySelector('canvas')?.id;
                
                if (this.querySelector('.fa-file-csv')) {
                    // Prepare CSV data for each chart
                    let data = [];
                    
                    switch(chartId) {
                        case 'apbdesIncomeChart':
                            data = apbdesData.pendapatan.labels.map((label, i) => ({
                                'Sumber Pendapatan': label,
                                'Jumlah': formatCurrency(apbdesData.pendapatan.data[i])
                            }));
                            break;
                        case 'apbdesExpenseChart':
                            data = apbdesData.belanja.labels.map((label, i) => ({
                                'Jenis Belanja': label,
                                'Jumlah': formatCurrency(apbdesData.belanja.data[i])
                            }));
                            break;
                        case 'apbdesComparisonChart':
                            data = apbdesData.perbandingan.labels.map((label, i) => ({
                                'Komponen APBDes': label,
                                'Jumlah': formatCurrency(apbdesData.perbandingan.data[i])
                            }));
                            break;
                        default:
                            // For realization card
                            if (title === 'Realisasi Anggaran') {
                                data = apbdesData.realisasi.map(item => ({
                                    'Program': item.name,
                                    'Realisasi': item.value + '%'
                                }));
                            }
                    }
                    
                    downloadCSV(data, title);
                } else if (chartId) {
                    // Download chart as image
                    let chart;
                    switch(chartId) {
                        case 'apbdesIncomeChart': chart = apbdesIncomeChart; break;
                        case 'apbdesExpenseChart': chart = apbdesExpenseChart; break;
                        case 'apbdesComparisonChart': chart = apbdesComparisonChart; break;
                    }
                    downloadChartImage(chart, title);
                } else {
                    // For realization card image download
                    html2canvas(card).then(canvas => {
                        const link = document.createElement('a');
                        link.download = title + '.png';
                        link.href = canvas.toDataURL();
                        link.click();
                    });
                }
            });
        });
    });
</script>
@endsection