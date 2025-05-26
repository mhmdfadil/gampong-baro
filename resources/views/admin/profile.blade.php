@extends('components.app')

@section('title', 'Edit Profil')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
        --primary-light: #9D4BFF;
        --primary-dark: #4A00E0;
        --text-dark: #2D3748;
        --text-medium: #4A5568;
        --text-light: #718096;
        --bg-light: #F8FAFC;
        --border-light: #E2E8F0;
    }
    
    body {
        background-color: var(--bg-light);
        color: var(--text-medium);
    }
    
    .profile-card {
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        background: white;
    }
    
    .profile-card:hover {
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }
    
    .profile-header {
        background: var(--primary-gradient);
        padding: 2.5rem;
        color: white;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 70%);
        transform: rotate(30deg);
    }
    
    .user-badge {
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        border-radius: 50px;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .form-section {
        padding: 2.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label i {
        color: var(--primary-light);
        font-size: 0.9rem;
    }
    
    .form-control {
        border-radius: 10px;
        padding: 0.85rem 1.25rem;
        border: 1px solid var(--border-light);
        transition: all 0.3s;
        font-size: 0.95rem;
    }
    
    .form-control:focus {
        border-color: var(--primary-light);
        box-shadow: 0 0 0 3px rgba(142, 45, 226, 0.15);
    }
    
    .password-section {
        border-top: 1px solid var(--border-light);
        padding-top: 2rem;
        margin-top: 2rem;
    }
    
    .section-title {
        color: var(--text-dark);
        font-weight: 700;
        position: relative;
        padding-bottom: 0.75rem;
        font-size: 1.25rem;
    }
    
    .section-title::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--primary-gradient);
        border-radius: 4px;
    }
    
    .btn-cancel {
        background-color: white;
        color: var(--text-medium);
        border: 1px solid var(--border-light);
        border-radius: 10px;
        padding: 0.75rem 1.75rem;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-cancel:hover {
        background-color: #F7FAFF;
        border-color: var(--primary-light);
        color: var(--primary-dark);
    }
    
    .btn-save {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.75rem 1.75rem;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(142, 45, 226, 0.25);
    }
    
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(142, 45, 226, 0.35);
        color: white;
    }
    
    .alert {
        border-radius: 10px;
        padding: 1rem 1.25rem;
    }
    
    .alert-success {
        border-left: 4px solid #38A169;
        background-color: #F0FFF4;
        color: #2F855A;
    }
    
    .alert-error {
        border-left: 4px solid #E53E3E;
        background-color: #FFF5F5;
        color: #C53030;
    }
    
    .form-note {
        color: var(--text-light);
        font-size: 0.875rem;
        margin-top: 0.5rem;
        font-style: italic;
    }
    
   
    
    
</style>


@section('content')
<div class="custom-padding">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="profile-card mb35">
                <!-- Header -->
                <div class="profile-header text-center text-md-start">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h2 class="h3 mb-1">Edit Profil</h2>
                            <p class="mb-0 opacity-75">Perbarui informasi profil Anda</p>
                        </div>
                        <span class="user-badge">
                            <i class="fas fa-user me-1"></i>
                            {{ Auth::user()->nama }}
                        </span>
                    </div>
                </div>

                <!-- Form -->
                <div class="form-section">
                    @if(session('success'))
                    <div class="alert alert-success mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any()))
                    <div class="alert alert-error mb-4">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <!-- Nama -->
                            <div class="col-md-6">
                                <label for="nama" class="form-label">
                                    <i class="fas fa-user"></i>
                                    Nama Lengkap
                                </label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                                    class="form-control" placeholder="Masukkan nama lengkap">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope"></i>
                                    Alamat Email
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="form-control" placeholder="Masukkan alamat email">
                            </div>

                            <!-- Alamat -->
                            <div class="col-12">
                                <label for="alamat" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Alamat
                                </label>
                                <textarea id="alamat" name="alamat" rows="3" class="form-control"
                                    placeholder="Masukkan alamat lengkap">{{ old('alamat', $user->alamat) }}</textarea>
                            </div>

                            <!-- No HP -->
                            <div class="col-md-6">
                                <label for="no_hp" class="form-label">
                                    <i class="fas fa-phone"></i>
                                    Nomor HP
                                </label>
                                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                    class="form-control" placeholder="Masukkan nomor telepon">
                            </div>
                        </div>

                        <!-- Password Section -->
                        <div class="password-section">
                            <h3 class="section-title">Ubah Password</h3>
                            <p class="form-note">Biarkan kosong jika tidak ingin mengubah password.</p>

                            <div class="row g-4 mt-3">
                                <!-- Current Password -->
                                <div class="col-md-6">
                                    <label for="current_password" class="form-label">
                                        <i class="fas fa-lock"></i>
                                        Password Saat Ini
                                    </label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control" placeholder="Masukkan password saat ini">
                                </div>

                                <!-- New Password -->
                                <div class="col-md-6">
                                    <label for="new_password" class="form-label">
                                        <i class="fas fa-key"></i>
                                        Password Baru
                                    </label>
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control" placeholder="Masukkan password baru">
                                </div>

                                <!-- Confirm New Password -->
                                <div class="col-md-6">
                                    <label for="new_password_confirmation" class="form-label">
                                        <i class="fas fa-key"></i>
                                        Konfirmasi Password Baru
                                    </label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                        class="form-control" placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5 pt-3">
                            <a href="{{ url('/dashboard') }}" class="btn btn-cancel btn-danger">
                                <i class="fas fa-times me-2"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-save text-light">
                                <i class="fas fa-save me-2"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection


