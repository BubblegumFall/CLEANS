<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SICLEAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            background: #43475eff;
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
            /* ukuran ikon besar */
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
            /* transparan putih */
            opacity: 0;
            animation: dropInLogo 1.2s ease-out forwards;
        }

        .right {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Gradient + pola pattern */
            background: linear-gradient(135deg, #f8f9ff 0%, #e6e9ff 100%);
            position: relative;
            overflow: hidden;
        }

        /* Pattern lingkaran transparan */
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
            color: #43475eff;
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
            border-color: #43475eff;
            box-shadow: 0 0 8px rgba(58, 90, 254, 0.4);
            outline: none;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background: #43475eff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-box button:hover {
            background: #43475eff;
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(58, 90, 254, 0.4);
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Animasi */
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
        <!-- Icon Naga -->
        <i class="fas fa-moon logo-naga-animated"></i>
        <h1>SICLEAN</h1>
    </div>

    <div class="right">
        <div class="login-box">
            <h2>REGISTER</h2>
            @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
            @endif
            <form action="{{ url('/register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Daftar Sebagai</label>
                            <select name="role" class="form-select" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="pelanggan">Pelanggan</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
            <br>
            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</body>

</html>