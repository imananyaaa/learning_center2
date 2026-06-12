@extends('layouts.frontend')
@section('title', 'Fasilitas — Learning Center IAR Indonesia')

@push('styles')
<style>
    /* ══════════════════════════════════════════════════════════════
       PAGE HERO
    ══════════════════════════════════════════════════════════════ */
    .page-hero {
        position: relative;
        padding: 160px 0 80px;
        overflow: hidden;
    }
    .page-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset("images/lc.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    .page-hero-ov {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(13,71,161,.92), rgba(21,101,192,.80));
    }

    /* Section badges & titles */
    .stag {
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
    .stitle {
        font-size: clamp(1.8rem, 4vw, 2.4rem);
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.3;
        margin-bottom: 12px;
    }
    .stitle em {
        color: var(--primary);
        font-style: normal;
    }
    .sdesc {
        color: var(--text-medium);
        font-size: 0.97rem;
        line-height: 1.75;
        margin-bottom: 0;
    }
    .divider {
        width: 50px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
        margin-bottom: 8px;
    }

    /* ══════════════════════════════════════════════════════════════
       FACILITY CARDS
    ══════════════════════════════════════════════════════════════ */
    .fac-card {
        background: var(--bg-white);
        border-radius: var(--radius-lg);
        border: 1px solid var(--primary-lightest);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        height: 100%;
    }
    .fac-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
        border-color: var(--primary-lighter);
    }
    .fac-img {
        height: 210px;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        background: var(--primary-lightest);
    }
    .fac-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .55s ease;
        display: block;
    }
    .fac-card:hover .fac-img img {
        transform: scale(1.06);
    }
    .fac-img-overlay {
        position: absolute;
        inset: 0;
        background: rgba(13,71,161,0);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }
    .fac-img:hover .fac-img-overlay {
        background: rgba(13,71,161,.5);
    }
    .fac-img-overlay span {
        color: #fff;
        font-size: .85rem;
        font-weight: 600;
        opacity: 0;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .fac-img:hover .fac-img-overlay span {
        opacity: 1;
    }
    .fac-body {
        padding: 20px;
    }
    .fac-tag {
        display: inline-block;
        font-size: .68rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 3px 11px;
        border-radius: 50px;
        margin-bottom: 9px;
    }
    .fac-tag.utama {
        background: var(--primary-lightest);
        color: var(--primary);
    }
    .fac-tag.pendukung {
        background: #e8f5e9;
        color: #2e7d32;
    }

    /* Btn utama */
    .btn-primary-custom {
        background: var(--primary);
        color: #fff;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 25px;
        border: none;
        transition: var(--transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.88rem;
        cursor: pointer;
        width: 100%;
        justify-content: center;
    }
    .btn-primary-custom:hover {
        background: var(--primary-dark);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* ══════════════════════════════════════════════════════════════
       PENDUKUNG CARDS
    ══════════════════════════════════════════════════════════════ */
    .pendukung-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
        transition: var(--transition);
        height: 100%;
    }
    .pendukung-card:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--primary-lighter);
        transform: translateY(-3px);
    }
    .pendukung-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-lightest);
        color: var(--primary);
        border-radius: var(--radius);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        transition: var(--transition);
    }
    .pendukung-card:hover .pendukung-icon {
        background: var(--primary);
        color: #fff;
    }

    /* ══════════════════════════════════════════════════════════════
       PAKET CARDS
    ══════════════════════════════════════════════════════════════ */
    .paket-card {
        background: var(--bg-white);
        border: 2px solid var(--primary-lightest);
        border-radius: var(--radius-lg);
        padding: 32px 28px;
        height: 100%;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }
    .paket-card:hover {
        border-color: var(--primary-lighter);
        box-shadow: var(--shadow-lg);
        transform: translateY(-4px);
    }
    .paket-card.featured {
        border-color: var(--primary);
        background: linear-gradient(135deg, var(--primary-lightest), #fff);
    }
    .paket-card.featured::before {
        content: 'Terpopuler';
        position: absolute;
        top: 20px;
        right: -30px;
        background: var(--primary);
        color: #fff;
        font-size: .68rem;
        font-weight: 700;
        padding: 5px 40px;
        transform: rotate(45deg);
        letter-spacing: .5px;
    }
    .paket-price {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-dark);
        line-height: 1.2;
        margin-bottom: 4px;
    }
    .paket-list li {
        font-size: .87rem;
        color: var(--text-medium);
        padding: 7px 0;
        border-bottom: 1px solid var(--primary-lightest);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .paket-list li:last-child {
        border: none;
    }
    .paket-list li i {
        color: var(--primary);
        flex-shrink: 0;
    }

    /* ══════════════════════════════════════════════════════════════
       REVIEW SECTION
    ══════════════════════════════════════════════════════════════ */
    .rating-summary {
        background: var(--primary-dark);
        color: #fff;
        border-radius: var(--radius-lg);
        padding: 32px 28px;
        text-align: center;
        height: 100%;
    }
    .rating-big {
        font-size: 3.5rem;
        font-weight: 800;
        color: #fff;
        line-height: 1;
    }
    .rating-bar {
        height: 8px;
        background: rgba(255,255,255,.15);
        border-radius: 4px;
        overflow: hidden;
    }
    .rating-bar-fill {
        height: 100%;
        background: #FDD835;
        border-radius: 4px;
    }
    .review-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 20px 24px;
        transition: var(--transition);
    }
    .review-card:hover {
        box-shadow: var(--shadow-sm);
        border-color: var(--primary-lighter);
    }
    .reviewer-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .stars-sm {
        color: #FDD835;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    /* ══════════════════════════════════════════════════════════════
       REVIEW FORM
    ══════════════════════════════════════════════════════════════ */
    .review-input-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius-lg);
        padding: 36px;
    }
    .star-rate {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 6px;
        margin: 10px 0;
    }
    .star-rate label {
        font-size: 1.8rem;
        color: var(--primary-lightest);
        cursor: pointer;
        transition: color .15s;
        line-height: 1;
    }
    .star-rate input {
        display: none;
    }
    .star-rate input:checked ~ label,
    .star-rate label:hover,
    .star-rate label:hover ~ label {
        color: #FDD835;
    }

    /* ══════════════════════════════════════════════════════════════
       MODAL
    ══════════════════════════════════════════════════════════════ */
    .modal-facility-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: var(--radius);
        margin-bottom: 20px;
        display: block;
        background: var(--primary-lightest);
    }
    .modal-facility-body {
        padding: 0 4px;
    }
