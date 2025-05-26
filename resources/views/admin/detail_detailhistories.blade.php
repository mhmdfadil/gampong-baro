@extends('components.app')

@section('title', 'Rincian Sejarah')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i> Rincian Sejarah: {{ $detailhistory->year }}
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
                <div class="card-header py-3 {{ $detailhistory->bg_year }} text-white">
                    <h6 class="m-0 font-weight-bold">Data Tahun {{ $detailhistory->year }}</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tahun</label>
                                        <input type="text" class="form-control bg-light font-weight-bold" value="{{ $detailhistory->year }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Warna Tahun</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-palette"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control bg-light" value="{{ $detailhistory->bg_year }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control bg-light" value="{{ $detailhistory->title }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-info text-white">
                            <h6 class="m-0 font-weight-bold">Deskripsi</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Singkat</label>
                                <textarea class="form-control bg-light" rows="3" readonly>{{ $detailhistory->description_singkat }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mr-3 mx-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-plus mr-1"></i> Dibuat: {{ $detailhistory->created_at->format('d-m-Y H:i') }}
                                    </small>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-check mr-1"></i> Diupdate: {{ $detailhistory->updated_at->format('d-m-Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('detailhistories.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>
                            <a href="{{ route('detailhistories.edit', $detailhistory->id) }}" class="btn btn-warning ml-2">
                                <i class="fas fa-edit mr-2"></i> Edit Data
                            </a>
                            <form action="{{ route('detailhistories.destroy', $detailhistory->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash mr-2"></i> Hapus Data
                                </button>
                            </form>
                        </div>
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
    .btn-warning {
        background-color: #f6c23e;
        border-color: #f6c23e;
    }
    .btn-warning:hover {
        background-color: #dda20a;
        border-color: #d29400;
    }
    .bg-info {
        background-color: #36b9cc !important;
    }
</style>
@endsection