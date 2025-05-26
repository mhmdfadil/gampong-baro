@extends('components.app')

@section('title', $news->title)

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-newspaper"></i> Detail Berita
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
                    <h6 class="m-0 font-weight-bold">{{ $news->title }}</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Kategori</label>
                                <input type="text" class="form-control bg-light font-weight-bold" 
                                       value="{{ $news->category }}" readonly>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Publikasi</label>
                                        <input type="text" class="form-control bg-light" 
                                               value="{{ $news->created_at->translatedFormat('d F Y H:i') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jumlah Dilihat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light text-primary font-weight-bold" 
                                                   value="{{ number_format($news->views, 0, ',', '.') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar Utama</label>
                                <div class="text-center">
                                    <img src="{{ $news->image ? asset('storage/berita/' . $news->image) : asset('storage/berita/default-news.jpg') }}" 
                                         alt="{{ $news->title }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px;"
                                         onerror="this.onerror=null;this.src='{{ asset('storage/berita/default-news.jpg') }}'">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Ringkasan</label>
                        <textarea class="form-control bg-light" rows="3" readonly>{{ $news->excerpt }}</textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Konten Berita</label>
                        <div class="trix-content bg-light p-3 rounded">
                            {!! $news->content !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Penulis</label>
                        <input type="text" class="form-control bg-light" value="{{ $news->author }}" readonly>
                    </div>

                    <div class="action-buttons mt-4 text-end">
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                        
                        <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning ml-2">
                            <i class="fas fa-edit mr-2"></i> Edit Berita
                        </a>
                        
                        <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                <i class="fas fa-trash mr-2"></i> Hapus Berita
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
    .trix-content {
        min-height: 200px;
        border: 1px solid #ced4da;
    }
    .trix-content img {
        max-width: 100%;
        height: auto;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection