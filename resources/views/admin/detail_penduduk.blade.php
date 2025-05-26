@extends('components.app')

@section('title', 'Detail Data Penduduk')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class=""></i> Detail Data Penduduk
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
                    <h6 class="m-0 font-weight-bold">Data Pribadi</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NIK</label>
                                        <input type="text" class="form-control bg-light font-weight-bold" value="{{ $penduduk->nik }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Lengkap</label>
                                        <input type="text" class="form-control bg-light font-weight-bold" value="{{ $penduduk->nama_lengkap }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tempat Lahir</label>
                                        <input type="text" class="form-control bg-light" value="{{ $penduduk->tempat_lahir }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Tanggal Lahir</label>
                                        <input type="text" class="form-control bg-light" value="{{ $penduduk->tanggal_lahir->format('d-m-Y') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Jenis Kelamin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    @if($penduduk->jenis_kelamin == 'L')
                                                        <i class="fas fa-male text-primary"></i>
                                                    @else
                                                        <i class="fas fa-female text-danger"></i>
                                                    @endif
                                                </span>
                                            </div>
                                            <input type="text" class="form-control bg-light" 
                                                   value="{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <textarea class="form-control bg-light" rows="2" readonly>{{ $penduduk->alamat }}</textarea>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Dusun</label>
                                        <input type="text" class="form-control bg-light" value="{{ $penduduk->dusun }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nomor KK</label>
                                        <input type="text" class="form-control bg-light" value="{{ $penduduk->no_kk ?? '-' }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-info text-white">
                            <h6 class="m-0 font-weight-bold">Informasi Tambahan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Agama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pray"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light" value="{{ $penduduk->agama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Status Perkawinan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-heart"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light" value="{{ $penduduk->status_perkawinan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pendidikan Terakhir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light" value="{{ $penduduk->pendidikan_terakhir }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Pekerjaan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            </div>
                                            <input type="text" class="form-control bg-light" value="{{ $penduduk->pekerjaan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Status Keluarga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>
                                    <input type="text" class="form-control bg-light" value="{{ $penduduk->status_keluarga }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold">Catatan</label>
                                <textarea class="form-control bg-light" rows="2" readonly>{{ $penduduk->catatan ?? '-' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mr-3  mx-2">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-plus mr-1"></i> Dibuat: {{ $penduduk->created_at->format('d-m-Y H:i') }}
                                    </small>
                                </div>
                                <div>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-check mr-1"></i> Diupdate: {{ $penduduk->updated_at->format('d-m-Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('penduduks.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>
                            <a href="{{ route('penduduks.edit', $penduduk->id) }}" class="btn btn-warning ml-2">
                                <i class="fas fa-edit mr-2"></i> Edit Data
                            </a>
                            <form action="{{ route('penduduks.destroy', $penduduk->id) }}" method="POST" class="d-inline">
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