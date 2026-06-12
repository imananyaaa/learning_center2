@extends('layouts.frontend')
@section('title', 'Beranda — Learning Center IAR Indonesia')

@push('styles')
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
@endpush

@section('content')

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

@endsection
