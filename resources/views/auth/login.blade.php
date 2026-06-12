<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Learning Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 50%, #90CAF9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 440px;
        }

        /* ── Brand Header ── */
        .brand-header {
            text-align: center;
            margin-bottom: 32px;
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

        .brand-header h1 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1A237E;
            margin-bottom: 4px;
        }

        .brand-header p {
            font-size: 0.8rem;
            color: #546E7A;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ── Card ── */
        .login-card {
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 8px 40px rgba(21, 101, 192, 0.15);
        }

        .card-heading {
            text-align: center;
            margin-bottom: 28px;
        }

        .card-heading h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1A237E;
            margin-bottom: 6px;
        }

        .card-heading p {
            font-size: 0.85rem;
            color: #90A4AE;
        }

        /* ── Form ── */
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #1A237E;
            margin-bottom: 6px;
            display: block;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #90A4AE;
            font-size: 1rem;
            z-index: 2;
        }

        .form-control-custom {
            width: 100%;
            padding: 13px 16px 13px 44px;
            border: 2px solid #E3F2FD;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            color: #1A237E;
            background: #F8FBFF;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control-custom:focus {
            border-color: #1565C0;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(21, 101, 192, 0.08);
        }

        .form-control-custom::placeholder {
            color: #B0BEC5;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #90A4AE;
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
            z-index: 2;
        }

        .toggle-password:hover { color: #1565C0; }

        /* Error */
        .error-msg {
            font-size: 0.78rem;
            color: #E53935;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* ── Remember & Forgot ── */
        .extras-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #546E7A;
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #1565C0;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.85rem;
            color: #1565C0;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover { color: #0D47A1; text-decoration: underline; }

        /* ── Button ── */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: #1565C0;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: #0D47A1;
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(21, 101, 192, 0.35);
        }

        .btn-login:active { transform: translateY(0); }

        /* ── Back link ── */
        .back-link {
            text-align: center;
            margin-top: 24px;
            font-size: 0.85rem;
            color: #546E7A;
        }

        .back-link a {
            color: #1565C0;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover { text-decoration: underline; }

        /* ── Alert session status ── */
        .alert-status {
            background: #E8F5E9;
            border: 1px solid #A5D6A7;
            color: #2E7D32;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Divider register */
        .register-divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .register-divider span {
            background: #ffffff;
            padding: 0 15px;
            color: #888;
            font-size: 14px;
        }

        .register-divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
            z-index: -1;
        }

        /* Section register */
        .register-section {
            text-align: center;
            margin-bottom: 15px;
        }

        .register-section p {
            color: #666;
            font-size: 14px;
            margin-bottom: 12px;
        }

        /* Tombol register */
        .btn-register {
            display: inline-block;
            width: 100%;
            padding: 12px;
            border: 2px solid #1e63d0;
            border-radius: 12px;
            color: #1e63d0;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-register:hover {
            background: #1e63d0;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    {{-- Brand --}}
    <div class="brand-header">
        <div class="brand-logo-wrap">
            <img src="{{ asset('images/logo lc.png') }}" alt="Logo">
        </div>
        <h1>LEARNING CENTER</h1>
        <p>Sir Michael Uren</p>
    </div>

    {{-- Card --}}
    <div class="login-card">

        <div class="card-heading">
            <h2>Selamat Datang</h2>
            <p>Masuk ke panel admin</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert-status">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div>
                <label class="form-label" for="email">Email</label>
                <div class="input-group-custom">
                    <i class="bi bi-envelope input-icon"></i>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control-custom"
                        placeholder="admin@example.com"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                    >
                </div>
                @error('email')
                    <div class="error-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="form-label" for="password">Password</label>
                <div class="input-group-custom">
                    <i class="bi bi-lock input-icon"></i>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control-custom"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="error-msg"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            {{-- Remember & Forgot --}}
            <div class="extras-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember" id="remember_me">
                    Ingat saya
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i> Masuk
            </button>
            {{-- Divider --}}
            <div class="register-divider">
                <span>atau</span>
            </div>

{{-- Register User --}}
<div class="register-section">
    <p>Belum memiliki akun untuk memberikan ulasan?</p>

    <a href="{{ route('register') }}" class="btn-register">
        <i class="bi bi-person-plus-fill"></i>
        Daftar Akun User
    </a>
</div>

        </form>
    </div>

    {{-- Back to frontend --}}
    <div class="back-link">
        <a href="{{ route('home') }}"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
</script>

</body>
</html>
