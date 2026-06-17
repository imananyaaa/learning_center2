@extends('layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Selamat Pagi, <span class="text-blue-600">{{ auth()->user()->name }}!</span> 👋</h1>
    <p class="text-slate-500 text-sm mt-1">Anda masuk sebagai <strong class="capitalize">{{ auth()->user()->role }}</strong>. Selamat datang di panel admin Learning Center.</p>
</div>

{{-- STAT CARDS --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="card p-5 hover:-translate-y-1 transition-transform">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:#eff6ff">
                <i class="fa-solid fa-building text-blue-600 text-lg"></i>
            </div>
            <span class="badge badge-blue">Aktif</span>
        </div>
        <div class="text-3xl font-black text-slate-800">{{ $stats['fasilitas'] }}</div>
        <div class="text-sm text-slate-500 mt-1 font-medium">Total Fasilitas</div>
        <a href="{{ route('admin.fasilitas.index') }}" class="text-xs text-blue-600 font-semibold mt-2 inline-flex items-center gap-1 hover:gap-2 transition-all">Kelola <i class="fa-solid fa-arrow-right text-[10px]"></i></a>
    </div>

    <div class="card p-5 hover:-translate-y-1 transition-transform">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:#f0fdf4">
                <i class="fa-solid fa-calendar-days text-green-600 text-lg"></i>
            </div>
            <span class="badge badge-green">{{ $stats['event_aktif'] }} Aktif</span>
        </div>
        <div class="text-3xl font-black text-slate-800">{{ $stats['event'] }}</div>
        <div class="text-sm text-slate-500 mt-1 font-medium">Total Event</div>
        <a href="{{ route('admin.event.index') }}" class="text-xs text-green-600 font-semibold mt-2 inline-flex items-center gap-1 hover:gap-2 transition-all">Kelola <i class="fa-solid fa-arrow-right text-[10px]"></i></a>
    </div>

    <div class="card p-5 hover:-translate-y-1 transition-transform">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:#fefce8">
                <i class="fa-solid fa-star text-yellow-500 text-lg"></i>
            </div>
            <span class="badge badge-yellow">{{ $stats['rating'] }}★ Avg</span>
        </div>
        <div class="text-3xl font-black text-slate-800">{{ $stats['ulasan'] }}</div>
        <div class="text-sm text-slate-500 mt-1 font-medium">Total Ulasan</div>
        <a href="{{ route('admin.ulasan.index') }}" class="text-xs text-yellow-600 font-semibold mt-2 inline-flex items-center gap-1 hover:gap-2 transition-all">Lihat <i class="fa-solid fa-arrow-right text-[10px]"></i></a>
    </div>

    <div class="card p-5 hover:-translate-y-1 transition-transform">
        <div class="flex items-center justify-between mb-3">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center" style="background:#fef2f2">
                <i class="fa-solid fa-envelope text-red-500 text-lg"></i>
            </div>
            @if($stats['kontak_baru'] > 0)
                <span class="badge badge-red">{{ $stats['kontak_baru'] }} Baru</span>
            @else
                <span class="badge badge-gray">Kosong</span>
            @endif
        </div>
        <div class="text-3xl font-black text-slate-800">{{ $stats['kontak'] }}</div>
        <div class="text-sm text-slate-500 mt-1 font-medium">Total Pesan</div>
        <a href="{{ route('admin.kontak.index') }}" class="text-xs text-red-500 font-semibold mt-2 inline-flex items-center gap-1 hover:gap-2 transition-all">Lihat <i class="fa-solid fa-arrow-right text-[10px]"></i></a>
    </div>
</div>

{{-- CHARTS ROW --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

    {{-- Chart Ulasan per Tahun --}}
    <div class="card p-6 lg:col-span-2">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="font-bold text-slate-800">Statistik Ulasan</h3>
                <p class="text-xs text-slate-400 mt-0.5">Jumlah ulasan per bulan tahun {{ date('Y') }}</p>
            </div>
            <span class="badge badge-blue">{{ date('Y') }}</span>
        </div>
        <canvas id="chartUlasan" height="200"></canvas>
    </div>

    {{-- Chart Rating --}}
    <div class="card p-6">
        <div class="mb-5">
            <h3 class="font-bold text-slate-800">Distribusi Rating</h3>
            <p class="text-xs text-slate-400 mt-0.5">Sebaran bintang ulasan</p>
        </div>
        <canvas id="chartRating" height="200"></canvas>
        <div class="mt-4 space-y-2">
            @foreach($ratingDist as $r)
            <div class="flex items-center gap-2 text-xs">
                <span class="text-yellow-500 font-bold w-8">{{ $r['star'] }}★</span>
                <div class="flex-1 bg-slate-100 rounded-full h-2">
                    <div class="bg-yellow-400 h-2 rounded-full" style="width:{{ $r['pct'] }}%"></div>
                </div>
                <span class="text-slate-500 w-6 text-right">{{ $r['count'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- RECENT DATA --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Recent Ulasan --}}
    <div class="card">
        <div class="flex items-center justify-between p-5 border-b border-slate-100">
            <h3 class="font-bold text-slate-800">Ulasan Terbaru</h3>
            <a href="{{ route('admin.ulasan.index') }}" class="text-xs text-blue-600 font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="divide-y divide-slate-100">
            @forelse($recentUlasan as $u)
            <div class="p-4 flex items-start gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm flex-shrink-0">
                    {{ strtoupper(substr($u->nama,0,1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-semibold text-sm text-slate-800 truncate">{{ $u->nama }}</span>
                        <span class="text-yellow-500 text-xs flex-shrink-0">{{ str_repeat('★',$u->rating) }}{{ str_repeat('☆',5-$u->rating) }}</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-0.5 line-clamp-1">{{ $u->ulasan }}</p>
                    <span class="text-[11px] text-slate-400">{{ $u->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @empty
            <div class="p-8 text-center text-slate-400 text-sm">Belum ada ulasan</div>
            @endforelse
        </div>
    </div>

    {{-- Recent Event --}}
    <div class="card">
        <div class="flex items-center justify-between p-5 border-b border-slate-100">
            <h3 class="font-bold text-slate-800">Event Mendatang</h3>
            <a href="{{ route('admin.event.index') }}" class="text-xs text-blue-600 font-semibold hover:underline">Lihat semua →</a>
        </div>
        <div class="divide-y divide-slate-100">
            @forelse($recentEvent as $e)
            <div class="p-4 flex items-start gap-3">
                <div class="w-12 h-12 rounded-xl flex flex-col items-center justify-content-center text-center flex-shrink-0 border border-blue-100" style="background:#eff6ff;justify-content:center">
                    <span class="text-lg font-black text-blue-700 leading-none">{{ \Carbon\Carbon::parse($e->tanggal)->format('d') }}</span>
                    <span class="text-[10px] font-bold text-blue-400 uppercase">{{ \Carbon\Carbon::parse($e->tanggal)->format('M') }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm text-slate-800 truncate">{{ $e->nama }}</p>
                    <p class="text-xs text-slate-500 flex items-center gap-1 mt-0.5"><i class="fa-solid fa-location-dot text-[10px]"></i>{{ $e->lokasi }}</p>
                    <span class="badge badge-{{ $e->jenis=='internal'?'blue':'green' }} mt-1">{{ ucfirst($e->jenis) }}</span>
                </div>
            </div>
            @empty
            <div class="p-8 text-center text-slate-400 text-sm">Belum ada event</div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Chart Ulasan Bulanan
const ctxU = document.getElementById('chartUlasan').getContext('2d');
new Chart(ctxU, {
    type: 'bar',
    data: {
        labels: {!! json_encode($months) !!},
        datasets: [{
            label: 'Jumlah Ulasan',
            data: {!! json_encode($chartData) !!},
            backgroundColor: 'rgba(30,64,175,0.15)',
            borderColor: '#1e40af',
            borderWidth: 2,
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1, font: { size: 11 } }, grid: { color: '#f1f5f9' } },
            x: { ticks: { font: { size: 11 } }, grid: { display: false } }
        }
    }
});

// Chart Rating Donut
const ctxR = document.getElementById('chartRating').getContext('2d');
new Chart(ctxR, {
    type: 'doughnut',
    data: {
        labels: ['5★','4★','3★','2★','1★'],
        datasets: [{
            data: {!! json_encode($ratingDist->pluck('count')) !!},
            backgroundColor: ['#22c55e','#84cc16','#f59e0b','#f97316','#ef4444'],
            borderWidth: 0,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom', labels: { font: { size: 11 }, padding: 12 } } },
        cutout: '65%'
    }
});
</script>
@endpush
