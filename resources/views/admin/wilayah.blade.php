@extends('components.app')

@section('title', 'Manajemen Peta Wilayah')

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
    
    label {
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
        border: none;
        box-shadow: var(--shadow);
    }

    .map-modal .modal-header {
        background: var(--primary-gradient);
        color: white;
        border-bottom: none;
    }

    .map-modal .modal-body {
        padding: 0;
        height: 350px;
    }

    .map-modal .modal-footer {
        border-top: none;
        background-color: #f8f9fa;
    }

    .map-modal iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    h5 {
        color: var(--dark-color);
        font-weight: 600;
        padding-bottom: 10px;
        border-bottom: 2px solid #eee;
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
                            <i class="fas fa-map-marked-alt"></i> Manajemen Peta Wilayah
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Batas dan Informasi Wilayah
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card setting-card mb-1">
                <div class="card-header setting-header text-white">
                    <p class="mb-0">Kelola informasi dan peta wilayah desa</p>
                </div>
                <div class="card-body">
                    @if(isset($wilayah))
                    <form id="wilayah-form" action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="peta_wilayah" class="form-label">Link Peta Wilayah (Google Maps)</label>
                                    <div class="input-group">
                                        <input type="url" class="form-control" id="peta_wilayah" name="peta_wilayah" 
                                               value="{{ old('peta_wilayah', $wilayah->peta_wilayah ?? '') }}" 
                                               placeholder="https://maps.google.com/...">
                                        @if(!empty($wilayah->peta_wilayah))
                                        <span class="input-group-text eye-icon" onclick="showMapPreview('{{ $wilayah->peta_wilayah }}')">
                                            <i class="fas fa-eye text-primary"></i>
                                        </span>
                                        @endif
                                    </div>
                                    <small class="text-muted">Masukkan URL lengkap peta Google Maps</small>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4 mb-3">Batas Wilayah</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_barat" class="form-label">Batas Barat</label>
                                    <input type="text" class="form-control" id="batas_barat" name="batas_barat" 
                                           value="{{ old('batas_barat', $wilayah->batas_barat ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jarak_barat" class="form-label">Jarak dari Pusat (km)</label>
                                    <input type="number" step="0.01" class="form-control" id="jarak_barat" name="jarak_barat" 
                                           value="{{ old('jarak_barat', $wilayah->jarak_barat ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_selatan" class="form-label">Batas Selatan</label>
                                    <input type="text" class="form-control" id="batas_selatan" name="batas_selatan" 
                                           value="{{ old('batas_selatan', $wilayah->batas_selatan ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jarak_selatan" class="form-label">Jarak dari Pusat (km)</label>
                                    <input type="number" step="0.01" class="form-control" id="jarak_selatan" name="jarak_selatan" 
                                           value="{{ old('jarak_selatan', $wilayah->jarak_selatan ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_timur" class="form-label">Batas Timur</label>
                                    <input type="text" class="form-control" id="batas_timur" name="batas_timur" 
                                           value="{{ old('batas_timur', $wilayah->batas_timur ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jarak_timur" class="form-label">Jarak dari Pusat (km)</label>
                                    <input type="number" step="0.01" class="form-control" id="jarak_timur" name="jarak_timur" 
                                           value="{{ old('jarak_timur', $wilayah->jarak_timur ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="batas_utara" class="form-label">Batas Utara</label>
                                    <input type="text" class="form-control" id="batas_utara" name="batas_utara" 
                                           value="{{ old('batas_utara', $wilayah->batas_utara ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jarak_utara" class="form-label">Jarak dari Pusat (km)</label>
                                    <input type="number" step="0.01" class="form-control" id="jarak_utara" name="jarak_utara" 
                                           value="{{ old('jarak_utara', $wilayah->jarak_utara ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4 mb-3">Informasi Wilayah</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="luas_wilayah_ha" class="form-label">Luas Wilayah (ha)</label>
                                    <input type="number" step="0.01" class="form-control" id="luas_wilayah_ha" name="luas_wilayah_ha" 
                                           value="{{ old('luas_wilayah_ha', $wilayah->luas_wilayah_ha ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ketinggian_mdl" class="form-label">Ketinggian (mdl)</label>
                                    <input type="number" step="0.01" class="form-control" id="ketinggian_mdl" name="ketinggian_mdl" 
                                           value="{{ old('ketinggian_mdl', $wilayah->ketinggian_mdl ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_penduduk" class="form-label">Jumlah Penduduk (jiwa)</label>
                                    <input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" 
                                           value="{{ old('jumlah_penduduk', $wilayah->jumlah_penduduk ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kepadatan_penduduk" class="form-label">Kepadatan Penduduk (per km²)</label>
                                    <input type="number" step="0.01" class="form-control" id="kepadatan_penduduk" name="kepadatan_penduduk" 
                                           value="{{ old('kepadatan_penduduk', $wilayah->kepadatan_penduduk ?? '') }}">
                                </div>
                            </div>
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
                    @endif
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
                <h5 class="modal-title text-white" id="mapPreviewModalLabel">
                    <i class="fas fa-map-marked-alt me-2"></i>Pratinjau Peta Wilayah
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="mapPreviewFrame" src="" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@if(isset($wilayah))
<form id="delete-form" action="{{ route('wilayah.destroy', $wilayah->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif

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
            text: "Anda yakin ingin menghapus data wilayah ini? Tindakan ini tidak dapat dibatalkan!",
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
    document.getElementById('wilayah-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Menyimpan Perubahan',
            html: 'Sedang memproses perubahan data wilayah...',
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