@extends('components.app')

@section('title', 'Detail Dokumen PPID')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i> Detail Dokumen PPID
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Informasi Lengkap
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Detail dokumen PPID</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul Dokumen</label>
                                <input type="text" class="form-control bg-light font-weight-bold" value="{{ $ppid->title }}" readonly>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Publikasi</label>
                                        <input type="text" class="form-control bg-light" value="{{ $ppid->publish_date->translatedFormat('d F Y') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Download</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-download"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light text-primary font-weight-bold" 
                                                   value="{{ number_format($ppid->download_count, 0, ',', '.') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">File Dokumen</label>
                                <div class="d-flex align-items-center">
                                    @if($ppid->filename)
                                    <a href="{{ asset('storage/ppid/'.$ppid->filename) }}" class="btn btn-primary px-4 py-2 mx-2" download>
                                        <i class="fas fa-file-pdf mr-2"></i> Unduh
                                    </a>
                                    <span class="text-muted ml-3">{{ $ppid->filename }}</span>
                                    @else
                                    <span class="text-muted">Tidak ada file terlampir</span>
                                    @endif
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea class="form-control bg-light" rows="4" readonly>{{ $ppid->description }}</textarea>
                    </div>

                    <div class="action-buttons mt-4 text-end">
                        <a href="{{ route('ppids.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                        
                        <a href="{{ route('ppids.edit', $ppid->id) }}" class="btn btn-warning ml-2">
                            <i class="fas fa-edit mr-2"></i> Edit Dokumen
                        </a>
                        
                        <form action="{{ route('ppids.destroy', $ppid->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                <i class="fas fa-trash mr-2"></i> Hapus Dokumen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 0.5rem;
    }
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }
    .form-control[readonly], .form-control-plaintext[readonly] {
        background-color: #f8f9fa !important;
        cursor: not-allowed;
        border: 1px solid #ced4da;
    }
    textarea {
        resize: none;
    }
    .input-group-text {
        background-color: #e9ecef;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }
</style>
@endsection