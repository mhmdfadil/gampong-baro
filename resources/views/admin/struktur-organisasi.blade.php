@extends('components.app')

@section('title', 'Struktur Organisasi')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
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
    
    .page-header h4 i {
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .badge.rounded-pill {
        padding: 8px 16px;
    }
    
    .profile-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10%;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .action-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }
    
    @media screen and (max-width: 767px) {
        .table tbody td[data-label="Foto"] img {
            width: 50px;
            height: 50px;
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
                            <i class=""></i> Struktur Organisasi
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-list mr-1"></i> Daftar Anggota
                        </span>
                    </div>
                </div>
            </div>
            
         

            <div class="card setting-card mb-4">
                <div class="card-header setting-header text-white d-flex justify-content-between align-items-center flex-wrap">
                    <p class="mb-2 mb-md-0">Kelola semua anggota struktur organisasi</p>
                    <div>
                        <button onclick="window.location.href='{{ route('struktur-organisasi.create') }}'" 
                            class="btn btn-light btn-sm">
                            <i class="fas fa-plus mr-1"></i> 
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th class="text-center" width="120px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($struktur as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @php
                                            $imagePath = 'storage/' . $item->foto;
                                            $defaultImage = 'assets/images/default-profile.png';
                                        @endphp
                                        <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImage) }}" 
                                             alt="{{ $item->nama }}" 
                                             class="profile-img">
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->urutan }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $item->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons justify-content-center">
                                            <button onclick="window.location.href='{{ route('struktur-organisasi.edit', $item->id) }}'" 
                                                class="btn btn-sm btn-warning" 
                                                title="Edit"
                                                data-toggle="tooltip" data-placement="top">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('struktur-organisasi.destroy', $item->id) }}" 
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    function confirmDelete(e) {
        e.preventDefault();
        const form = e.target.closest('form');
        
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan!",
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

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection