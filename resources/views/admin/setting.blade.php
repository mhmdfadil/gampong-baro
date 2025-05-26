@extends('components.app')

@section('title', 'Pengaturan Desa')

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
    label{
        border-top: none;
        border-bottom: 2px solid #eee;
        font-weight: 700;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
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
    
    .map-container {
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }

    /* Eye icon style */
    .input-group-text.eye-icon {
        cursor: pointer;
        transition: all 0.3s;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .input-group-text.eye-icon:hover {
        background-color: #e9ecef;
    }

    /* Modal styles */
    .map-modal .modal-dialog {
        max-width: 650px;
    }

    .map-modal .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }

    .map-modal .modal-body {
        padding: 0;
    }

    .map-modal iframe {
        width: 100%;
        height: 350px;
        border: none;
    }

    /* File input styles */
    .file-upload-container {
        margin-bottom: 20px;
    }
    
    .file-upload-label {
        display: block;
        margin-bottom: 8px;
    }
    
    .file-upload-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }
    
    .file-upload-button {
        border: 1px dashed #ccc;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s;
        background-color: #f8f9fa;
    }
    
    .file-upload-button:hover {
        border-color: #2575fc;
        background-color: #e9f0ff;
    }
    
    .file-upload-input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    
    .file-upload-preview {
        margin-top: 15px;
        text-align: center;
    }
    
    .file-upload-preview img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .file-info {
        margin-top: 10px;
        font-size: 0.85rem;
        color: #6c757d;
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
                            <i class=""></i>Pengaturan Desa
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Informasi Umum
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card setting-card mb-1">
                <div class="card-header setting-header text-white">
                    <p class="mb-0">Kelola informasi dan pengaturan desa</p>
                </div>
                <div class="card-body">
                    <form id="setting-form" action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_desa" class="form-label">Nama Desa</label>
                                    <input type="text" class="form-control" id="nama_desa" name="nama_desa" 
                                           value="{{ old('nama_desa', $setting->nama_desa) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" 
                                           value="{{ old('nomor_hp', $setting->nomor_hp) }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email', $setting->email) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peta" class="form-label">Link Peta (Google Maps)</label>
                                    <div class="input-group">
                                        <input type="url" class="form-control" id="peta" name="peta" 
                                               value="{{ old('peta', $setting->peta) }}" placeholder="https://maps.google.com/...">
                                        @if($setting->peta)
                                        <span class="input-group-text eye-icon" onclick="showMapPreview('{{ $setting->peta }}')">
                                            <i class="fas fa-eye text-primary"></i>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" required>{{ old('alamat', $setting->alamat) }}</textarea>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat Desa</label>
                            <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" rows="3">{{ old('deskripsi_singkat', $setting->deskripsi_singkat) }}</textarea>
                        </div>

                         <!-- File Upload Section -->
                        <div class="form-group mb-3">
                            <label for="bagan" class="form-label">Bagan/Struktur Desa</label>
                            <div class="file-upload-wrapper">
                                <div class="file-upload-button">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2" style="color: #6a11cb;"></i>
                                    <p class="mb-1">Klik untuk mengunggah file</p>
                                    <p class="small text-muted">Format yang didukung: JPG, JPEG, PNG (Maks. 2MB)</p>
                                </div>
                                <input type="file" id="bagan" name="bagan" class="file-upload-input" accept=".jpg,.jpeg,.png">
                            </div>
                            
                            @if($setting->bagan)
                            <div class="file-upload-preview mt-3">
                                <p class="file-info">Bagan saat ini:</p>
                                <img src="{{ Storage::url('bagan/' . basename($setting->bagan)) }}" alt="Bagan Desa" class="img-thumbnail">
                                <p class="file-info mt-2">{{ basename($setting->bagan) }}</p>
                            </div>
                            @endif
                        </div>


                        <div class="action-buttons text-end">
                            <button type="button" class="btn btn-delete btn-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash-alt mr-2 mx-2"></i>Hapus Data
                            </button>
                            <button type="submit" class="btn btn-save btn-primary">
                                <i class="fas fa-save mr-2 mx-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Preview Modal -->
<div class="modal fade map-modal" id="mapPreviewModal" tabindex="-1" aria-labelledby="mapPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapPreviewModalLabel">Pratinjau Peta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="mapPreviewFrame" src="" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<form id="delete-form" action="{{ route('setting.destroy', $setting->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function showMapPreview(mapUrl) {
        // Ensure the URL is properly formatted for embedding
        let embedUrl = mapUrl;
        if (!mapUrl.includes('/embed')) {
            // Convert regular Google Maps URL to embed URL
            embedUrl = mapUrl.replace('/@', '/embed/@');
            if (!embedUrl.includes('embed')) {
                // For shared links that don't have coordinates in the URL
                embedUrl = `https://maps.google.com/maps?q=${encodeURIComponent(mapUrl)}&output=embed`;
            }
        }
        
        document.getElementById('mapPreviewFrame').src = embedUrl;
        const mapModal = new bootstrap.Modal(document.getElementById('mapPreviewModal'));
        mapModal.show();
    }

    function confirmDelete() {
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus semua data pengaturan desa? Tindakan ini tidak dapat dibatalkan!",
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

    // Update file upload preview script to use the correct ID
    document.getElementById('bagan').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const previewContainer = document.querySelector('.file-upload-preview');
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const maxSize = 2 * 1024 * 1024; // 2MB
            
            if (!validTypes.includes(file.type)) {
                Swal.fire({
                    title: 'Format File Tidak Valid',
                    text: 'Hanya file JPG, JPEG, dan PNG yang diperbolehkan.',
                    icon: 'error',
                    confirmButtonColor: '#6a11cb'
                });
                this.value = '';
                return;
            }
            
            if (file.size > maxSize) {
                Swal.fire({
                    title: 'Ukuran File Terlalu Besar',
                    text: 'Ukuran file maksimal adalah 2MB.',
                    icon: 'error',
                    confirmButtonColor: '#6a11cb'
                });
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                if (!previewContainer) {
                    const uploadButton = document.querySelector('.file-upload-button');
                    uploadButton.insertAdjacentHTML('afterend', 
                        `<div class="file-upload-preview mt-3">
                            <p class="file-info">Preview:</p>
                            <img src="${event.target.result}" alt="Preview" class="img-thumbnail">
                            <p class="file-info mt-2">${file.name}</p>
                        </div>`
                    );
                } else {
                    previewContainer.innerHTML = `
                        <p class="file-info">Preview:</p>
                        <img src="${event.target.result}" alt="Preview" class="img-thumbnail">
                        <p class="file-info mt-2">${file.name}</p>
                    `;
                }
            }
            reader.readAsDataURL(file);
        }
    });

    // Submit form dengan sweetalert
    document.getElementById('setting-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Menyimpan Perubahan',
            html: 'Sedang memproses perubahan pengaturan desa...',
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