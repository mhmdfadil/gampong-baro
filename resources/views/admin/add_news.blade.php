@extends('components.app')

@section('title', 'Tambah Berita Baru')

@section('content')
<!-- Trix Editor CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

<!-- Animate.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-newspaper"></i> Tambah Berita Baru
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Formulir Berita
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Isi data berita</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Judul Berita</label>
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                                           name="title" value="{{ old('title') }}" required autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Ringkasan (10 kata pertama)</label>
                                    <textarea id="excerpt" class="form-control @error('excerpt') is-invalid @enderror" 
                                              name="excerpt" rows="3" required>{{ Str::words(old('excerpt'), 10, '...') }}</textarea>
                                    @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Ringkasan otomatis diambil dari 10 kata pertama konten.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kategori</label>
                                    <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                           id="category" name="category" value="{{ old('category') }}" required>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Warna Kategori</label>
                                    <select class="form-select @error('category_color') is-invalid @enderror" 
                                            id="category_color" name="category_color" required>
                                        <option value="">Pilih Warna</option>
                                        @foreach($categoryColors as $value => $label)
                                            <option value="{{ $value }}" @selected(old('category_color') == $value)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Konten Berita</label>
                            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                            <trix-editor input="content" class="trix-content form-control @error('content') is-invalid @enderror"></trix-editor>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Gambar Berita</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                       id="image" name="image" required>
                                <label class="custom-file-label" for="image">Pilih gambar...</label>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="form-text text-muted">
                                Format: JPG, PNG. Maksimal 2MB.
                            </small>
                        </div>

                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('news.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i> Simpan Berita
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
    /* Trix editor customizations */
    .trix-content {
        min-height: 300px;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 0.5rem;
    }
    trix-toolbar .trix-button-group--file-tools {
        display: none !important;
    }
    .trix-button-group--block-tools {
        display: flex !important;
    }
    .trix-button--icon-attach {
        display: none !important;
    }
</style>

<script>
    // Update file input label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

    // Auto-generate excerpt from content
    document.addEventListener('trix-change', function(event) {
        const content = event.target.editor.getDocument().toString();
        const excerpt = content.split(/\s+/).slice(0, 10).join(' ') + '...';
        document.getElementById('excerpt').value = excerpt;
    });

    // Prevent file uploads in Trix editor
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
</script>
@endsection