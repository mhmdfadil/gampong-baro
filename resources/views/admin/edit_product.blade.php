@extends('components.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-edit"></i> Edit Produk
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Formulir Edit
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Perbarui data produk</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Produk</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                           name="name" value="{{ old('name', $product->name) }}" required autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Lokasi</label>
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" 
                                           name="location" value="{{ old('location', $product->location) }}" required>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input id="price" type="number" step="0" class="form-control @error('price') is-invalid @enderror" 
                                               name="price" value="{{ old('price', $product->price) }}" required>
                                    </div>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kategori</label>
                                    <select id="category" class="form-select @error('category') is-invalid @enderror" name="category" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Hasil Pertanian" {{ old('category', $product->category) == 'Hasil Pertanian' ? 'selected' : '' }}>Hasil Pertanian</option>
                                        <option value="Kerajinan Tangan" {{ old('category', $product->category) == 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                        <option value="Makanan Olahan" {{ old('category', $product->category) == 'Makanan Olahan' ? 'selected' : '' }}>Makanan Olahan</option>
                                        <option value="Minuman" {{ old('category', $product->category) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                        <option value="Lainnya" {{ old('category', $product->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Rating (0-5)</label>
                                    <input id="rating" type="number" step="0.1" min="0" max="5" 
                                           class="form-control @error('rating') is-invalid @enderror" 
                                           name="rating" value="{{ old('rating', $product->rating) }}">
                                    @error('rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Gambar Produk</label>
                                    <div class="mb-2">
                                        @php
                                            $imagePath = 'storage/belanja/' . $product->image;
                                            $defaultImage = 'storage/belanja/default-product.jpg'; // Ganti dengan path gambar default Anda
                                        @endphp
                                        <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImage) }}" 
                                             alt="{{ $product->name }}" 
                                             class="img-thumbnail" 
                                             style="max-height: 120px;">
                                    </div>
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
                                        Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, JPEG. Maksimal 2MB.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Harga Asli (Optional)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input id="original_price" type="number" step="0" 
                                               class="form-control @error('original_price') is-invalid @enderror" 
                                               name="original_price" value="{{ old('original_price', $product->original_price) }}">
                                    </div>
                                    @error('original_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Badge (Label Produk)</label>
                                    <input id="badge" type="text" class="form-control @error('badge') is-invalid @enderror" 
                                           name="badge" value="{{ old('badge', $product->badge) }}" placeholder="Contoh: Sale, New, Limited">
                                    @error('badge')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Warna Badge</label>
                            <div class="row">
                                @foreach(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'] as $color)
                                <div class="col-md-3 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="badge_class" 
                                               id="badge_class_{{ $color }}" value="bg-{{ $color }}" 
                                               {{ old('badge_class', $product->badge_class) == 'bg-'.$color ? 'checked' : '' }}>
                                        <label class="form-check-label" for="badge_class_{{ $color }}">
                                            <span class="badge bg-{{ $color }}">Contoh</span>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('badge_class')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi Produk</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" 
                                      name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i> Simpan Perubahan
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
        border-radius: 0.5rem;
        box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,.1);
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