@extends('components.app')

@section('title', 'Manajemen Penduduk')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        --success-gradient: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
        --warning-gradient: linear-gradient(135deg, #ffb347 0%, #ffcc33 100%);
        --dark-color: #2c3e50;
        --light-color: #f8f9fa;
        --shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    body {
        background-color: #f5f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  
    .setting-card {
        border-radius: 15px;
        box-shadow: var(--shadow);
        border: none;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: white;
    }
    
    .setting-card:hover {
        transform: translateY(-5px);
    }
    
    .setting-header {
        background: var(--primary-gradient);
        color: white;
        border-bottom: none;
        padding: 20px;
        font-weight: 600;
    }

    .dt-buttons .btn {
        margin-right: 5px;
        border-radius: 8px !important;
        font-size: 0.75rem !important;
        padding: 0.5rem 0.75rem !important;
        min-width: auto;
    }
    
    .dt-buttons .btn i {
        margin-right: 3px;
    }
    
    .dt-button-collection .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
    }
    
    .dt-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .dataTables_wrapper {
        padding: 0 15px;
    }
    
  .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        padding: 5px 10px;
        border: 1px solid #ddd;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border-radius: 8px;
        padding: 5px;
        border: 1px solid #ddd;
    }
    
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100% !important;
    }
    
    .table thead th {
        border-top: none;
        border-bottom: 2px solid #eee;
        font-weight: 700;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        background-color: #f8f9fa;
        padding: 15px;
    }
    
    .table tbody tr {
        transition: all 0.2s;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .table tbody td {
        vertical-align: middle;
        padding: 15px;
        border-top: 1px solid #f0f0f0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .table tbody td:first-child {
        border-left: 1px solid #f0f0f0;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    
    .table tbody td:last-child {
        border-right: 1px solid #f0f0f0;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    
    .badge {
        font-weight: 600;
        padding: 6px 12px;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    
    .bg-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #868e96 100%) !important;
    }
    
    .bg-warning {
        background: var(--warning-gradient) !important;
    }
    
    .bg-success {
        background: var(--success-gradient) !important;
    }
    
    .bg-danger {
        background: var(--danger-gradient) !important;
    }
    
  
    
    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.8rem;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
    }
    
    .btn-sm i {
        font-size: 0.9rem;
    }
    
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }
    
    .page-header h4 i {
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .badge.rounded-pill {
        padding: 8px 16px;
    }
    
    .gender-badge {
        width: 24px;
        height: 24px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
    }
    
    .gender-male {
        background-color: #2575fc;
        color: white;
    }
    
    .gender-female {
        background-color: #ff4b2b;
        color: white;
    }

     .dataTables_info {
        padding-left: 15px;
    }
    
      .dataTables_paginate {
        padding-right: 15px;
    }

      /* Custom styles for DataTables length menu */
    .dataTables_length {
        margin-bottom: 15px;
    }
    
    .dataTables_length select {
        min-width: 70px;
    }

    @media screen and (max-width: 767px) {
        .btn-group {
            flex-wrap: wrap;
            gap: 5px;
        }
        
        .btn-group .btn {
            margin-right: 0;
            flex: 1 0 auto;
        }
        
        .dt-buttons .btn {
            margin-bottom: 5px;
            flex-grow: 1;
        }
    }
</style>

@section('content')
<div class="py-2">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i> Manajemen Infografis: Penduduk
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-list mr-1"></i> Daftar Penduduk
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card setting-card mb-4">
                <div class="card-header setting-header text-white d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-2 mb-md-0">Kelola semua data penduduk</p>
                    <div>
                        <button onclick="window.location='{{ route('penduduks.create') }}'" class="btn btn-light btn-sm">
                            <i class="fas fa-plus mr-1"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pendudukTable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th class="text-center" width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penduduks as $penduduk)
                                <tr>
                                    <td data-label="No">{{ $loop->iteration }}</td>
                                    <td data-label="NIK">{{ $penduduk->nik }}</td>
                                    <td data-label="Nama Lengkap">{{ $penduduk->nama_lengkap }}</td>
                                    <td data-label="TTL">
                                        {{ $penduduk->tempat_lahir }}, {{ date('d-m-Y', strtotime($penduduk->tanggal_lahir)) }}
                                    </td>
                                    <td data-label="Jenis Kelamin">
                                        @if($penduduk->jenis_kelamin == 'L')
                                            <span class="gender-badge gender-male" title="Laki-laki">L</span>
                                        @else
                                            <span class="gender-badge gender-female" title="Perempuan">P</span>
                                        @endif
                                    </td>
                                    <td data-label="Aksi">
                                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                                            <button 
                                                onclick="window.location='{{ route('penduduks.show', $penduduk->id) }}'" 
                                                class="btn btn-sm btn-info" 
                                                title="Detail"
                                                data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button 
                                                onclick="window.location='{{ route('penduduks.edit', $penduduk->id) }}'" 
                                                class="btn btn-sm btn-warning" 
                                                title="Edit"
                                                data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('penduduks.destroy', $penduduk->id) }}" 
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    title="Hapus" onclick="return confirmDelete(event)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#pendudukTable').DataTable({
            responsive: true,
            dom: "<'row mb-1'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                 "<'row mb-1'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row mt-1'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            language: {
                search: "Cari:",
                searchPlaceholder: "Cari penduduk...",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data yang ditemukan",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            },
            lengthMenu: [[50, 75, 100, 125], [50, 75, 100, 125]],
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copy',
                    className: 'btn btn-secondary text-sm',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude action column
                    }
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Print',
                    className: 'btn btn-info text-sm',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude action column
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"></i> Kolom',
                    className: 'btn btn-warning text-sm'
                }
            ],
            initComplete: function() {
                this.api().buttons().container().appendTo('#pendudukTable_wrapper .col-md-6:eq(0)');
            },
            columnDefs: [
                { responsivePriority: 1, targets: 0 }, // No
                { responsivePriority: 2, targets: -1 }, // Aksi
                { responsivePriority: 3, targets: 2 }, // Nama Lengkap
                { responsivePriority: 4, targets: 1 }, // NIK
                { responsivePriority: 5, targets: 3 }, // TTL
                { 
                    targets: -1, // Aksi column
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                }
            ],
            autoWidth: false,
            drawCallback: function(settings) {
                if ($(window).width() > 768) {
                    this.api().columns.adjust();
                }
            }
        });
        
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                table.columns.adjust();
            }
        });
        
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        });
    });

    function confirmDelete(e) {
        e.preventDefault();
        const form = e.target.closest('form');
        
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus data penduduk ini? Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6a11cb',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus Sekarang!',
            cancelButtonText: 'Batalkan',
            background: 'rgba(255, 255, 255, 0.96)',
            color: '#000',
            iconColor: '#ff416c',
            scrollbarPadding: false,
            width: '32em',
            customClass: {
                container: 'swal-responsive'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
@endsection