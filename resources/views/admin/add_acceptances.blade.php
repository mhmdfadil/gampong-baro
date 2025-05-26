@extends('components.app')

@section('title', 'Tambah Sambutan Baru')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-plus-circle"></i> Tambah Sambutan Baru
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Formulir Sambutan
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Isi data sambutan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('acceptances.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Judul Sambutan</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                           id="title" name="title" required
                                           value="{{ old('title') }}" placeholder="Masukkan judul sambutan">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Pejabat</label>
                                    <input type="text" class="form-control @error('official_name') is-invalid @enderror" 
                                           id="official_name" name="official_name" required
                                           value="{{ old('official_name') }}" placeholder="Masukkan nama pejabat">
                                    @error('official_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Jabatan</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" 
                                           id="position" name="position" required
                                           value="{{ old('position') }}" placeholder="Masukkan jabatan">
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Foto Pejabat</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                                           id="photo" name="photo" accept="image/*">
                                    <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Salam Pembuka</label>
                                    <input type="text" class="form-control @error('greeting_opening') is-invalid @enderror" 
                                           id="greeting_opening" name="greeting_opening" required
                                           value="{{ old('greeting_opening', 'Assalamualaikum Warahmatullahi Wabarakatuh') }}" 
                                           placeholder="Masukkan salam pembuka">
                                    @error('greeting_opening')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Salam Penutup</label>
                                    <input type="text" class="form-control @error('greeting_closing') is-invalid @enderror" 
                                           id="greeting_closing" name="greeting_closing" required
                                           value="{{ old('greeting_closing', 'Wassalamualaikum Warahmatullahi Wabarakatuh') }}" 
                                           placeholder="Masukkan salam penutup">
                                    @error('greeting_closing')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Isi Sambutan</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" 
                                      rows="5" required placeholder="Masukkan isi sambutan">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kutipan (Opsional)</label>
                                    <input type="text" class="form-control @error('quote') is-invalid @enderror" 
                                           id="quote" name="quote"
                                           value="{{ old('quote') }}" placeholder="Masukkan kutipan (opsional)">
                                    @error('quote')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Gambar Tanda Tangan</label>
                                    <input type="file" class="form-control @error('signature_image') is-invalid @enderror" 
                                           id="signature_image" name="signature_image" accept="image/*">
                                    <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                                    @error('signature_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
    <div class="form-check form-switch">
        <!-- Hidden input to submit 0 if checkbox is unchecked -->
        <input type="hidden" name="is_active" value="0">

        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
            @checked(old('is_active', true))>
        
        <label class="form-check-label font-weight-bold" for="is_active">Aktifkan Sambutan</label>
    </div>
</div>

                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('acceptances.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i> Simpan
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
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
    }
</style>
@endsection