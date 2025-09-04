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
            background: #43475e;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .left h1 {
            font-size: 36px;
            letter-spacing: 2px;
            animation: slideIn 1s ease-out;
        }

        .left .logo-naga-animated {
            font-size: 180px;
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
            opacity: 0;
            animation: dropInLogo 1.2s ease-out forwards;
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

        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        .login-box input:focus {
            border-color: #43475e;
            box-shadow: 0 0 8px rgba(58, 90, 254, 0.4);
            outline: none;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background: #43475e;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-box button:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(58, 90, 254, 0.4);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
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

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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
    </style>
</head>

<body>
    <div class="left">
        <i class="fas fa-dragon logo-naga-animated"></i>
        <h1>SICLEAN</h1>
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

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login</button>

                <div class="register-link" style="margin-top: 15px;">
                    Belum mempunyai akun? <a href="{{ route('register') }}">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
