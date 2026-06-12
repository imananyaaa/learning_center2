<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User - Learning Center</title>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 50%, #90CAF9 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
            text-align: center;
            padding: 20px;
        }

        .brand-logo-wrap {
            width: 80px;
            height: 80px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 4px 20px rgba(21, 101, 192, 0.2);
        }

        .brand-logo-wrap img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        h1 {
            color: #1A237E;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .subtitle {
            font-size: 0.8rem;
            color: #546E7A;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 35px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,.15);
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1d2d86;
            font-weight: 600;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 16px;
            color: #999;
        }

        input {
            width: 100%;
            height: 50px;
            padding-left: 45px;
            border-radius: 15px;
            border: 2px solid #d6e5f5;
            background: #f6fbff;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .btn-register {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 15px;
            background: #2563eb;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #1748ad;
        }

        .footer-link {
            margin-top: 20px;
            text-align: center;
        }

        .footer-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        .back {
            text-align: center;
            margin-top: 25px;
        }

        .back a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

    </style>

</head>

<body>

<div class="container">

    <!-- Logo -->
    <div class="brand-logo-wrap">
        <img src="{{ asset('images/logo lc.png') }}" alt="Logo Learning Center">
    </div>
    <h1>Register User</h1>
    <p class="subtitle">
        Daftar untuk memberikan ulasan fasilitas
    </p>


    <div class="card">

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <!-- Nama -->
            <label>Nama Lengkap</label>
            <div class="input-group">
                <i class="bi bi-person"></i>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required>
            </div>


            <!-- Email -->
            <label>Email</label>
            <div class="input-group">
                <i class="bi bi-envelope"></i>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required>
            </div>


            <!-- Password -->
            <label>Password</label>
            <div class="input-group">
                <i class="bi bi-lock"></i>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>
            </div>


            <!-- Konfirmasi -->
            <label>Konfirmasi Password</label>
            <div class="input-group">
                <i class="bi bi-shield-lock"></i>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required>
            </div>


            <button class="btn-register">
                <i class="bi bi-person-plus"></i>
                Daftar Sekarang
            </button>


        </form>

    </div>


    <div class="back">
        <a href="{{ route('home') }}">
            ← Kembali ke Beranda
        </a>
    </div>


</div>

</body>
</html>