</style>
@endpush

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-ov"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div data-aos="fade-up">
            <div class="stag" style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.25);">
                <i class="bi bi-building"></i> Fasilitas
            </div>
            <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Fasilitas <em style="color:var(--primary-lighter);font-style:normal;">Lengkap & Modern</em>
            </h1>
            <p style="color:rgba(255,255,255,.75);max-width:500px;line-height:1.8;margin:0;font-size:1rem;">
                Berbagai fasilitas terlengkap untuk mendukung kegiatan konservasi, pelatihan, dan edukasi.
            </p>
        </div>
    </div>
</section>

{{-- FASILITAS UTAMA --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="stag"><i class="bi bi-star-fill"></i> Fasilitas Utama</div>
                <h2 class="stitle">Fasilitas <em>Utama</em></h2>
                <div class="divider"></div>
                <p class="sdesc">Fasilitas utama yang tersedia untuk mendukung kegiatan inti.</p>
            </div>
        </div>

        @php
        $utama = [
            ['kamar',        'Kamar',               'Kamar penginapan nyaman ber-AC untuk peserta program jangka panjang, dilengkapi fasilitas standar hotel.',              'kamar.jpg'],
            ['rapat',        'Ruang Rapat',          'Ruang rapat luas yang dapat dikonfigurasi untuk lokakarya, presentasi, dan sesi brainstorming kapasitas besar.',        'rapat.jpg'],
            ['perpustakaan', 'Ruang Perpustakaan',   'Koleksi lengkap buku, jurnal, dan referensi konservasi dan lingkungan hidup untuk penelitian.',                        'perpustakaan.jpg'],
            ['galeri',       'Galeri',               'Ruang galeri untuk pameran foto, karya seni, dan dokumentasi kegiatan konservasi IAR Indonesia.',                      'galeri.jpg'],
            ['outdoor',      'Outdoor / Teater',     'Area terbuka untuk pelatihan lapangan, seminar outdoor, dan pertunjukan teater alam terbuka.',                         'outdoor.jpg'],
            ['parkir',       'Area Parkir',          'Area parkir luas dan aman untuk kendaraan peserta, tamu, dan staf Learning Center.',                                   'parkir.jpg'],
        ];
        @endphp

        <div class="row g-4">
            @foreach($utama as $i => $f)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                <div class="fac-card">
                    <div class="fac-img" onclick="openFacilityModal('{{ $f[0] }}','{{ $f[1] }}','{{ $f[2] }}')" title="Klik untuk detail">
                        <img src="{{ asset('images/'.$f[3]) }}"
                             alt="{{ $f[1] }}"
                             onerror="this.onerror=null;this.src='{{ asset('images/lc.jpg') }}'">
                        <div class="fac-img-overlay">
                            <span><i class="bi bi-zoom-in"></i> Lihat Detail</span>
                        </div>
                    </div>
                    <div class="fac-body">
                        <span class="fac-tag utama">Fasilitas Utama</span>
                        <div style="font-weight:700;font-size:.97rem;color:var(--text-dark);margin-bottom:6px;">{{ $f[1] }}</div>
                        <p style="font-size:.84rem;color:var(--text-light);line-height:1.65;margin:0 0 14px;">{{ $f[2] }}</p>
                        <button class="btn-primary-custom"
                                onclick="openFacilityModal('{{ $f[0] }}','{{ $f[1] }}','{{ $f[2] }}')">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FASILITAS PENDUKUNG --}}
