@extends('components.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-shopping-bag"></i> Detail Produk
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        @if($product->badge)
                            <span class="badge {{ $product->badge_class }} rounded-pill px-3 py-2 me-2">
                                <i class="fas fa-tag mr-1"></i> {{ $product->badge }}
                            </span>
                        @endif
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Informasi Lengkap
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Detail produk belanja</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @php
                                $imagePath = 'storage/belanja/' . $product->image;
                                $defaultImage = 'storage/belanja/default-product.jpg';
                                $imageExists = $product->image && file_exists(public_path($imagePath));
                            @endphp
                            <img src="{{ $imageExists ? asset($imagePath) : asset($defaultImage) }}" 
                                 alt="{{ $product->name }}" 
                                 class="img-thumbnail rounded shadow" 
                                 style="max-height: 250px; object-fit: contain;">
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control bg-light font-weight-bold" value="{{ $product->name }}" readonly>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Kategori</label>
                                        <input type="text" class="form-control bg-light" value="{{ $product->category }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Harga</label>
                                        @if($product->original_price)
                                            <div class="d-flex align-items-center">
                                                <span class="text-danger font-weight-bold me-2">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                                <span class="text-decoration-line-through text-muted">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                                            </div>
                                        @else
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="text" class="form-control bg-light text-primary font-weight-bold" 
                                                       value="{{ number_format($product->price, 0, ',', '.') }}" readonly>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Rating</label>
                                        <div class="d-flex align-items-center">
                                            @if($product->rating)
                                                <span class="text-warning me-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= floor($product->rating))
                                                            <i class="fas fa-star"></i>
                                                        @elseif($i == ceil($product->rating) && ($product->rating - floor($product->rating)) > 0)
                                                            <i class="fas fa-star-half-alt"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <span>{{ number_format($product->rating, 1) }}/5</span>
                                            @else
                                                <span class="text-muted">Belum ada rating</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Lokasi</label>
                                        <input type="text" class="form-control bg-light" value="{{ $product->location }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="font-weight-bold">Deskripsi Produk</label>
                        <textarea class="form-control bg-light" rows="4" readonly>{{ $product->description }}</textarea>
                    </div>

                    <div class="action-buttons mt-4 text-end">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                        
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning ml-2">
                            <i class="fas fa-edit mr-2"></i> Edit Produk
                        </a>
                        
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash mr-2"></i> Hapus Produk
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
    .form-control[readonly] {
        background-color: #f8f9fa !important;
        cursor: not-allowed;
    }
    textarea {
        resize: none;
    }
    .img-thumbnail {
        border-radius: 0.5rem;
        box-shadow: 0 0.15rem 0.5rem rgba(0,0,0,.1);
    }
    .input-group-text {
        background-color: #e9ecef;
    }
</style>
@endsection