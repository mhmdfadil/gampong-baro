@extends('components.app')

@section('title', 'Edit Data Penduduk')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-12">
            <div class="page-header mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-user-edit"></i> Edit Data Penduduk
                        </h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <i class="fas fa-info-circle mr-1"></i> Formulir Penduduk
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Edit data penduduk</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('penduduks.update', $penduduk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NIK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                           name="nik" value="{{ old('nik', $penduduk->nik) }}" 
                                           placeholder="Masukkan 16 digit NIK" maxlength="16" required autofocus>
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" 
                                           name="nama_lengkap" value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" 
                                           placeholder="Masukkan nama lengkap" required>
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                           name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" 
                                           placeholder="Masukkan tempat lahir" required>
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                           name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir->format('Y-m-d')) }}" required>
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                            name="jenis_kelamin" required>
                                        <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor KK</label>
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror" 
                                           name="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" 
                                           placeholder="Masukkan nomor KK">
                                    @error('no_kk')
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
                                    <label class="font-weight-bold">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-select @error('alamat') is-invalid @enderror" 
                                              name="alamat" rows="2" placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $penduduk->alamat) }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">Dusun <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror" 
                                           name="dusun" value="{{ old('dusun', $penduduk->dusun) }}" 
                                           placeholder="Masukkan nama dusun" required>
                                    @error('dusun')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold">Status Keluarga <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status_keluarga') is-invalid @enderror" 
                                            name="status_keluarga" required>
                                        <option value="Kepala Keluarga" {{ old('status_keluarga', $penduduk->status_keluarga) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                        <option value="Istri" {{ old('status_keluarga', $penduduk->status_keluarga) == 'Istri' ? 'selected' : '' }}>Istri</option>
                                        <option value="Anak" {{ old('status_keluarga', $penduduk->status_keluarga) == 'Anak' ? 'selected' : '' }}>Anak</option>
                                        <option value="Lainnya" {{ old('status_keluarga', $penduduk->status_keluarga) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('status_keluarga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Agama <span class="text-danger">*</span></label>
                                    <select class="form-select @error('agama') is-invalid @enderror" 
                                            name="agama" required>
                                        <option value="Islam" {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Budha" {{ old('agama', $penduduk->agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="Konghucu" {{ old('agama', $penduduk->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                    @error('agama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status_perkawinan') is-invalid @enderror" 
                                            name="status_perkawinan" required>
                                        <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                    </select>
                                    @error('status_perkawinan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                    <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" 
                                            name="pendidikan_terakhir" required>
                                        <option value="Tidak Sekolah" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                        <option value="SD" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="Diploma" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                        <option value="Sarjana" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Sarjana' ? 'selected' : '' }}>Sarjana</option>
                                        <option value="Pascasarjana" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                                    </select>
                                    @error('pendidikan_terakhir')
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
                                    <label class="font-weight-bold">Pekerjaan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('pekerjaan') is-invalid @enderror" 
                                            name="pekerjaan" required>
                                        <option value="Petani" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Petani' ? 'selected' : '' }}>Petani</option>
                                        <option value="PNS" {{ old('pekerjaan', $penduduk->pekerjaan) == 'PNS' ? 'selected' : '' }}>PNS</option>
                                        <option value="Wiraswasta" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                        <option value="Buruh" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                        <option value="Pelajar/Mahasiswa" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                        <option value="Ibu Rumah Tangga" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                        <option value="Lainnya" {{ old('pekerjaan', $penduduk->pekerjaan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="action-buttons mt-4 text-end">
                            <a href="{{ route('penduduks.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <button type="reset" class="btn btn-warning ml-2">
                                <i class="fas fa-undo mr-2"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary ml-2">
                                <i class="fas fa-save mr-2"></i> Update Data
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
    .form-control, .form-select {
        border-radius: 0.375rem;
    }
    .action-buttons .btn {
        min-width: 120px;
    }
    .text-danger {
        color: #dc3545 !important;
    }
</style>

<script>
    // Auto-format NIK input
    document.querySelector('input[name="nik"]').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection