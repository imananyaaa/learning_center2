<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Learning Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-bg { background: linear-gradient(175deg,#0f1f52 0%,#1e3a8a 60%,#1e40af 100%); }
        .nav-link { display:flex;align-items:center;gap:12px;padding:10px 14px;border-radius:10px;font-size:.875rem;font-weight:500;color:rgba(255,255,255,.65);transition:all .2s;text-decoration:none; }
        .nav-link:hover { background:rgba(255,255,255,.10);color:#fff; }
        .nav-link.active { background:rgba(255,255,255,.18);color:#fff;font-weight:700;box-shadow:inset 0 0 0 1px rgba(255,255,255,.12); }
        .nav-icon { width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.8rem;flex-shrink:0;background:rgba(255,255,255,.08); }
        .nav-link.active .nav-icon { background:rgba(255,255,255,.22); }
        .nav-section { font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.3);padding:0 14px;margin:14px 0 6px; }
        .card { background:#fff;border-radius:16px;border:1px solid #e8edf5;box-shadow:0 1px 6px rgba(15,31,82,.06); }
        .btn-primary { background:#1e40af;color:#fff;border-radius:10px;padding:9px 20px;font-size:.85rem;font-weight:700;display:inline-flex;align-items:center;gap:7px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-primary:hover { background:#1b3a99;transform:translateY(-1px);color:#fff; }
        .btn-danger { background:#fef2f2;color:#dc2626;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;border:none;cursor:pointer; }
        .btn-danger:hover { background:#dc2626;color:#fff; }
        .btn-warning { background:#fffbeb;color:#d97706;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-warning:hover { background:#f59e0b;color:#fff; }
        .btn-info { background:#eff6ff;color:#2563eb;border-radius:8px;padding:6px 13px;font-size:.78rem;font-weight:700;display:inline-flex;align-items:center;gap:5px;transition:all .2s;text-decoration:none;border:none;cursor:pointer; }
        .btn-info:hover { background:#2563eb;color:#fff; }
        .tbl-head { background:linear-gradient(90deg,#0f1f52,#1e40af); }
        .tbl-head th { padding:12px 16px;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:rgba(255,255,255,.85); }
        .tbl-row td { padding:12px 16px;font-size:.84rem;border-bottom:1px solid #f1f5f9;color:#1e293b; }
        .tbl-row:last-child td { border-bottom:none; }
        .tbl-row:hover td { background:#f8faff; }
        .badge { padding:3px 10px;border-radius:20px;font-size:.7rem;font-weight:700;display:inline-block; }
        .badge-blue { background:#dbeafe;color:#1e40af; }
        .badge-green { background:#dcfce7;color:#16a34a; }
        .badge-yellow { background:#fef9c3;color:#a16207; }
        .badge-red { background:#fee2e2;color:#dc2626; }
        .badge-gray { background:#f1f5f9;color:#475569; }
        .form-input { width:100%;padding:10px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-family:inherit;font-size:.88rem;color:#0f172a;outline:none;transition:all .2s;background:#fff; }
        .form-input:focus { border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.12); }
        textarea.form-input { resize:vertical;min-height:90px; }
        .form-label { font-size:.8rem;font-weight:700;color:#0f172a;margin-bottom:6px;display:block; }
        .form-error { font-size:.74rem;color:#dc2626;margin-top:4px; }
        .alert-s { background:#f0fdf4;border:1px solid #bbf7d0;color:#15803d;padding:12px 16px;border-radius:10px;font-size:.85rem;display:flex;align-items:center;gap:8px;margin-bottom:16px; }
        .alert-e { background:#fef2f2;border:1px solid #fecaca;color:#dc2626;padding:12px 16px;border-radius:10px;font-size:.85rem;display:flex;align-items:center;gap:8px;margin-bottom:16px; }
        .stars { color:#f59e0b; }
    </style>
</head>
<body class="bg-slate-50" x-data="{ sidebar: false }">

{{-- SIDEBAR --}}
<aside class="sidebar-bg fixed inset-y-0 left-0 z-50 w-64 flex flex-col transform transition-transform duration-300 md:translate-x-0"
       :class="sidebar ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
    <div class="flex items-center justify-between h-[68px] px-5 border-b border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('images/logo lc.png') }}" class="w-7 h-7 object-contain rounded"
                     onerror="this.style.display='none';document.getElementById('sb-icon').style.display='block'">
                <i id="sb-icon" class="fa-solid fa-graduation-cap text-white text-base" style="display:none"></i>
            </div>
            <div>
                <p class="text-white font-bold text-sm">Learning Center</p>
                <p class="text-blue-200/60 text-[11px]">Sir Michael Uren</p>
            </div>
        </div>
        <button @click="sidebar=false" class="md:hidden text-white/60 hover:text-white">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>

    <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-0.5">
        <p class="nav-section">Menu Utama</p>
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-gauge-high"></i></span> Dashboard
        </a>

        <p class="nav-section">Pengelolaan</p>
        <a href="{{ route('admin.fasilitas.index') }}" class="nav-link {{ request()->routeIs('admin.fasilitas*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-building"></i></span> Fasilitas
        </a>
        <a href="{{ route('admin.event.index') }}" class="nav-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-calendar-days"></i></span> Event
        </a>
        <a href="{{ route('admin.ulasan.index') }}" class="nav-link {{ request()->routeIs('admin.ulasan*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-star"></i></span> Ulasan
            @php $newUlasan = \App\Models\Ulasan::where('status','pending')->count(); @endphp
            @if($newUlasan > 0)
                <span class="ml-auto bg-yellow-400 text-yellow-900 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $newUlasan }}</span>
            @endif
        </a>
        <a href="{{ route('admin.kontak.index') }}" class="nav-link {{ request()->routeIs('admin.kontak*') ? 'active' : '' }}">
            <span class="nav-icon"><i class="fa-solid fa-envelope"></i></span> Kontak
            @php $newKontak = \App\Models\Kontak::where('status','baru')->count(); @endphp
            @if($newKontak > 0)
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $newKontak }}</span>
            @endif
        </a>
    </nav>

    <div class="p-4 border-t border-white/10 flex-shrink-0">
        <div class="flex items-center gap-3 px-2 mb-3">
            <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                <p class="text-blue-300/70 text-xs capitalize">{{ auth()->user()->role }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link w-full text-left hover:!bg-red-500/20 hover:!text-red-300">
                <span class="nav-icon !bg-transparent"><i class="fa-solid fa-right-from-bracket"></i></span> Keluar
            </button>
        </form>
    </div>
</aside>

<div x-show="sidebar" x-cloak @click="sidebar=false" class="fixed inset-0 z-40 bg-black/50 md:hidden"></div>

{{-- MAIN --}}
<div class="md:ml-64 min-h-screen flex flex-col">
    <header class="h-[68px] bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30" style="box-shadow:0 1px 6px rgba(15,31,82,.07)">
        <div class="flex items-center gap-4">
            <button @click="sidebar=true" class="md:hidden text-slate-500 hover:text-slate-700">
                <i class="fa-solid fa-bars text-xl"></i>
            </button>
            <div class="flex items-center gap-2 text-sm text-slate-500">
                <i class="fa-solid fa-house text-xs"></i>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="font-semibold text-slate-700">@yield('page-title','Dashboard')</span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" target="_blank" class="text-slate-400 hover:text-blue-600 text-sm font-medium flex items-center gap-1.5">
                <i class="fa-solid fa-globe text-xs"></i><span class="hidden sm:inline">Website</span>
            </a>
            <div class="w-px h-5 bg-slate-200"></div>
            <div class="text-right hidden sm:block">
                <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-slate-400 capitalize">{{ auth()->user()->role }}</p>
            </div>
            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background:linear-gradient(135deg,#1e40af,#0f1f52)">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>
        </div>
    </header>

    <main class="flex-1 p-6 md:p-8">
        @if(session('success'))
        <div class="alert-s mb-4"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert-e mb-4"><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</div>

{{-- DELETE MODAL --}}
<div id="delModal" style="display:none" class="fixed inset-0 z-[9999] bg-black/50 backdrop-blur-sm flex items-center justify-center" onclick="if(event.target===this)closeDel()">
    <div class="bg-white rounded-2xl p-7 max-w-sm w-full mx-4 text-center shadow-2xl">
        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-trash text-red-500 text-2xl"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-800 mb-2">Hapus Data?</h3>
        <p class="text-slate-500 text-sm mb-6">Data yang dihapus <strong>tidak dapat dikembalikan</strong>.</p>
        <div class="flex gap-3">
            <button onclick="closeDel()" class="flex-1 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</button>
            <form id="delForm" method="POST" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" class="w-full py-2.5 rounded-xl bg-red-500 text-white font-bold text-sm hover:bg-red-600">Ya, Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function openDel(url){ document.getElementById('delForm').action=url; document.getElementById('delModal').style.display='flex'; }
function closeDel(){ document.getElementById('delModal').style.display='none'; }
document.querySelectorAll('.alert-s,.alert-e').forEach(el=>{
    setTimeout(()=>{ el.style.transition='opacity .5s'; el.style.opacity='0'; setTimeout(()=>el.remove(),500); },4000);
});
</script>
@stack('scripts')
</body>
</html>
