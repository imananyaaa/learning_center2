@extends('layouts.frontend')
@section('title', 'Kontak — Learning Center Sir Michael Uren Ketapang')

@push('styles')
<style>
.page-hero{position:relative;padding:160px 0 80px;overflow:hidden;}
.page-hero-bg{position:absolute;inset:0;background-image:url('{{ asset("images/lc.jpg") }}');background-size:cover;background-position:center;}
.page-hero-ov{position:absolute;inset:0;background:linear-gradient(135deg,rgba(13,71,161,.92),rgba(21,101,192,.80));}
.hero-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 18px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:999px;color:#fff;font-size:.75rem;font-weight:700;text-transform:uppercase;letter-spacing:.8px;backdrop-filter:blur(8px);margin-bottom:20px;}
.hero-badge i{color:#fff;}
.contact-card{background:#fff;border:1px solid #E3F2FD;border-radius:var(--r);padding:28px;text-align:center;transition:var(--ease);}
.contact-card:hover{border-color:var(--br-300);box-shadow:var(--sh-md);transform:translateY(-3px);}
.contact-icon{width:56px;height:56px;background:#E3F2FD;color:#1976D2;border-radius:var(--r-sm);display:flex;align-items:center;justify-content:center;font-size:1.4rem;margin:0 auto 14px;transition:var(--ease);}
.contact-card:hover .contact-icon{background:#1976D2;color:#fff;}
.form-input{border:1px solid var(--br-100);border-radius:var(--r-sm);background:var(--cr-100);font-size:.88rem;padding:10px 14px;transition:var(--ease);width:100%;}
.form-input:focus{outline:none;border-color:var(--br-300);background:var(--cr-50);box-shadow:0 0 0 3px rgba(201,160,122,.18);}
</style>
@endpush

@section('content')

<section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-ov"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div data-aos="fade-up">
            <div class="hero-badge">
               <i class="bi bi-envelope-fill"></i>Kontak
            </div>
            <h1 style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Hubungi <em style="color:#90CAF9;font-style:normal;">Kami</em>
            </h1>
        </div>
    </div>
</section>

<section style="background:var(--cr-100);">
    <div class="container">
        <div class="row g-4 mb-5">
            @foreach([
                ['bi-geo-alt-fill','Alamat','Sungai Awan Kiri, Kecamatan Muara Pawan, Kabupaten Ketapang, Kalimantan Barat 78813','',''],
                ['bi-telephone-fill','Telepon','+62 857-5005-7187','tel:+6285750057187','Hubungi'],
                ['bi-whatsapp','WhatsApp','+62 857-5005-7187','https://wa.me/6285750057187','Chat'],
                ['bi-instagram','Instagram','@learningcenterketapang','https://www.instagram.com/learningcenterketapang/','Follow'],
            ] as $i => $c)
            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $i*70 }}">
                <div class="contact-card">
                    <div class="contact-icon"><i class="bi {{ $c[0] }}"></i></div>
                    <h6 style="font-weight:700;color:var(--tx-900);margin-bottom:6px;">{{ $c[1] }}</h6>
                    <p style="font-size:.85rem;color:var(--tx-400);line-height:1.7;margin-bottom:12px;">{{ $c[2] }}</p>
                    @if($c[3])
                    <a href="{{ $c[3] }}" target="_blank" class="btn-br" style="padding:7px 18px;font-size:.8rem;justify-content:center;width:100%;">
                        {{ $c[4] }}
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="row g-5 align-items-start">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="stag"><i class="bi bi-send-fill"></i>Kirim Pesan</div>
                <h2 class="stitle">Ada <em>Pertanyaan?</em></h2>
                <div class="divider"></div>
                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="alert" style="background:var(--cr-50);border:1px solid var(--br-100);border-radius:var(--r-sm);padding:14px;margin-bottom:20px;font-size:.88rem;color:var(--br-700);">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                    @endif
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-input" placeholder="Nama Anda" required>
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Email</label>
                            <input type="email" name="email" class="form-input" placeholder="email@contoh.com" required>
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nomor Telepon</label>
                            <input type="text" name="telepon" class="form-input" placeholder="+62 ...">
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Pesan</label>
                            <textarea name="pesan" rows="5" class="form-input" placeholder="Tulis pesan Anda..." required style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn-br" style="align-self:flex-start;">
                            <i class="bi bi-send-fill"></i> Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="stag"><i class="bi bi-map-fill"></i>Lokasi</div>
                <h2 class="stitle">Temukan <em>Kami</em></h2>
                <div class="divider"></div>
                <div style="border-radius:var(--r);overflow:hidden;border:2px solid var(--br-100);box-shadow:var(--sh-sm);">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7!2d109.9!3d-1.85!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sSungai+Awan+Kiri+Ketapang!5e0!3m2!1sid!2sid!4v1"
                        width="100%" height="340" style="border:0;display:block;" allowfullscreen loading="lazy"></iframe>
                </div>
                <div style="background:var(--cr-50);border:1px solid var(--br-100);border-radius:var(--r-sm);padding:18px;margin-top:16px;">
                    <div style="font-size:.82rem;color:var(--tx-400);line-height:1.8;">
                        <div class="d-flex gap-2 mb-2"><i class="bi bi-geo-alt-fill mt-1" style="color:var(--br-500);flex-shrink:0;"></i>
                        Sungai Awan Kiri, Kec. Muara Pawan, Kab. Ketapang, Kalimantan Barat 78813</div>
                        <div class="d-flex gap-2"><i class="bi bi-clock-fill mt-1" style="color:var(--br-500);flex-shrink:0;"></i>
                        Senin – Jumat: 08:00 – 17:00 WIB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
