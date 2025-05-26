<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Desa Gampong Baro</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #2c7a3e;
            --primary-light: #4caf50;
            --primary-dark: #1e5631;
            --text: #333333;
            --text-light: #666666;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f8f9fa;
            min-height: 99vh;
            background-image: linear-gradient(rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.92)), 
                              url('https://images.unsplash.com/photo-1500380804539-4e1e8c1e7118?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .login-container {
            max-width: 540px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        
        
        .login-header {
            background-color: var(--primary);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .login-body {
            padding: 1rem;
            background-color: white;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
        }
        
        .title {
            color: var(--primary-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .subtitle {
            color: var(--text-light);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(44, 122, 62, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
        }
        
        .footer-text {
            font-size: 0.9rem;
            color: var(--text-light);
        }
        
        .footer-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center p-3">
    <div class="login-container w-100">
        <div class="login-header">
            <svg class="logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L3 7L5 8.18V15.18L12 20L19 15.18V8.18L21 7L12 2Z" fill="white"/>
                <path d="M12 2L3 7L5 8.18V15.18L12 20L19 15.18V8.18L21 7L12 2ZM12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9C14 10.1046 13.1046 11 12 11ZM16 15C16 13.3431 14.6569 12 13 12H11C9.34315 12 8 13.3431 8 15V16H16V15Z" fill="var(--primary)"/>
            </svg>
            <h4 class="mb-0">Manajemen Desa Gampong Baro</h4>
        </div>
        
        <div class="login-body">
            <h2 class="title text-center">Selamat Datang</h2>
            <p class="subtitle text-center">Silakan masuk dengan akun Anda</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" 
                               autofocus placeholder="email@contoh.com">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                    </button>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div> --}}
                    {{-- <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa password?</a> --}}
                </div>
            </form>
        </div>
        
        <div class="login-body pt-0 text-center">
            <p class="footer-text mb-0">
                © {{ date('Y') }} Desa Gampong Baro. All rights reserved.
            </p>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>