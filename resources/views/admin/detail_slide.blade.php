@extends('components.app')

@section('title', 'Detail Slide')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-image"></i> Detail Slide
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Informasi Slide
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Detail Informasi Slide</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($slide->image)
                                <div class="mb-4">
                                    <img src="{{ asset('storage/slides/' . $slide->image) }}" 
                                         alt="{{ $slide->title }}" 
                                         class="img-fluid rounded border"
                                         style="max-height: 300px; width: 100%; object-fit: cover;">
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i> Tidak ada gambar tersedia
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Judul Slide</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $slide->title }}</p>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Route</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $slide->routes }}</p>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Deskripsi Singkat</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $slide->description_singkat }}</p>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Teks Tombol</label>
                                <p class="form-control-plaintext border-bottom pb-2">{{ $slide->text_button }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons mt-4 text-end">
                        <a href="{{ route('slides.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                        <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-primary ml-2">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
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
    .form-control-plaintext {
        min-height: 2.5rem;
    }
</style>
@endsection