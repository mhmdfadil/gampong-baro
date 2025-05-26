@extends('components.app')

@section('title', 'Manajemen Visi')

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

    .page-header h4 {
        color: var(--dark-color);
        font-weight: 600;
    }

    .badge {
        font-size: 0.75rem;
    }

    .alert {
        border-radius: 10px;
        border: none;
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
                            <i class=""></i>Manajemen Visi
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Visi Desa
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card setting-card mb-1">
                <div class="card-header setting-header text-white">
                    <p class="mb-0">Kelola visi dan tujuan desa</p>
                </div>
                <div class="card-body">
                    @if(isset($vision))
                    <form id="vision-form" action="{{ route('vision.update', $vision->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Judul Visi</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="{{ old('title', $vision->title ?? '-') }}" 
                                           placeholder="Masukkan judul visi desa" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="visi">Deskripsi Visi</label>
                                    <textarea class="form-control" id="visi" name="visi" rows="5" 
                                              placeholder="Masukkan deskripsi visi desa" required>{{ old('visi', $vision->visi ?? '-') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button type="button" class="btn btn-delete text-light" onclick="confirmDelete()">
                                <i class="fas fa-trash-alt mr-2 mx-2"></i>Reset Visi
                            </button>
                            <button type="submit" class="btn btn-save text-light">
                                <i class="fas fa-save mr-2 mx-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    
                    <form id="delete-form" action="{{ route('vision.destroy', $vision->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Konfirmasi Reset Visi',
            text: "Anda yakin ingin mereset visi ini? Semua data akan dikembalikan ke nilai default!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#6a11cb',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Reset Sekarang!',
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
    document.getElementById('vision-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        
        Swal.fire({
            title: 'Menyimpan Perubahan',
            html: 'Sedang memproses perubahan visi desa...',
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