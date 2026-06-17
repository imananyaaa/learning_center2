<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda — Learning Center IAR Indonesia</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1565C0;
            --primary-dark: #0D47A1;
            --primary-light: #42A5F5;
            --primary-lighter: #90CAF9;
            --primary-lightest: #E3F2FD;
            --accent: #2196F3;
            --bg-light: #F8FBFF;
            --bg-white: #FFFFFF;
            --text-dark: #1A237E;
            --text-medium: #546E7A;
            --text-light: #90A4AE;
            --shadow-sm: 0 2px 8px rgba(21, 101, 192, 0.08);
            --shadow-md: 0 4px 20px rgba(21, 101, 192, 0.12);
            --shadow-lg: 0 8px 40px rgba(21, 101, 192, 0.15);
            --radius: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s ease;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-medium);
            background: var(--bg-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        /* ══════════════════════════════════════════════════════════════
           NAVBAR
        ══════════════════════════════════════════════════════════════ */
        .navbar {
            background: var(--bg-white) !important;
            padding: 0.8rem 0;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            z-index: 1050;
        }

        .navbar-scrolled {
            box-shadow: var(--shadow-md);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            width: 60px;
            height: 60px;
            background: transparent;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-navbar {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .brand-text .brand-name {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            display: block;
            line-height: 1.2;
        }

        .brand-text .brand-sub {
            font-size: 0.72rem;
            color: var(--text-light);
            display: block;
        }

        .navbar-nav .nav-link {
            color: var(--text-medium) !important;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary) !important;
            background: var(--primary-lightest) !important;
        }

        .btn-login-nav {
            background: var(--primary);
            color: #fff !important;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            border: none;
            white-space: nowrap;
        }

        .btn-login-nav:hover {
            background: var(--primary-dark);
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .navbar-toggler {
            border: 1px solid var(--primary-lighter);
            padding: 0.4rem 0.6rem;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231565C0' stroke-width='2' stroke-linecap='round' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Navbar collapse mobile fix */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--bg-white);
                border-radius: var(--radius);
                padding: 16px;
                box-shadow: var(--shadow-md);
                margin-top: 8px;
            }
            .navbar-nav {
                gap: 4px;
            }
            .btn-login-nav {
                display: inline-flex;
                width: fit-content;
                margin-top: 8px;
            }
        }

        /* ══════════════════════════════════════════════════════════════
           SECTION BASE
        ══════════════════════════════════════════════════════════════ */
        section {
            padding: 80px 0;
        }

        @media (max-width: 768px) {
            section {
                padding: 50px 0;
            }
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 16px;
            border-radius: 25px;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
            margin-bottom: 16px;
        }

        .section-title span {
            color: var(--primary);
        }

        .section-desc {
            color: var(--text-medium);
            font-size: 1rem;
            line-height: 1.8;
            max-width: 600px;
        }

        .section-divider {
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 2px;
            margin-bottom: 24px;
        }

        /* ══════════════════════════════════════════════════════════════
           BUTTONS
        ══════════════════════════════════════════════════════════════ */
        .btn-primary-custom {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 30px;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: #fff;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-outline-custom {
            background: transparent;
            color: var(--primary);
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 30px;
            border: 2px solid var(--primary);
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .btn-outline-custom:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-3px);
        }

        /* ══════════════════════════════════════════════════════════════
           FEATURE CARDS
        ══════════════════════════════════════════════════════════════ */
        .feature-card {
            background: var(--bg-white);
            border: 1px solid var(--primary-lightest);
            border-radius: var(--radius-lg);
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-lighter);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--primary-lightest);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            transition: var(--transition);
        }

        .feature-icon i {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .feature-card:hover .feature-icon {
            background: var(--primary);
        }

        .feature-card:hover .feature-icon i {
            color: #fff;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .feature-desc {
            font-size: 0.9rem;
            color: var(--text-light);
            line-height: 1.7;
        }

        /* ══════════════════════════════════════════════════════════════
           FOOTER
        ══════════════════════════════════════════════════════════════ */
        .site-footer {background: var(--text-dark);padding-top: 60px;}
        .footer-brand .brand-logo {background: rgba(255, 255, 255, 0.1);border: 2px solid rgba(255, 255, 255, 0.2);}
        .footer-brand{display:flex;align-items:center;gap:15px;}
        .footer-logos{
            display:flex;
            align-items:center;
            gap:18px;
            flex-shrink:0;
        }

        .footer-logo-img{
            width:65px;
            height:65px;
            object-fit:contain;
        }

        .footer-brand .brand-logo{
            background:transparent;
            border:none;
        }

        .footer-brand-text h5{margin:0;color:#fff;font-size:1.8rem;font-weight:700;}
        .footer-brand-text span{color:rgba(255,255,255,.7);font-size:.95rem;}
        .footer-title {font-size: 0.8rem;font-weight: 700;text-transform: uppercase;letter-spacing: 1.5px;color: rgba(255, 255, 255, 0.4);margin-bottom: 20px;}
        .footer-link {color: rgba(255, 255, 255, 0.6) !important;text-decoration: none;font-size: 0.9rem;transition: var(--transition);display: inline-block;padding: 4px 0;}
        .footer-link:hover {color: var(--primary-lighter) !important;padding-left: 5px;}
        .footer-contact-item {display: flex;gap: 12px;margin-bottom: 16px;font-size: 0.9rem;color: rgba(255, 255, 255, 0.6);}
        .footer-contact-item i {color: var(--primary-lighter);font-size: 1rem;margin-top: 2px;flex-shrink: 0;}
        .footer-social {display: flex;gap: 8px;flex-wrap: wrap;}
        .footer-social a {width: 40px;height: 40px;background: rgba(255, 255, 255, 0.08);border-radius: 10px;display: inline-flex;align-items: center;justify-content: center;color: rgba(255, 255, 255, 0.6);text-decoration: none;font-size: 1rem;transition: var(--transition);}
        .footer-social a:hover {background: var(--primary);color: #fff;transform: translateY(-3px);}
        .footer-bottom {border-top: 1px solid rgba(255, 255, 255, 0.08);padding: 20px 0;margin-top: 40px;}
        .footer-bottom-text {font-size: 0.8rem;color: rgba(255, 255, 255, 0.35);}

        /* ══════════════════════════════════════════════════════════════
           BACK TO TOP
        ══════════════════════════════════════════════════════════════ */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 999;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            cursor: pointer;
        }

        #backToTop:hover {
            background: var(--primary-dark);
            transform: translateY(-5px);
        }
    </style>

    {{-- Style khusus halaman home yang sebelumnya berada di home.blade.php --}}
    <style>
        /* ══════════════════════════════════════════════════════════════
           HERO SECTION
        ══════════════════════════════════════════════════════════════ */
        .hero-section {position: relative;min-height: 100vh;display: flex;align-items: center;overflow: hidden;background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 50%, #90CAF9 100%);}
        .hero-content {position: relative;z-index: 2;padding: 140px 0 80px;}
        .hero-welcome-badge {display: inline-block;background: var(--primary);color: #fff;font-size: 1.4rem;font-weight: 700;padding: 8px 20px;border-radius: 25px;margin-bottom: 24px;}
        .hero-title {font-size: clamp(2.2rem, 5vw, 3.5rem);font-weight: 800;color: var(--text-dark);line-height: 1.2;margin-bottom: 20px;}
        .hero-title .highlight {color: var(--primary);}
        .hero-description {font-size: 1.05rem;color: var(--text-medium);line-height: 1.8;max-width: 500px;margin-bottom: 32px;}
        .hero-buttons {display: flex;gap: 16px;flex-wrap: wrap;}
        .hero-image-wrapper {position: relative;padding: 0 20px 0 0;}
        .hero-image {border-radius: var(--radius-lg);box-shadow: var(--shadow-lg);overflow: hidden;width: 100%;height: 420px;background: var(--primary-lightest);}
        .hero-image img {width: 100%;height: 100%;display: block;object-fit: cover;object-position: center;}

        @media (max-width: 575.98px) {
            .hero-image {
                height: 260px;
            }
        }

        .hero-building-label {
            position: absolute;
            bottom: -10px;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            padding: 16px 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow-md);
            text-align: center;
        }

        .hero-building-label h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .hero-building-label p {
            font-size: 0.78rem;
            color: var(--primary);
            margin: 0;
            font-weight: 600;
        }

        @media (max-width: 991.98px) {
            .hero-content {
                padding: 120px 0 40px;
            }
            .hero-image-wrapper {
                padding: 0;
                margin-top: 32px;
            }
            .hero-building-label {
                right: 16px;
            }
        }

        /* ══════════════════════════════════════════════════════════════
           FACILITIES SECTION
        ══════════════════════════════════════════════════════════════ */
        .facilities-section {
            background: var(--bg-white);
        }

        .facility-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        @media (max-width: 991.98px) {
            .facility-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575.98px) {
            .facility-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .facility-item {
            background: var(--bg-white);
            border: 1px solid var(--primary-lightest);
            border-radius: var(--radius);
            padding: 24px 20px;
            text-align: center;
            transition: var(--transition);
        }

        .facility-item:hover {
            border-color: var(--primary-lighter);
            box-shadow: var(--shadow-sm);
            transform: translateY(-4px);
        }

        .facility-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-lightest);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .facility-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .facility-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .facility-desc {
            font-size: 0.82rem;
            color: var(--text-light);
            line-height: 1.6;
            margin: 0;
        }

        /* ══════════════════════════════════════════════════════════════
           EVENTS SECTION
        ══════════════════════════════════════════════════════════════ */
        .events-section {
            background: var(--bg-light);
        }

        .event-card {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-8px);
        }

        .event-image {
            height: 200px;
            overflow: hidden;
            background: var(--primary-lightest);
            position: relative;
        }

        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
            display: block;
        }

        .event-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-lightest), var(--primary-lighter));
        }

        .event-image-placeholder i {
            font-size: 3rem;
            color: var(--primary);
            opacity: 0.5;
        }

        .event-card:hover .event-image img {
            transform: scale(1.08);
        }

        .event-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .event-date {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--primary-lightest);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
            width: fit-content;
        }

        .event-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .event-excerpt {
            font-size: 0.88rem;
            color: var(--text-light);
            line-height: 1.7;
            margin: 0;
            flex: 1;
        }

        /* ══════════════════════════════════════════════════════════════
           CTA SECTION
        ══════════════════════════════════════════════════════════════ */
        .cta-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
            padding: 80px 0;
        }

        .cta-title {
            font-size: clamp(1.6rem, 3.5vw, 2.2rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 16px;
        }

        .cta-desc {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 32px;
        }

        .btn-cta-white {
            background: #fff;
            color: var(--primary) !important;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 30px;
            border: none;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cta-white:hover {
            background: var(--primary-lightest);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-cta-outline {
            background: transparent;
            color: #fff !important;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 30px;
            border: 2px solid rgba(255, 255, 255, 0.5);
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cta-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-logo">
                <img src="{{ asset('images/logo lc.png') }}"
                     alt="Logo LC"
                     class="logo-navbar">
            </div>
            <div class="brand-text">
                <span class="brand-name">LEARNING CENTER</span>
                <span class="brand-sub">SIR MICHAEL UREN</span>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav mx-auto align-items-lg-center gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('tentang-kami') ? 'active' : '' }}" href="{{ route('tentang-kami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('fasilitas') ? 'active' : '' }}" href="{{ route('fasilitas') }}">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('event') ? 'active' : '' }}" href="{{ route('event') }}">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('ulasan') ? 'active' : '' }}"href="{{ route('ulasan') }}">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>
            <a href="{{ route('login') }}" class="btn-login-nav">
                <i class="bi bi-person-fill"></i> Login Admin
            </a>
        </div>
    </div>
</nav>

<main>
{{-- ══════════════════════════════════════════════════════════════
     HERO SECTION
══════════════════════════════════════════════════════════════ --}}
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <span class="hero-welcome-badge">Selamat Datang di</span>
                    <h1 class="hero-title">
                        Learning Center<br>
                        <span class="highlight">Sir Michael Uren</span>
                    </h1>
                    <p class="hero-description">
                        Menyediakan fasilitas yang inovatif, memberikan informasi, pelatihan, edukasi, dan pengembangan kapasitas unutuk konservasi.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('tentang-kami') }}" class="btn-primary-custom">
                            Kenali Kami <i class="bi bi-arrow-right"></i>
                        </a>
                        <a href="{{ route('fasilitas') }}" class="btn-outline-custom">
                            <i class="bi bi-building"></i> Lihat Fasilitas
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-wrapper">
                    <div class="hero-image">
                        <img src="{{ asset('images/lc.jpg') }}"
                             alt="IAR Indonesia Learning Center"
                             style="width:100%;height:100%;object-fit:cover;display:block;">
                    </div>
                    <div class="hero-building-label">
                        <h4>LEARNING CENTER</h4>
                        <p>SIR MICHAEL UREN</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════════
     FACILITIES SECTION
══════════════════════════════════════════════════════════════ --}}
<section class="facilities-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-badge">
                <i class="bi bi-check-circle-fill"></i> Mengapa Memilih Kami
            </span>
            <h2 class="section-title">Fasilitas & Layanan <span>Unggulan</span></h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <div class="facility-grid" data-aos="fade-up" data-aos-delay="100">
            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h5 class="facility-name">Ruang Rapat</h5>
                <p class="facility-desc">Ruang rapat modern dengan fasilitas lengkap untuk kebutuhan meeting.</p>
            </div>

            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-building"></i>
                </div>
                <h5 class="facility-name">Aula Serbaguna</h5>
                <p class="facility-desc">Aula luas untuk seminar, pelatihan, dan berbagai acara besar.</p>
            </div>

            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-house-door-fill"></i>
                </div>
                <h5 class="facility-name">Penginapan</h5>
                <p class="facility-desc">Kamar nyaman dengan fasilitas lengkap untuk peserta kegiatan.</p>
            </div>

            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-book-fill"></i>
                </div>
                <h5 class="facility-name">Ruang Kelas</h5>
                <p class="facility-desc">Ruang kelas representatif untuk pelatihan dan workshop.</p>
            </div>

            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-tree-fill"></i>
                </div>
                <h5 class="facility-name">Area Outdoor</h5>
                <p class="facility-desc">Area terbuka untuk kegiatan outbound dan aktivitas luar ruangan.</p>
            </div>

            <div class="facility-item">
                <div class="facility-icon">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>
                <h5 class="facility-name">Cafe</h5>
                <p class="facility-desc">Menyediakan berbagai menu makanan dan minuman berkualitas.</p>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════════
     EVENTS SECTION
══════════════════════════════════════════════════════════════ --}}
<section class="events-section">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-badge">
                    <i class="bi bi-calendar-event-fill"></i> Kegiatan Terbaru
                </span>
                <h2 class="section-title">Event & <span>Kegiatan</span></h2>
            </div>
            <div class="col-auto mt-3 mt-lg-0" data-aos="fade-left">
                <a href="{{ route('event') }}" class="btn-outline-custom">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        @php
        $events = [
            [
                'image' => 'event1.jpg',
                'date' => '15 Jun 2026',
                'title' => 'Workshop Konservasi Satwa Liar',
                'excerpt' => 'Pelatihan intensif tentang teknik konservasi modern untuk pelestarian satwa liar Indonesia.'
            ],
            [
                'image' => 'event2.jpg',
                'date' => '22 Jun 2026',
                'title' => 'Seminar Pendidikan Lingkungan',
                'excerpt' => 'Meningkatkan kesadaran masyarakat tentang pentingnya menjaga kelestarian lingkungan.'
            ],
            [
                'image' => 'event3.jpg',
                'date' => '30 Jun 2026',
                'title' => 'Pelatihan Ekowisata',
                'excerpt' => 'Program pelatihan untuk mengembangkan potensi ekowisata berbasis konservasi.'
            ],
        ];
        @endphp

        <div class="row g-4">
            @foreach($events as $index => $event)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="event-card">
                    <div class="event-image">
                        <img src="{{ asset('images/' . $event['image']) }}"
                             alt="{{ $event['title'] }}"
                             onerror="this.onerror=null; this.style.display='none'; this.parentElement.innerHTML='<div class=\'event-image-placeholder\'><i class=\'bi bi-calendar-event\'></i></div>';">
                    </div>
                    <div class="event-body">
                        <span class="event-date">
                            <i class="bi bi-calendar3"></i> {{ $event['date'] }}
                        </span>
                        <h5 class="event-title">{{ $event['title'] }}</h5>
                        <p class="event-excerpt">{{ $event['excerpt'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════════
     CTA SECTION
══════════════════════════════════════════════════════════════ --}}
<section class="cta-section">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="cta-title">Ingin Menggunakan Fasilitas Kami?</h2>
                <p class="cta-desc">
                    Hubungi kami untuk informasi pemesanan fasilitas, paket layanan, dan jadwal kegiatan.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="https://wa.me/6285750057187" target="_blank" class="btn-cta-white">
                        <i class="bi bi-whatsapp"></i> WhatsApp Kami
                    </a>
                    <a href="{{ route('fasilitas') }}" class="btn-cta-outline">
                        <i class="bi bi-building"></i> Lihat Fasilitas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

{{-- FOOTER --}}
<footer class="site-footer text-white">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand d-flex align-items-center gap-3 mb-4">
                    <div class="footer-logos">
                        <img src="{{ asset('images/logo iar.png') }}"
                             alt="Logo IAR"
                             class="footer-logo-img">

                        <img src="{{ asset('images/logo lc.png') }}"
                             alt="Logo Learning Center"
                             class="footer-logo-img">
                    </div>
                    <div>
                         <div class="footer-brand-text">
                            <h5>IAR Indonesia</h5>
                            <span>Learning Center</span>
                        </div>
                    </div>
                </div>
                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.5); line-height: 1.8; margin-bottom: 24px;">
                    Pusat pembelajaran, pelatihan, dan pengembangan diri untuk mencetak generasi unggul dan berdaya saing.
                </p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/learningcenterketapang/" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/6285750057187" target="_blank" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="#" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-title">Menu</h6>
                <ul class="list-unstyled d-flex flex-column gap-1">
                    <li><a href="{{ route('home') }}" class="footer-link">Beranda</a></li>
                    <li><a href="{{ route('tentang-kami') }}" class="footer-link">Tentang Kami</a></li>
                    <li><a href="{{ route('fasilitas') }}" class="footer-link">Fasilitas</a></li>
                    <li><a href="{{ route('event') }}" class="footer-link">Event</a></li>
                    <li><a href="{{ route('kontak') }}" class="footer-link">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6">
                <h6 class="footer-title">Fasilitas</h6>
                <ul class="list-unstyled d-flex flex-column gap-1">
                    <li><a href="#" class="footer-link">Ruang Rapat</a></li>
                    <li><a href="#" class="footer-link">Aula Serbaguna</a></li>
                    <li><a href="#" class="footer-link">Penginapan</a></li>
                    <li><a href="#" class="footer-link">Ruang Kelas</a></li>
                    <li><a href="#" class="footer-link">Kantin</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <h6 class="footer-title">Kontak & Lokasi</h6>
                <div class="footer-contact-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Sungai Awan Kiri, Kecamatan Muara Pawan, Kabupaten Ketapang, Kalimantan Barat 78813</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>+62 857-5005-7187</span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>info@iarindonesia.org</span>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <span class="footer-bottom-text">© {{ date('Y') }} IAR Indonesia Learning Center. All rights reserved.</span>
            <span class="footer-bottom-text">Developed with <i class="bi bi-heart-fill text-danger"></i> for Conservation</span>
        </div>
    </div>
</footer>

<button id="backToTop" title="Kembali ke atas"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 60, easing: 'ease-out-quart' });

    const nav = document.getElementById('mainNavbar');
    const btt = document.getElementById('backToTop');

    window.addEventListener('scroll', () => {
        nav.classList.toggle('navbar-scrolled', window.scrollY > 50);
        btt.style.display = window.scrollY > 400 ? 'flex' : 'none';
    });

    btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    // Counter animation
    const counterObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (!e.isIntersecting) return;
            const el = e.target;
            const target = +el.dataset.target;
            const duration = 1800;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = Math.floor(current).toLocaleString('id-ID');
                if (current >= target) clearInterval(timer);
            }, 16);
            counterObs.unobserve(el);
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-counter]').forEach(el => counterObs.observe(el));
</script>

</body>
</html>
