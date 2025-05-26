@extends('components.app')

@section('title', 'Edit Sejarah')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
        --success-gradient: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
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
    }
    
    .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
        padding: 12px 15px;
        font-size: 0.95rem;
    }
    
    .form-control:focus {
        border-color: #2575fc;
        box-shadow: 0 0 0 0.2rem rgba(37, 117, 252, 0.25);
    }
    
    .action-buttons {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    
    .btn-save {
        background: var(--primary-gradient);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(106, 17, 203, 0.3);
    }
    
    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(106, 17, 203, 0.4);
    }
    
    .btn-reset {
        background: #6c757d;
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    
    .btn-reset:hover {
        background: #5a6268;
        transform: translateY(-3px);
    }

    .btn-delete {
        background: var(--danger-gradient);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255, 65, 108, 0.3);
    }
    
    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 65, 108, 0.4);
    }
    
    label {
        border-top: none;
        border-bottom: 2px solid #eee;
        font-weight: 700;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    
    .alert {
        border-radius: 10px;
        border: none;
    }
    
    .alert-danger {
        background: #ffebee;
        color: #c62828;
    }
    
    .alert-success {
        background: #e8f5e9;
        color: #2e7d32;
    }
    
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }
    
    .current-image {
        border-radius: 10px;
        box-shadow: var(--shadow);
        transition: transform 0.3s;
        max-width: 100%;
        height: auto;
    }
    
    .current-image:hover {
        transform: scale(1.02);
    }

    .image-preview-container {
        margin-top: 15px;
        text-align: center;
    }

    .image-preview-label {
        display: block;
        margin-bottom: 5px;
        color: #6c757d;
        font-size: 0.8rem;
    }
</style>

@section('content')
<div class="py-2">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i>Sejarah Desa
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-history mr-1"></i> Konten Sejarah
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card setting-card mb-1">
                <div class="card-header setting-header text-white">
                    <p class="mb-0">Kelola informasi sejarah desa</p>
                </div>
                <div class="card-body">
                   
                    
                    
                    
                    @if(isset($firstHistory))
                    <form action="{{ route('histories.update', $firstHistory->id) }}" method="POST" enctype="multipart/form-data" id="history-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Judul Sejarah</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title', $firstHistory->title) }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Deskripsi Sejarah</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $firstHistory->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_image">Judul Gambar</label>
                                    <input type="text" class="form-control" id="title_image" name="title_image" 
                                           value="{{ old('title_image', $firstHistory->title_image) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Unggah Gambar Baru</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <small class="text-muted">Format: jpeg, png, jpg, gif, svg (Maksimal 2MB)</small>
                                </div>
                            </div>
                        </div>
                        
                        @if($firstHistory->image)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="image-preview-container">
                                    <span class="image-preview-label">Gambar Saat Ini:</span>
                                    <img src="{{ asset('storage/sejarah/' . $firstHistory->image) }}" 
                                         alt="Current History Image" 
                                         class="current-image" 
                                         style="max-height: 200px;">
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="action-buttons">
                            <button type="button" class="btn btn-delete text-light" onclick="confirmDelete()">
                                <i class="fas fa-trash-alt mr-2 mx-2"></i>Hapus Data
                            </button>
                           
                            <button type="submit" class="btn btn-save text-light">
                                <i class="fas fa-save mr-2 mx-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($firstHistory))
<form id="delete-form" action="{{ route('histories.destroy', $firstHistory->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus data sejarah ini? Tindakan ini tidak dapat dibatalkan!",
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
            width: '32em'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    }

    // Submit form dengan sweetalert
    document.getElementById('history-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Menyimpan Perubahan',
            html: 'Sedang memproses perubahan sejarah desa...',
            timerProgressBar: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
                form.submit();
            },
            background: 'rgba(0, 0, 0, 0.96)',
            color: '#fff'
        });
    });
</script>

@endsection