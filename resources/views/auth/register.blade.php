<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SICLEAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Gunakan style yang sama dengan login */
        body {
            /* Mengubah background gradien dari biru muda ke ungu */
            background: linear-gradient(135deg, #74b9ff, #a29bfe);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }
        
        .login-container {
            width: 100%;
            max-width: 900px;
            height: 600px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
            overflow: hidden;
            background: white;
            display: flex;
        }
        
        .brand-section {
            width: 40%;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .brand-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            animation: pulse 4s infinite alternate;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }
            100% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }
        
        .brand-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        .brand-name {
            font-size: 2.5rem;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .brand-tagline {
            font-size: 1rem;
            opacity: 0.9;
            text-align: center;
        }
        
        .login-section {
            width: 60%;
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-control {
            border-radius: 50px;
            padding: 12px 20px 12px 45px;
            border: 1px solid #ddd;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }
        
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 1.2rem;
        }
        
        /* Style untuk tombol mata */
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .password-toggle:hover {
            color: #3498db;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 12px 0;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(1px);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }
        
        .register-link a {
            color: #3498db;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                height: auto;
                max-width: 400px;
            }
            
            .brand-section {
                width: 100%;
                height: 150px;
                padding: 1rem;
            }
            
            .brand-icon {
                font-size: 3rem;
            }
            
            .brand-name {
                font-size: 1.8rem;
            }
            
            .login-section {
                width: 100%;
                padding: 1.5rem;
            }
        }
        
        /* Loading animation */
        .loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .loading span {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #3498db;
            margin: 0 5px;
            animation: loading 1.4s infinite ease-in-out both;
        }
        
        .loading span:nth-child(1) {
            animation-delay: -0.32s;
        }
        
        .loading span:nth-child(2) {
            animation-delay: -0.16s;
        }
        
        @keyframes loading {
            0%, 80%, 100% {
                transform: scale(0);
                opacity: 0.5;
            }
            40% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .form-container {
            position: relative;
        }
        
        .form-container.loading .form-control,
        .form-container.loading .btn-login {
            opacity: 0.7;
            pointer-events: none;
        }
        
        .form-container.loading .loading {
            display: block;
        }
    </style>
</head>
<body>
    <div class="login-container animate__animated animate__fadeInUp">
        <!-- Brand Section -->
        <div class="brand-section">
            <i class="fas fa-soap brand-icon"></i>
            <h1 class="brand-name">SICLEAN</h1>
            <p class="brand-tagline">Layanan Laundry Terpercaya</p>
        </div>
        
        <!-- Register Section -->
        <div class="login-section">
            <h2 class="login-title">DAFTAR AKUN</h2>
            
            @if(session('error'))
                <div class="alert alert-danger animate__animated animate__shakeX">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('register') }}" class="form-container" id="registerForm">
                @csrf
                <div class="form-group">
                    <i class="fas fa-user form-icon"></i>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" placeholder="Nama Lengkap" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" placeholder="Email" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye-slash password-toggle" id="togglePassword"></i>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                           id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    <i class="fas fa-eye-slash password-toggle" id="togglePasswordConfirm"></i>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-login">
                    <span class="btn-text">Daftar</span>
                </button>
                
                <div class="loading">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </form>
            
            <div class="register-link animate__animated animate__fadeIn">
                Sudah mempunyai akun? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            
            registerForm.addEventListener('submit', function() {
                // Show loading animation
                this.classList.add('loading');
                
                // Prevent multiple submissions
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.disabled = true;
            });
            
            // Toggle password visibility for password field
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Toggle the eye icon
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Toggle password visibility for password confirmation field
            const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
            const passwordConfirmInput = document.getElementById('password_confirmation');
            
            togglePasswordConfirm.addEventListener('click', function() {
                // Toggle the type attribute
                const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.setAttribute('type', type);
                
                // Toggle the eye icon
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>