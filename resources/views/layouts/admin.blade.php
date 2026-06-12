<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Learning Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50:  '#eff4ff',
                            100: '#dce8ff',
                            600: '#1e40af',
                            700: '#1b3a99',
                            800: '#172f80',
                            900: '#0f1f52',
                            950: '#0a1438',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
        * { font-family: 'Inter', 'Segoe UI', sans-serif; }

        .sidebar-bg {
            background: linear-gradient(175deg, #0f1f52 0%, #1e3a8a 60%, #1e40af 100%);
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(255,255,255,0.65);
            transition: all 0.2s;
            text-decoration: none;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .nav-link.active {
            background: rgba(255,255,255,0.18);
            color: #fff;
            font-weight: 600;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.12);
        }
        .nav-link .icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            flex-shrink: 0;
            background: rgba(255,255,255,0.08);
        }
        .nav-link.active .icon {
            background: rgba(255,255,255,0.2);
        }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e8edf5;
            box-shadow: 0 1px 4px rgba(15,31,82,0.06);
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .stat-card:hover {
            box-shadow: 0 6px 20px rgba(15,31,82,0.10);
            transform: translateY(-2px);
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50" x-data="{ sidebarOpen: false }">

    {{-- ── SIDEBAR ── --}}
    <aside class="sidebar-bg fixed inset-y-0 left-0 z-50 w-64 flex flex-col transform transition-transform duration-300 ease-in-out md:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        {{-- Branding --}}
        <div class="flex items-center justify-between h-[70px] px-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center flex-shrink-0">
                    <i class="fa-solid fa-graduation-cap text-white text-base"></i>
                </div>
                <div class="leading-tight">
                    <p class="text-white font-bold text-sm">Learning Center</p>
                    <p class="text-blue-200/70 text-[11px]">Sir Michael Uren</p>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="md:hidden text-white/60 hover:text-white">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
            <p class="text-[10px] font-semibold uppercase tracking-widest text-blue-300/50 px-4 mb-3">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-gauge-high"></i></span>
                Dashboard
            </a>

            <a href="#"
               class="nav-link {{ request()->routeIs('admin.fasilitas*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-building"></i></span>
                Fasilitas
            </a>

            <a href="#"
               class="nav-link {{ request()->routeIs('admin.ulasan*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-star"></i></span>
                Ulasan
            </a>

            <a href="#"
               class="nav-link {{ request()->routeIs('admin.event*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-calendar-days"></i></span>
                Event
            </a>
        </nav>

        {{-- User & Logout --}}
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3 px-2 mb-3">
                <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-white text-sm font-semibold truncate">{{ auth()->user()->name }}</p>
                    <p class="text-blue-300/70 text-xs capitalize">{{ auth()->user()->role ?? 'Admin' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="nav-link w-full text-left hover:!bg-red-500/20 hover:!text-red-200">
                    <span class="icon !bg-transparent"><i class="fa-solid fa-right-from-bracket"></i></span>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- Overlay mobile --}}
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm md:hidden"></div>

    {{-- ── MAIN CONTENT ── --}}
    <div class="md:ml-64 min-h-screen flex flex-col">

        {{-- Topbar --}}
        <header class="h-[70px] bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-30"
                style="box-shadow: 0 1px 8px rgba(15,31,82,0.07);">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="md:hidden text-slate-500 hover:text-slate-700">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
                <div class="hidden md:flex items-center gap-2 text-sm">
                    <i class="fa-solid fa-house text-slate-400 text-xs"></i>
                    <i class="fa-solid fa-chevron-right text-slate-300 text-[10px]"></i>
                    <span class="text-navy-800 font-semibold text-slate-700">@yield('page-title', 'Dashboard')</span>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold text-slate-800 leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-[11px] text-slate-400 capitalize leading-tight">{{ auth()->user()->role ?? 'Admin' }}</p>
                </div>
                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0"
                     style="background: linear-gradient(135deg, #1e40af, #0f1f52)">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-6 md:p-8">
            @yield('content')
        </main>

    </div>

</body>
</html>
