@extends('components.app')

@section('title', 'Sosial Media')


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
  
    
    .social-card {
        border-radius: 15px;
        box-shadow: var(--shadow);
        border: none;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: white;
    }
    
    .social-card:hover {
        transform: translateY(-5px);
    }
    
    .social-header {
        background: var(--primary-gradient);
        color: white;
        border-bottom: none;
        padding: 20px;
    }
    
    .platform-icon {
        font-size: 1.8rem;
        margin-right: 15px;
        vertical-align: middle;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
    }
    
    .platform-name {
        font-weight: 600;
        font-size: 1.1rem;
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
    
    .form-check-input {
        width: 1.5em;
        height: 1.5em;
        margin-top: 0;
    }
    
    .form-check-input:checked {
        background-color: #2575fc;
        border-color: #2575fc;
    }
    
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
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
    
    .table {
        margin-bottom: 0;
    }
    
    .table thead th {
        border-top: none;
        border-bottom: 2px solid #eee;
        font-weight: 700;
        color: var(--dark-color);
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    
    .table tbody tr {
        transition: all 0.2s;
    }
    
    .table tbody tr:hover {
        background-color: rgba(37, 117, 252, 0.05);
    }
    
    .table tbody td {
        vertical-align: middle;
        padding: 15px;
    }
    
    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-active {
        background-color: rgba(0, 176, 155, 0.1);
        color: #00b09b;
    }
    
    .status-inactive {
        background-color: rgba(108, 117, 125, 0.1);
        color: #6c757d;
    }
    
    .social-media-icon {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-right: 15px;
        color: white;
    }
    
    .facebook-icon {
        background: #3b5998;
    }
    
    .instagram-icon {
        background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
    }
    
    .youtube-icon {
        background: #ff0000;
    }
    
    .whatsapp-icon {
        background: #25d366;
    }
    
    .animate__animated.animate__fadeInUp {
        animation-duration: 0.5s;
    }

    /* Eye icon style */
    .input-group-text.eye-icon {
        cursor: pointer;
        transition: all 0.3s;
    }

    .input-group-text.eye-icon:hover {
        background-color: #e9ecef;
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
                            <i class=" "></i>Manajemen Sosial Media
                        </h4>
                        
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-globe mr-1"></i> Media Sosial
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card social-card mb-1">
                <div class="card-header social-header text-white">
                    <p class="mb-0 ">Kelola link dan aktivasi media sosial</p>
                </div>
                <div class="card-body">
                    <form id="social-media-form" action="{{ route('social-media.update', $socialMedia->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">Platform</th>
                                        <th style="width: 60%">Link</th>
                                        <th style="width: 20%" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Facebook -->
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="social-media-icon facebook-icon">
                                                    <i class="fab fa-facebook-f"></i>
                                                </div>
                                                <span class="platform-name">Facebook</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-link text-primary"></i></span>
                                                <input type="url" class="form-control" name="link_fb" 
                                                       value="{{ old('link_fb', $socialMedia->link_fb) }}" 
                                                       placeholder="https://facebook.com/username">
                                                @if($socialMedia->link_fb)
                                                <span class="input-group-text bg-light eye-icon" onclick="window.open('{{ $socialMedia->link_fb }}', '_blank')">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="active_fb" 
                                                           id="active_fb" {{ $socialMedia->active_fb ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="active_fb">
                                                        <span class="status-badge {{ $socialMedia->active_fb ? 'status-active' : 'status-inactive' }}">
                                                            {{ $socialMedia->active_fb ? 'Aktif' : 'Nonaktif' }}
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- Instagram -->
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="social-media-icon instagram-icon">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                                <span class="platform-name">Instagram</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-link text-danger"></i></span>
                                                <input type="url" class="form-control" name="link_ig" 
                                                       value="{{ old('link_ig', $socialMedia->link_ig) }}" 
                                                       placeholder="https://instagram.com/username">
                                                @if($socialMedia->link_ig)
                                                <span class="input-group-text bg-light eye-icon" onclick="window.open('{{ $socialMedia->link_ig }}', '_blank')">
                                                    <i class="fas fa-eye text-danger"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="active_ig" 
                                                           id="active_ig" {{ $socialMedia->active_ig ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="active_ig">
                                                        <span class="status-badge {{ $socialMedia->active_ig ? 'status-active' : 'status-inactive' }}">
                                                            {{ $socialMedia->active_ig ? 'Aktif' : 'Nonaktif' }}
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- YouTube -->
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="social-media-icon youtube-icon">
                                                    <i class="fab fa-youtube"></i>
                                                </div>
                                                <span class="platform-name">YouTube</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-link text-danger"></i></span>
                                                <input type="url" class="form-control" name="link_yt" 
                                                       value="{{ old('link_yt', $socialMedia->link_yt) }}" 
                                                       placeholder="https://youtube.com/channel/username">
                                                @if($socialMedia->link_yt)
                                                <span class="input-group-text bg-light eye-icon" onclick="window.open('{{ $socialMedia->link_yt }}', '_blank')">
                                                    <i class="fas fa-eye text-danger"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="active_yt" 
                                                           id="active_yt" {{ $socialMedia->active_yt ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="active_yt">
                                                        <span class="status-badge {{ $socialMedia->active_yt ? 'status-active' : 'status-inactive' }}">
                                                            {{ $socialMedia->active_yt ? 'Aktif' : 'Nonaktif' }}
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!-- WhatsApp -->
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex align-items-center">
                                                <div class="social-media-icon whatsapp-icon">
                                                    <i class="fab fa-whatsapp"></i>
                                                </div>
                                                <span class="platform-name">WhatsApp</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-link text-success"></i></span>
                                                <input type="text" class="form-control" name="link_wa" 
                                                       value="{{ old('link_wa', $socialMedia->link_wa) }}" 
                                                       placeholder="https://wa.me/6281234567890 atau 6281234567890">
                                                @if($socialMedia->link_wa)
                                                <span class="input-group-text bg-light eye-icon" onclick="window.open(formatWhatsAppUrl('{{ $socialMedia->link_wa }}'), '_blank')">
                                                    <i class="fas fa-eye text-success"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="active_wa" 
                                                           id="active_wa" {{ $socialMedia->active_wa ? 'checked' : '' }}>
                                                    <label class="form-check-label ms-2" for="active_wa">
                                                        <span class="status-badge {{ $socialMedia->active_wa ? 'status-active' : 'status-inactive' }}">
                                                            {{ $socialMedia->active_wa ? 'Aktif' : 'Nonaktif' }}
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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

<form id="delete-form" action="{{ route('social-media.destroy', $socialMedia->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    // Update status badge when toggle switch changes
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const badge = this.closest('.form-check').querySelector('.status-badge');
            if (this.checked) {
                badge.classList.remove('status-inactive');
                badge.classList.add('status-active');
                badge.textContent = 'Aktif';
            } else {
                badge.classList.remove('status-active');
                badge.classList.add('status-inactive');
                badge.textContent = 'Nonaktif';
            }
        });
    });

    // Format WhatsApp URL
    function formatWhatsAppUrl(waNumber) {
        // Remove all non-digit characters
        const cleaned = waNumber.replace(/\D/g, '');
        
        // Check if it's already a complete URL
        if (waNumber.includes('http')) {
            return waNumber;
        }
        
        // Check if it starts with country code
        if (cleaned.startsWith('62')) {
            return `https://wa.me/${cleaned}`;
        }
        
        // Check if it starts with 0
        if (cleaned.startsWith('0')) {
            return `https://wa.me/62${cleaned.substring(1)}`;
        }
        
        // Default case - assume it's already in international format
        return `https://wa.me/${cleaned}`;
    }

   
    function confirmDelete() {
        Swal.fire({
            title: 'Konfirmasi Penghapusan',
            text: "Anda yakin ingin menghapus semua data sosial media? Tindakan ini tidak dapat dibatalkan!",
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
    document.getElementById('social-media-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Menyimpan Perubahan',
            html: 'Sedang memproses perubahan data sosial media...',
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