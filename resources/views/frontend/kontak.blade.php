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
.form-input:focus{
    outline:none;
    border-color:#1976D2;
    box-shadow:0 0 0 4px rgba(25,118,210,.15);
}
.contact-form-box{
    background:#fff;
    padding:40px;
    border-radius:28px;
    border:1.8px solid #D5E7FF;
    box-shadow:0 10px 25px rgba(0, 70, 160, 0.08);
    transition:all .3s ease;
}

.contact-form-box:hover{
    border-color:#90CAF9;
    box-shadow:0 15px 35px rgba(0, 70, 160, 0.15);
    transform:translateY(-3px);
}

.form-input{
    width:100%;
    min-height:55px;
    padding:15px 18px;
    border:1.5px solid #D7E3F0;
    border-radius:14px;
    background:#fff;
    font-size:.95rem;
    color:#445566;
    transition:all .3s ease;
}

textarea.form-input{
    min-height:160px;
    resize:none;
}

.btn-kirim{
    width:100%;
    height:55px;
    border:none;
    background:linear-gradient(135deg,#1565C0,#1E88E5);
    color:#fff;
    border-radius:16px;
    font-size:1rem;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:all .3s ease;
}

.btn-kirim:hover{
    color:#fff;
    transform:translateY(-3px);
    box-shadow:0 12px 25px rgba(21,101,192,.35);
}
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

<section style="background:var(--cr-100); padding:80px 0;">
    <div class="container">
        <div class="row g-4 mb-5">
            @foreach([
                ['bi-geo-alt-fill','Alamat','Koordinat -1.7375161006912656, 110.01042955355726','https://www.google.com/maps/dir/?api=1&destination=-1.7375161006912656,110.01042955355726','Rute'],
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

                <div class="contact-form-box">

                <form action="{{ route('kontak.store') }}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div style="
                    background:#d1fae5;
                    color:#065f46;
                    padding:15px;
                    border-radius:10px;
                    margin-bottom:15px;
                    font-weight:600;
                    ">
                        ✅ {{ session('success') }}
                    </div>
                    @endif
                    <div class="d-flex flex-column gap-3">
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nama Lengkap</label>
                            <input
                               type="text"
                               name="nama"
                               class="form-input"
                               placeholder="Nama Anda"
                               required>
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Email</label>
                            <input
                               type="email"
                               name="email"
                               class="form-input"
                               placeholder="email@contoh.com"
                               required>
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Nomor Telepon</label>
                            <input
                               type="text"
                               name="telepon"
                               class="form-input"
                               placeholder="+62 ...">
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">
                                Tujuan
                            </label>

                            <select name="tujuan" class="form-input" required>
                                <option value="">-- Pilih Tujuan --</option>

                                <option value="Informasi Program">
                                    Informasi Program
                                </option>

                                <option value="Pendaftaran Peserta">
                                    Pendaftaran Peserta
                                </option>

                                <option value="Kerja Sama">
                                    Kerja Sama
                                </option>

                                <option value="Saran dan Masukan">
                                    Saran dan Masukan
                                </option>

                                <option value="Pengaduan">
                                    Pengaduan
                                </option>

                                <option value="Lainnya">
                                    Lainnya
                                </option>

                            </select>
                        </div>
                        <div>
                            <label style="font-size:.82rem;font-weight:600;color:var(--tx-900);margin-bottom:6px;display:block;">Pesan</label>
                            <textarea
                                name="pesan" rows="5"
                                class="form-input"
                                placeholder="Tulis pesan Anda..."
                                required style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn-kirim">
                            <i class="bi bi-send-fill"></i>
                            Kirim Pesan
                        </button>
                    </div>

                </form>

                </div>

            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="stag"><i class="bi bi-map-fill"></i>Lokasi</div>
                <h2 class="stitle">Temukan <em>Kami</em></h2>
                <div class="divider"></div>
                <div style="border-radius:var(--r);overflow:hidden;border:2px solid var(--br-100);box-shadow:var(--sh-sm);">
                    <iframe
                        src="https://maps.google.com/maps?q=-1.7375161006912656,110.01042955355726&hl=id&t=m&z=17&output=embed"
                        width="100%" height="340" style="border:0;display:block;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div style="background:var(--cr-50);border:1px solid var(--br-100);border-radius:var(--r-sm);padding:18px;margin-top:16px;">
                    <div style="font-size:.82rem;color:var(--tx-400);line-height:1.8;">
                        <div class="d-flex gap-2 mb-2"><i class="bi bi-geo-alt-fill mt-1" style="color:var(--br-500);flex-shrink:0;"></i>
                        Koordinat lokasi: -1.7375161006912656, 110.01042955355726</div>
                        <div class="d-flex gap-2 mb-3"><i class="bi bi-clock-fill mt-1" style="color:var(--br-500);flex-shrink:0;"></i>
                        Senin – Jumat: 08:00 – 17:00 WIB</div>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=-1.7375161006912656,110.01042955355726" target="_blank" rel="noopener" class="btn-br" style="padding:9px 18px;font-size:.82rem;justify-content:center;width:100%;">
                            <i class="bi bi-signpost-split-fill"></i> Arahkan ke Lokasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
