@extends('layouts.frontend')

@section('title', 'Ulasan — Learning Center IAR Indonesia')

@section('content')

<style>
    /* ══════════════════════════════════════════════════════════════
       REVIEW SECTION
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

    .stag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 8px 16px;
        border-radius: 25px;
        margin-bottom: 16px;
    }

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
</style>

{{-- PAGE HERO --}}
<section class="page-hero">

    <div class="page-hero-bg"></div>

    <div class="page-hero-ov"></div>

    <div class="container" style="position:relative; z-index:2;">

        <div data-aos="fade-up">

            <div class="stag"
            style="background:rgba(255,255,255,.15);
            color:#fff;
            border:1px solid rgba(255,255,255,.25);">

            <i class="bi bi-star-fill"></i>
            Ulasan

        </div>

            <h1 style="
                font-size:clamp(2rem,4vw,3rem);
                font-weight:800;
                color:#fff;
                line-height:1.2;
                margin-bottom:16px;
            ">

                Apa Kata
                <em style="
                    color:var(--primary-lighter);
                    font-style:normal;
                ">
                    Pengguna
                </em>

            </h1>


            <p style="
                color:rgba(255,255,255,.75);
                max-width:500px;
                line-height:1.8;
                margin:0;
                font-size:1rem;
            ">

                Berbagai pengalaman dan cerita pengguna selama menggunakan fasilitas Learning Center.

            </p>

        </div>

    </div>

</section>

{{-- ULASAN & RATING --}}
<section style="background:var(--bg-white);" id="ulasan">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

                 <i class="bi bi-check-circle-fill"></i>
                 {{ session('success') }}

                 <button type="button"
                         class="btn-close"
                         data-bs-dismiss="alert">
                 </button>

              </div>
          @endif

        <div class="row justify-content-between align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="stag"><i class="bi bi-star-fill"></i> Ulasan</div>
                <h2 class="stitle">Apa Kata <em>Pengguna</em>?</h2>
                <div class="divider"></div>
                <p class="sdesc">Ulasan nyata dari para peserta dan pengguna fasilitas Learning Center.</p>
            </div>
        </div>

        <div class="row g-4">
            {{-- Rating Summary --}}
            <div class="col-lg-4" data-aos="fade-right">

                <div class="rating-summary">

                    <div class="rating-big">
                        {{ number_format($rataRating ?? 0, 1) }}
                    </div>

                    <div style="color:#FDD835;font-size:1.3rem;margin:8px 0;">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($rataRating))
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>

                    <div style="font-size:.85rem;color:rgba(255,255,255,.6);margin-bottom:24px;">
                        dari {{ $totalUlasan }} ulasan
                    </div>


                    @foreach($ratingPersen as $star => $pct)

                    <div class="d-flex align-items-center gap-2 mb-2">

                        <span style="font-size:.78rem;color:rgba(255,255,255,.6);width:12px;text-align:right;">
                            {{ $star }}
                        </span>

                        <i class="bi bi-star-fill"
                        style="color:#FDD835;font-size:.72rem;flex-shrink:0;">
                        </i>


                        <div class="rating-bar flex-grow-1">

                            <div class="rating-bar-fill"
                                 style="width: {{ $pct }}%;">
                            </div>
                        </div>


                        <span style="font-size:.75rem;color:rgba(255,255,255,.45);width:35px;">
                            {{ round($pct) }}%
                        </span>

                    </div>

                @endforeach

                </div>
            </div>

            {{-- Review Cards --}}
            <div class="col-lg-8">
                <div class="d-flex flex-column gap-3">
                    @foreach($ulasan as $item)
                    <div class="review-card">
                        <div class="d-flex align-items-start gap-3">

                            {{-- Avatar huruf awal nama --}}
                            <div class="reviewer-avatar">
                                {{ strtoupper(substr($item->user->name, 0, 1)) }}
                            </div>

                            <div class="flex-grow-1">

                                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">

                                    <div>
                                        <div style="font-weight:700;font-size:.92rem;color:var(--text-dark);">
                                            {{ $item->user->name }}
                                        </div>

                                        <div style="font-size:.76rem;color:var(--text-light);">
                                            {{ $item->instansi ?? 'Pengguna Learning Center' }}
                                        </div>
                                    </div>

                                    <div class="stars-sm">
                                        {{ str_repeat('★', $item->rating) }}
                                        {{ str_repeat('☆', 5 - $item->rating) }}
                                    </div>

                                </div>

                                <p style="font-size:.87rem;color:var(--text-medium);line-height:1.7;margin:0;">
                                    {{ $item->komentar }}
                                </p>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Form Ulasan --}}
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-lg-8 mx-auto">
                <div class="review-input-card">
                    <h4 style="font-weight:700;color:var(--text-dark);margin-bottom:6px;">Tulis Ulasan Anda</h4>
                    <p style="font-size:.87rem;color:var(--text-light);margin-bottom:28px;">Bagikan pengalaman Anda menggunakan fasilitas Learning Center</p>
                    <form action="{{ route('ulasan.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label style="font-size:.83rem;font-weight:600;color:var(--text-dark);margin-bottom:6px;display:block;">Instansi / Peran</label>
                                <input type="text" name="instansi" class="form-control" placeholder="Mahasiswa / Peneliti / dll">
                            </div>
                            <div class="col-12">
                                <label style="font-size:.83rem;font-weight:600;color:var(--text-dark);margin-bottom:6px;display:block;">Rating</label>
                                <div class="star-rate">
                                    @for($s = 5; $s >= 1; $s--)
                                    <input type="radio" name="rating" id="star{{ $s }}" value="{{ $s }}" {{ $s == 5 ? 'checked' : '' }}>
                                    <label for="star{{ $s }}" title="{{ $s }} bintang">★</label>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-12">
                                <label style="font-size:.83rem;font-weight:600;color:var(--text-dark);margin-bottom:6px;display:block;">Ulasan</label>
                                <textarea name="komentar" class="form-control" rows="4"
                                          placeholder="Ceritakan pengalaman Anda..." required
                                          style="resize:none;"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-primary-custom" style="width:auto;padding:12px 28px;">
                                    <i class="bi bi-send-fill"></i> Kirim Ulasan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
