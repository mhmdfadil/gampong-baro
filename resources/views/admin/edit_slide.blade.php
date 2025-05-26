@extends('components.app')

@section('title', 'Edit Slide')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-edit"></i> Edit Slide
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Formulir Edit Slide
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Edit data slide</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('slides.update', $slide->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Judul Slide</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                           name="title" value="{{ old('title', $slide->title) }}" required autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Deskripsi Singkat</label>
                                    <textarea id="description_singkat" class="form-control @error('description_singkat') is-invalid @enderror" 
                                              name="description_singkat" rows="3" required>{{ old('description_singkat', $slide->description_singkat) }}</textarea>
                                    @error('description_singkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Teks Tombol</label>
                                    <input id="text_button" type="text" class="form-control @error('text_button') is-invalid @enderror" 
                                           name="text_button" value="{{ old('text_button', $slide->text_button) }}" required>
                                    @error('text_button')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Route Tujuan</label>
                                    <select id="routes" class="form-select @error('routes') is-invalid @enderror" name="routes" required>
                                        @foreach($routeOptions as $value => $label)
                                            <option value="{{ $value }}" {{ old('routes', $slide->routes) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('routes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">Gambar Slide Saat Ini</label>
                                    <div class="mb-3">
                                        @if($slide->image)
                                            <img src="{{ asset('storage/slides/' . $slide->image) }}" 
                                                 alt="{{ $slide->title }}" 
                                                 class="img-thumbnail" 
                                                 style="max-width: 300px; max-height: 200px;">
                                        @else
                                            <p class="text-muted">Tidak ada gambar yang diunggah</p>
                                        @endif
                                    </div>
                                    
                                    <label class="font-weight-bold">Ubah Gambar (Opsional)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                               id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih file baru...</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, JPEG, GIF. Maksimal 2MB.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('slides.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i> Perbarui Slide
                            </button>
                        </div>
                    </form>
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
    .custom-file-label::after {
        content: "Browse";
    }
    .img-thumbnail {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 0.25rem;
        background-color: #fff;
    }
</style>

<script>
    // Update file input label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : "Pilih file baru...";
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection