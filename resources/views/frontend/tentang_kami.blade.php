@extends('layouts.frontend')
@section('title', 'Profil — Learning Center IAR Indonesia')

@push('styles')
<style>
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

    /* VM Card */
    .vm-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 36px;
        transition: var(--transition);
        height: 100%;
    }
    .vm-card:hover {
        box-shadow: var(--shadow-md);
        border-color: var(--primary-lighter);
        transform: translateY(-3px);
    }
    .vm-icon {
        width: 56px;
        height: 56px;
        background: var(--primary-lightest);
        color: var(--primary);
        border-radius: var(--radius);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 18px;
        transition: var(--transition);
    }
    .vm-card:hover .vm-icon {
        background: var(--primary);
        color: #fff;
    }

    /* Timeline */
    .timeline-dot {
        width: 14px;
        height: 14px;
        background: var(--primary);
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
        border: 2px solid var(--primary-lightest);
    }
    .timeline-line {
        width: 2px;
        background: var(--primary-lightest);
        flex-grow: 1;
        min-height: 32px;
        margin: 4px auto;
    }

    /* Team card */
    .team-card {
        background: var(--bg-white);
        border: 1px solid var(--primary-lightest);
        border-radius: var(--radius);
        padding: 28px 20px;
        text-align: center;
        transition: var(--transition);
        height: 100%;
    }
    .team-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-4px);
    }
    .team-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 16px;
        display: block;
        border: 3px solid var(--primary-lightest);
    }

    /* Section badge & title reuse */
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
    .divider {
        width: 50px;
        height: 4px;
        background: var(--primary);
        border-radius: 2px;
        margin-bottom: 8px;
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
                <i class="bi bi-info-circle-fill"></i> Tentang Kami
            </div>
            <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Learning Center<br>
                <em style="color:var(--primary-lighter);font-style:normal;">Sir Michael Uren</em>
            </h1>
            <p style="color:rgba(255,255,255,.75);font-size:1rem;max-width:520px;line-height:1.8;margin:0;">
                Pusat pembelajaran konservasi pertama dan terlengkap di Kalimantan, diresmikan 10 Juli 2019. Fasilitas yang terdapat didalamnya antara lain akomodasi untuk ruang rapat yang luas, yang dapat digunakan untuk lokakarya dan prsentasi, kafe, dan banyak ruang terbuka untuk pelatihan maupun seminar.
            </p>
        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section style="background:var(--bg-white);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-eye-fill"></i> Visi & Misi</div>
                <h2 class="stitle">Landasan <em>Kami</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
                    <h4 style="font-weight:700;color:var(--text-dark);margin-bottom:14px;">Visi</h4>
                    <p style="color:var(--text-medium);line-height:1.85;font-size:.95rem;margin:0;">
                        Komunitas lokal, sektor swasta, lembaga penelitian akademik, serta organisasi pemerintah
                        dan non-pemerintah berkumpul di Learning Center untuk
                        <strong style="color:var(--text-dark);">membangun masa depan yang lebih baik bagi manusia dan alam.</strong>
                    </p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="vm-card">
                    <div class="vm-icon"><i class="bi bi-bullseye"></i></div>
                    <h4 style="font-weight:700;color:var(--text-dark);margin-bottom:14px;">Misi</h4>
                    <p style="color:var(--text-medium);line-height:1.85;font-size:.95rem;margin:0;">
                        Membangun kesadaran, pengetahuan, dan kapasitas melalui penelitian dan pendidikan untuk
                        <strong style="color:var(--text-dark);">melindungi lingkungan dan memungkinkan pertumbuhan berkelanjutan
                        Kabupaten Ketapang.</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SEJARAH --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div style="border-radius:var(--radius-lg);overflow:hidden;box-shadow:var(--shadow-lg);">
                    <img src="{{ asset('images/lc.jpg') }}"
                         style="width:100%;height:420px;object-fit:cover;display:block;"
                         alt="Learning Center IAR Indonesia"
                         onerror="this.style.display='none'">
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="stag"><i class="bi bi-clock-history"></i> Sejarah</div>
                <h2 class="stitle">Perjalanan <em>Kami</em></h2>
                <div class="divider"></div>
                <div class="d-flex flex-column gap-3 mt-4">
                    @foreach($sejarah as $i => $t)
                    <div class="d-flex gap-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="timeline-dot"></div>
                            @if(!$loop->last)
                            <div class="timeline-line"></div>
                            @endif
                        </div>
                        <div style="padding-bottom:16px;">
                            <span style="font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:var(--primary);">
                                {{ $t['tahun'] }}
                            </span>
                            <p style="font-size:.9rem;font-weight:600;color:var(--text-dark);margin:4px 0 2px;">
                                {{ $t['judul'] }}
                            </p>
                            <p style="font-size:.88rem;color:var(--text-medium);line-height:1.72;margin:0;">
                                {{ $t['deskripsi'] }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- NILAI --}}
<section style="background:var(--bg-white);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-star-fill"></i> Nilai Kami</div>
                <h2 class="stitle">Yang Kami <em>Junjung</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
        <div class="row g-4">
            @foreach([
                ['bi-recycle',    'Keberlanjutan', 'Mendorong praktik berkelanjutan demi pelestarian alam Kalimantan.'],
                ['bi-people-fill','Kolaborasi',    'Mempertemukan berbagai pihak untuk dampak konservasi yang lebih besar.'],
                ['bi-lightbulb-fill','Inovasi',   'Mengembangkan metode pembelajaran inovatif untuk konservasi.'],
                ['bi-heart-fill', 'Kepedulian',   'Berkomitmen pada kesejahteraan manusia dan ekosistem lokal.'],
            ] as $i => $v)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="vm-card text-center">
                    <div class="vm-icon mx-auto"><i class="bi {{ $v[0] }}"></i></div>
                    <h5 style="font-weight:700;color:var(--text-dark);margin-bottom:8px;">{{ $v[1] }}</h5>
                    <p style="font-size:.85rem;color:var(--text-medium);line-height:1.7;margin:0;">{{ $v[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TIM --}}
<section style="background:var(--bg-light);">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up">
                <div class="stag"><i class="bi bi-people-fill"></i> Tim Kami</div>
                <h2 class="stitle">Orang-orang di <em>Balik Layar</em></h2>
                <div class="divider mx-auto"></div>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($tim as $i => $anggota)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="team-card">
                    <img src="{{ $anggota['foto'] }}"
                         alt="{{ $anggota['nama'] }}"
                         class="team-avatar">
                    <h6 style="font-weight:700;color:var(--text-dark);margin-bottom:4px;font-size:.95rem;">
                        {{ $anggota['nama'] }}
                    </h6>
                    <small style="color:var(--primary);font-weight:600;font-size:.8rem;">
                        {{ $anggota['jabatan'] }}
                    </small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
