@extends('layouts.frontend')
@section('title', 'Acara — Learning Center Sir Michael Uren Ketapang')

@push('styles')
<style>
.page-hero {position: relative;padding: 160px 0 80px;overflow: hidden;}
.page-hero-bg {position: absolute;inset: 0;background-image: url('{{ asset("images/lc.jpg") }}');background-size: cover;background-position: center;}
.page-hero-ov {position: absolute;inset: 0;background: linear-gradient(135deg,rgba(13,71,161,.92),rgba(21,101,192,.80));}
.hero-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 18px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:999px;color:#fff;font-size:.75rem;font-weight:700;text-transform:uppercase;backdrop-filter:blur(8px);margin-bottom:20px;}
.hero-badge i{color:#fff;font-size:.75rem}
.event-tab-btn{background:transparent;border:2px solid var(--br-100);color:var(--tx-600);font-weight:600;padding:10px 24px;border-radius:50px;transition:var(--ease);cursor:pointer;font-size:.88rem;}
.event-tab-btn.active{background:var(--br-700);border-color:var(--br-700);color:#fff;}
.ev-card{background:var(--cr-50);border:1px solid var(--br-100);border-radius:var(--r);overflow:hidden;transition:var(--ease);height:100%;}
.ev-card:hover{transform:translateY(-4px);box-shadow:var(--sh-md);border-color:var(--br-300);}
.ev-card-img{height:200px;overflow:hidden;}
.ev-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .55s;}
.ev-card:hover .ev-card-img img{transform:scale(1.06);}
.ev-body{padding:22px;}
.ev-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);color:#ffffff;font-size:.85rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;padding:10px 20px;border-radius:999px;backdrop-filter:blur(8px);margin-bottom:20px;}
.event-badge i{color:#ffffff;}
.badge-internal{background:#e8f0d8;color:#4a6a1a;}
.badge-external{background:#e8d8f0;color:#5a1a7a;}
.badge-open{background:#f0ead0;color:#7a5a1a;}
.badge-selesai{background:#f0d8d8;color:#7a1a1a;}
.ev-meta{display:flex;gap:10px;flex-wrap:wrap;font-size:.76rem;color:var(--tx-400);margin-top:8px;}
.ev-meta span{display:flex;align-items:center;gap:4px;}
</style>
@endpush

@section('content')

<section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-ov"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div data-aos="fade-up">
           <div class="hero-badge">
                <i class="bi bi-calendar-event-fill"></i>
                 EVENT
           </div>
            <h1 class="stitle" style="font-size:clamp(2rem,4vw,3rem);font-weight:800;color:#fff;line-height:1.2;margin-bottom:16px;">
                Acara & <em style="color:var(--primary-lighter);font-style:normal;"> Kegiatan</em>
            </h1>
            <p style="color:rgba(255,255,255,.85);max-width:600px;line-height:1.8;font-size:1.1rem;">
                Berbagai kegiatan internal dan eksternal yang diselenggarakan di Learning Center.
            </p>
        </div>
    </div>
</section>

<section style="background:var(--cr-100);">
    <div class="container">
        {{-- TAB FILTER --}}
        <div class="d-flex gap-3 flex-wrap mb-5 justify-content-center" data-aos="fade-up">
            <button class="event-tab-btn active" onclick="filterEvents('semua',this)">Semua Acara</button>
            <button class="event-tab-btn" onclick="filterEvents('internal',this)">Acara Internal</button>
            <button class="event-tab-btn" onclick="filterEvents('external',this)">Acara Eksternal</button>
        </div>

        <div class="row g-4" id="eventGrid">
            @php
            $events = [
                ['internal','Workshop Konservasi Orangutan','Pelatihan intensif mengenai konservasi orangutan Kalimantan bagi ranger dan staf lapangan YIARI.',
                 '14 Jun 2025','08:00–16:00 WIB','Aula Serbaguna','30 Peserta','open'],
                ['external','Seminar Nasional Lingkungan Hidup','Seminar berskala nasional yang mempertemukan akademisi, pemerintah, dan LSM lingkungan.',
                 '21 Jun 2025','09:00–17:00 WIB','Gedung Utama','100 Peserta','open'],
                ['internal','Pelatihan Pemandu Ekowisata','Program pelatihan untuk calon pemandu ekowisata lokal di kawasan Ketapang.',
                 '05 Jul 2025','07:00–17:00 WIB','Outdoor/Teater','20 Peserta','open'],
                ['external','Pameran Foto Konservasi','Pameran foto dokumentasi kegiatan konservasi YIARI selama satu dekade di Kalimantan Barat.',
                 '12 Jul 2025','10:00–18:00 WIB','Galeri','Umum','open'],
                ['internal','Rapat Koordinasi Tim YIARI','Rapat evaluasi dan perencanaan program konservasi tahunan seluruh tim IAR Indonesia Foundation.',
                 '28 Mei 2025','09:00–15:00 WIB','Ruang Rapat','40 Peserta','selesai'],
                ['external','FGD Tata Kelola Hutan','Focus Group Discussion bersama pemerintah daerah dan komunitas lokal mengenai tata kelola hutan.',
                 '15 Mei 2025','09:00–13:00 WIB','Ruang Rapat','25 Peserta','selesai'],
            ];
            @endphp

            @foreach($events as $i => $ev)
            <div class="col-lg-4 col-md-6 event-item" data-type="{{ $ev[0] }}" data-aos="fade-up" data-aos-delay="{{ $i*70 }}">
                <div class="ev-card">
                    <div class="ev-card-img">
                        <img src="{{ asset('images/foto lc.jpg') }}" alt="{{ $ev[1] }}">
                    </div>
                    <div class="ev-body">
                        <div class="d-flex gap-2 flex-wrap">
                            <span class="ev-badge badge-{{ $ev[0] }}">{{ $ev[0]=='internal' ? 'Internal' : 'Eksternal' }}</span>
                            <span class="ev-badge badge-{{ $ev[7] }}">{{ $ev[7]=='open' ? 'Terbuka' : 'Selesai' }}</span>
                        </div>
                        <div style="font-weight:700;font-size:.96rem;color:var(--tx-900);margin-bottom:6px;">{{ $ev[1] }}</div>
                        <p style="font-size:.83rem;color:var(--tx-400);line-height:1.65;margin-bottom:10px;">{{ $ev[2] }}</p>
                        <div class="ev-meta">
                            <span><i class="bi bi-calendar3"></i>{{ $ev[3] }}</span>
                            <span><i class="bi bi-clock"></i>{{ $ev[4] }}</span>
                            <span><i class="bi bi-geo-alt"></i>{{ $ev[5] }}</span>
                            <span><i class="bi bi-people"></i>{{ $ev[6] }}</span>
                        </div>
                        @if($ev[7]=='open')
                        <a href="https://wa.me/6285750057187?text=Halo, saya ingin mendaftar acara: {{ $ev[1] }}"
                           target="_blank" class="btn-br mt-3 w-100 justify-content-center" style="padding:9px;font-size:.85rem;">
                            <i class="bi bi-whatsapp"></i> Daftar via WhatsApp
                        </a>
                        @else
                        <button class="btn-out mt-3 w-100 justify-content-center" style="padding:9px;font-size:.85rem;opacity:.6;" disabled>
                            <i class="bi bi-check-circle"></i> Acara Selesai
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function filterEvents(type, btn) {
    document.querySelectorAll('.event-tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.event-item').forEach(item => {
        if (type === 'semua' || item.dataset.type === type) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endpush
