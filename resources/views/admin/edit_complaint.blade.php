@extends('components.app')

@section('title', 'Ubah Status Pengaduan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-edit"></i> Ubah Status Pengaduan
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-cog mr-1"></i> Perbarui Status
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Perbarui status pengaduan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('complaint.update', $pengaduan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor Pengaduan</label>
                                    <input type="text" class="form-control bg-light" value="{{ $pengaduan->nomor_pengaduan }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Pengaduan</label>
                                    <input type="text" class="form-control bg-light" 
                                           value="{{ $pengaduan->tanggal_pengaduan ? $pengaduan->tanggal_pengaduan->format('d/m/Y H:i') : '-' }}" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Pengadu</label>
                                    <input type="text" class="form-control bg-light" value="{{ $pengaduan->nama }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kontak</label>
                                    <input type="text" class="form-control bg-light" value="{{ $pengaduan->kontak }}" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Kategori</label>
                                    <input type="text" class="form-control bg-light" value="{{ $pengaduan->kategori }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="status">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        @php
                                            $statusOptions = [
                                                'baru' => 'Baru',
                                                'diproses' => 'Diproses',
                                                'selesai' => 'Selesai',
                                                'ditolak' => 'Ditolak'
                                            ];
                                        @endphp
                                        
                                        @foreach($statusOptions as $value => $label)
                                            <option value="{{ $value }}" 
                                                {{ $pengaduan->status == $value ? 'selected' : '' }}
                                                @if($value == 'baru') class="text-secondary"
                                                @elseif($value == 'diproses') class="text-warning"
                                                @elseif($value == 'selesai') class="text-success"
                                                @elseif($value == 'ditolak') class="text-danger" @endif>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Isi Pengaduan</label>
                            <textarea class="form-control bg-light" rows="5" readonly>{{ $pengaduan->isi_pengaduan }}</textarea>
                        </div>
                        
                        @if(!empty($pengaduan->lampiran) && count($pengaduan->lampiran) > 0)
                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Lampiran</label>
                            <div class="row">
                                @foreach($pengaduan->getLampiranUrls() as $url)
                                    @if($url)
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body p-2 text-center">
                                                    @php
                                                        $extension = strtolower(pathinfo($url, PATHINFO_EXTENSION));
                                                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                                                    @endphp
                                                    
                                                    @if(in_array($extension, $imageExtensions))
                                                        <img src="{{ $url }}" class="img-fluid mb-2" 
                                                             style="max-height: 150px; object-fit: contain;"
                                                             onerror="this.onerror=null;this.src='{{ asset('assets/img/file-placeholder.png') }}';">
                                                    @else
                                                        <i class="fas fa-file-alt fa-4x text-secondary mb-2"></i>
                                                        <p class="mb-1 text-truncate">{{ basename($url) }}</p>
                                                    @endif
                                                    <a href="{{ $url }}" target="_blank" 
                                                       class="btn btn-sm btn-primary w-100">
                                                        <i class="fas fa-download mr-1"></i> Unduh
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('complaint.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
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
    .form-control[readonly] {
        background-color: #f8f9fa !important;
    }
    .card {
        border-radius: 0.5rem;
    }
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }
    /* Style for status options */
    option.text-secondary { color: #6c757d; font-weight: bold; }
    option.text-warning { color: #ffc107; font-weight: bold; }
    option.text-success { color: #28a745; font-weight: bold; }
    option.text-danger { color: #dc3545; font-weight: bold; }
</style>
@endsection