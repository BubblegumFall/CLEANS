<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SICLEAN</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .left {
            width: 50%;
            background: #0ea5e9;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .left::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 20%, transparent 20%);
            background-size: 30px 30px;
            animation: movePattern 15s linear infinite;
            z-index: 1;
        }
        @keyframes movePattern {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(30px, 30px);
            }
        }
        .left h1 {
            font-size: 36px;
            letter-spacing: 2px;
            animation: slideIn 1s ease-out;
            position: relative;
            z-index: 2;
        }
        .left .logo-naga-animated {
            font-size: 180px;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
            opacity: 0;
            animation: dropInLogo 1.2s ease-out forwards;
            position: relative;
            z-index: 2;
        }
        .left .bubble {
            position: absolute;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
            z-index: 1;
        }
        @keyframes float {
            0%, 100% {
                transform: translateY(0) scale(1);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px) scale(1.1);
                opacity: 0.9;
            }
        }
        .right {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #f8f9ff 0%, #e6e9ff 100%);
            position: relative;
            overflow: hidden;
        }
        .right::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            background-image: radial-gradient(circle, rgba(58, 90, 254, 0.05) 20%, transparent 20%);
            background-size: 60px 60px;
            animation: movePattern 20s linear infinite;
        }
        @keyframes movePattern {
            from {
                transform: translate(0, 0);
            }
            to {
                transform: translate(-60px, -60px);
            }
        }
        .login-box {
            width: 80%;
            max-width: 350px;
            text-align: center;
            animation: fadeIn 1.2s ease-out;
            position: relative;
            z-index: 2;
        }
        .login-box h2 {
            color: #43475e;
            margin-bottom: 20px;
            animation: dropIn 1s ease-out;
        }
        .input-group {
            position: relative;
            margin: 15px 0;
        }
        .login-box input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            margin: 5px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
        }
        .login-box input:focus {
            border-color: #43475e;
            box-shadow: 0 0 8px #0ea5e9;
            outline: none;
            transform: translateY(-2px);
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            background: #0ea5e9;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }
        .login-box button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px #0ea5e9;
        }
        .login-box button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        .login-box button:hover::before {
            left: 100%;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes dropIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes dropInLogo {
            0% {
                opacity: 0;
                transform: translateY(-50px) scale(0.8);
            }
            60% {
                opacity: 1;
                transform: translateY(10px) scale(1.05);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #43475e;
            transition: color 0.3s;
        }
        .password-toggle:hover {
            color: #0ea5e9;
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
            color: #43475e;
        }
        .register-link a {
            color: #0ea5e9;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg"><path fill="%23ffffff" fill-opacity="0.3" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            animation: wave 10s linear infinite;
            z-index: 1;
        }
        @keyframes wave {
            0% { background-position-x: 0; }
            100% { background-position-x: 1440px; }
        }
    </style>
</head>
<body>
    <div class="left">
        <div class="bubble" style="width: 80px; height: 80px; top: 20%; left: 10%; animation-delay: 0s;"></div>
        <div class="bubble" style="width: 120px; height: 120px; top: 60%; left: 80%; animation-delay: 2s;"></div>
        <div class="bubble" style="width: 60px; height: 60px; top: 40%; left: 70%; animation-delay: 4s;"></div>
        <div class="bubble" style="width: 100px; height: 100px; top: 70%; left: 20%; animation-delay: 1s;"></div>
        <i class="fa-solid fa-jug-detergent logo-naga-animated"></i>
        <h1>SICLEAN</h1>
        <div class="wave"></div>
    </div>
    <div class="right">
        <div class="login-box">
            <h2>WELCOME</h2>
            {{-- Error message --}}
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif
            {{-- Success message --}}
            @if(session('success'))
                <div style="color: green; font-size:14px; margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye-slash password-toggle" id="togglePassword"></i>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="register-link">
                Belum mempunyai akun? <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Add animation to form inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
    <!-- Tambahkan di bagian bawah halaman login, sebelum penutup body -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Periksa jika ada parameter success di URL
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');
        
        if (success === 'login') {
            // Simpan flag di localStorage
            localStorage.setItem('loginSuccess', 'true');
            
            // Hapus parameter dari URL
            const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            window.history.replaceState({}, document.title, newUrl);
        }
    });
</script>
</body>
</html>