<section style="background:var(--bg-white);">
    <div class="container">
        <div class="row justify-content-between align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="stag"><i class="bi bi-tools"></i> Fasilitas Pendukung</div>
                <h2 class="stitle">Perlengkapan <em>Pendukung</em></h2>
                <div class="divider"></div>
                <p class="sdesc">Peralatan dan perlengkapan yang tersedia untuk mendukung kegiatan.</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-speaker-fill',  'Sound Sistem',   'Sistem audio lengkap untuk presentasi, seminar, dan acara indoor maupun outdoor.'],
                ['bi-table',         'Meja dan Kursi', 'Set meja dan kursi berbagai konfigurasi untuk kebutuhan rapat dan pelatihan.'],
                ['bi-projector',     'Proyektor',      'Proyektor HD untuk presentasi dan pemutaran materi edukasi berkualitas tinggi.'],
                ['bi-easel-fill',    'Flipchart',      'Papan flipchart untuk sesi brainstorming dan diskusi kelompok interaktif.'],
                ['bi-display',       'Screen',         'Layar proyektor besar untuk tampilan visual yang jelas di ruang besar.'],
                ['bi-wifi',          'WiFi Gratis',    'Koneksi internet cepat tersedia di seluruh area Learning Center.'],
            ] as $i => $p)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $i * 70 }}">
                <div class="pendukung-card">
                    <div class="pendukung-icon">
                        <i class="bi {{ $p[0] }}"></i>
                    </div>
                    <div>
                        <span class="fac-tag pendukung">Pendukung</span>
                        <div style="font-weight:700;font-size:.95rem;color:var(--text-dark);margin-bottom:4px;">{{ $p[1] }}</div>
                        <p style="font-size:.83rem;color:var(--text-light);line-height:1.65;margin:0;">{{ $p[2] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PAKET LAYANAN --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-box-seam-fill"></i> Paket Layanan</div>
                <h2 class="stitle">Pilih <em>Paket</em> yang Sesuai</h2>
                <div class="divider mx-auto"></div>
                <p class="sdesc">Tersedia berbagai paket layanan yang dapat disesuaikan dengan kebutuhan kegiatan Anda.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @php
            $pakets = [
                ['Half Day',  'Setengah hari (4 jam)',      'Rp 500.000', 'per sesi', [
                    'Ruang rapat (maks. 30 org)',
                    'Proyektor & screen',
                    'Sound sistem',
                    'Flipchart & meja kursi',
                    'Air minum',
                ], '', false],
                ['Full Day',  'Satu hari penuh (8 jam)',    'Rp 900.000', 'per hari', [
                    'Ruang rapat (maks. 50 org)',
                    'Proyektor & screen',
                    'Sound sistem',
                    'Flipchart & meja kursi',
                    '2x Coffee break',
                    'Makan siang',
                ], 'featured', true],
                ['Overnight', 'Menginap (2 hari 1 malam)', 'Rp 2.000.000', 'per paket', [
                    'Kamar penginapan',
                    'Full day program',
                    'Seluruh fasilitas pendukung',
                    '3x makan + coffee break',
                    'Dokumentasi acara',
                ], '', false],
            ];
            @endphp

            @foreach($pakets as $i => $pk)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $i * 90 }}">
                <div class="paket-card {{ $pk[5] }}">
                    <div class="stag" style="{{ $pk[6] ? 'background:var(--primary);color:#fff;' : '' }}">
                        {{ $pk[0] }}
                    </div>
                    <h5 style="font-weight:600;color:var(--text-dark);margin-bottom:6px;">{{ $pk[1] }}</h5>
                    <div class="paket-price">{{ $pk[2] }}</div>
                    <div style="font-size:.75rem;color:var(--text-light);margin-bottom:20px;">{{ $pk[3] }}</div>
                    <ul class="paket-list list-unstyled">
                        @foreach($pk[4] as $item)
                        <li><i class="bi bi-check-circle-fill"></i> {{ $item }}</li>
                        @endforeach
                    </ul>
                    <a href="https://wa.me/6285750057187?text={{ urlencode('Halo, saya ingin memesan paket '.$pk[0].' di Learning Center IAR Indonesia') }}"
                       target="_blank" class="btn-primary-custom mt-4">
                        <i class="bi bi-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- MENU KONSUMSI --}}
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div style="background:var(--bg-white);border:1px solid var(--primary-lightest);border-radius:var(--radius-lg);padding:36px;">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-3">
                            <div class="stag"><i class="bi bi-cup-hot-fill"></i> Paket Konsumsi</div>
                            <h3 class="stitle" style="font-size:1.6rem;">Pilihan <em>Konsumsi</em></h3>
                            <div class="divider"></div>
                            <p class="sdesc" style="font-size:.88rem;">Tersedia berbagai pilihan konsumsi yang dapat ditambahkan pada paket Anda.</p>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-3">
                                @foreach([
                                    ['Coffee Break',      'Snack + minuman hangat/dingin', 'Rp 25.000/orang'],
                                    ['Makan Siang',       'Nasi + lauk + sayur + minuman', 'Rp 45.000/orang'],
                                    ['Makan Malam',       'Nasi + lauk + sayur + minuman', 'Rp 45.000/orang'],
                                    ['Paket Full Catering','3x makan + 2x coffee break',   'Rp 130.000/orang'],
                                ] as $m)
                                <div class="col-md-6">
                                    <div style="background:var(--bg-light);border-radius:var(--radius);padding:16px 20px;display:flex;justify-content:space-between;align-items:center;border:1px solid var(--primary-lightest);">
                                        <div>
                                            <div style="font-weight:700;font-size:.92rem;color:var(--text-dark);">{{ $m[0] }}</div>
                                            <div style="font-size:.78rem;color:var(--text-light);">{{ $m[1] }}</div>
                                        </div>
                                        <div style="font-weight:700;color:var(--primary);font-size:.88rem;white-space:nowrap;margin-left:12px;">{{ $m[2] }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- MODAL DETAIL FASILITAS --}}
<div class="modal fade" id="facilityModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius:var(--radius-lg);border:none;">
            <div class="modal-header" style="border-bottom:1px solid var(--primary-lightest);padding:20px 28px;">
                <h5 class="modal-title" id="modalTitle" style="font-weight:700;color:var(--text-dark);">Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:24px 28px;">
                <img id="modalImg" src="" class="modal-facility-img" alt="Fasilitas">
                <div class="modal-facility-body">
                    <p id="modalDesc" style="font-size:.93rem;color:var(--text-medium);line-height:1.82;margin-bottom:24px;"></p>
                    <a id="modalWa" href="" target="_blank" class="btn-primary-custom" style="width:auto;padding:12px 24px;">
                        <i class="bi bi-whatsapp"></i> Pesan Tempat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
const facImages = {
    kamar:        '{{ asset("images/kamar.jpg") }}',
    rapat:        '{{ asset("images/rapat.jpg") }}',
    perpustakaan: '{{ asset("images/perpustakaan.jpg") }}',
    galeri:       '{{ asset("images/galeri.jpg") }}',
    outdoor:      '{{ asset("images/outdoor.jpg") }}',
    parkir:       '{{ asset("images/parkir.jpg") }}',
};
const fallback = '{{ asset("images/lc.jpg") }}';

function openFacilityModal(key, title, desc) {
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalDesc').textContent  = desc;
    const img = document.getElementById('modalImg');
    img.src = facImages[key] || fallback;
    img.onerror = () => { img.onerror = null; img.src = fallback; };
    const waMsg = encodeURIComponent('Halo, saya ingin memesan ' + title + ' di Learning Center IAR Indonesia');
    document.getElementById('modalWa').href = 'https://wa.me/6285750057187?text=' + waMsg;
    new bootstrap.Modal(document.getElementById('facilityModal')).show();
}

@if(session('success'))
document.addEventListener('DOMContentLoaded', () => {
    const el = document.createElement('div');
    el.innerHTML = `<div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 m-3 shadow" role="alert" style="z-index:9999;max-width:320px;border-radius:12px;">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>`;
    document.body.appendChild(el);
    setTimeout(() => el.remove(), 4000);
});
@endif
</script>
@endpush
