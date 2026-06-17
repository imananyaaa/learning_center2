@extends('layouts.admin')
@section('title', 'Dashboard — Admin Panel')

@push('styles')
<style>
    /* ── Override layout wrapper backgrounds ── */
    body,
    .main-content,
    .content-wrapper,
    .page-wrapper,
    #content,
    #main,
    .admin-content,
    main {
        background: #dbeeff !important;
    }

    /* ── Dashboard shell ── */
    .dash-shell {
        padding: 1.5rem;
        background: linear-gradient(160deg, #dbeeff 0%, #c7dfff 100%) !important;
        min-height: 100vh;
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    /* ── Welcome card ── */
    .dash-welcome {
        background: #fff;
        border-radius: 18px;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.25rem;
        border: 1.5px solid #93c5fd;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        box-shadow: 0 4px 20px rgba(59,130,246,.08);
    }
    .dash-welcome h1 {
        font-size: 1.4rem;
        font-weight: 800;
        color: #0d3b6e;
        letter-spacing: -.025em;
        margin: 0 0 6px;
    }
    .dash-welcome p {
        color: #4a7fa5;
        font-size: .84rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 7px;
        flex-wrap: wrap;
    }
    .dash-welcome .role-badge {
        background: #dbeafe;
        color: #1e40af;
        font-weight: 700;
        padding: 2px 12px;
        border-radius: 20px;
        font-size: .7rem;
        text-transform: uppercase;
        letter-spacing: .07em;
    }
    .dash-welcome .avatar-icon {
        width: 52px;
        height: 52px;
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
        box-shadow: 0 4px 14px rgba(59,130,246,.35);
    }

    /* ── Stat cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(175px, 1fr));
        gap: 1rem;
        margin-bottom: 1.25rem;
    }
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 1.25rem 1.4rem;
        border: 1.5px solid #bfdbfe;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(59,130,246,.07);
        transition: transform .18s, box-shadow .18s;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(59,130,246,.14);
    }
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--accent);
        border-radius: 16px 16px 0 0;
    }
    .stat-card .s-icon  { font-size: 1.6rem; margin-bottom: .65rem; }
    .stat-card .s-value { font-size: 2.1rem; font-weight: 900; color: var(--clr); line-height: 1; margin-bottom: 3px; }
    .stat-card .s-label { font-size: .7rem; color: #64748b; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; }

    /* ── Bottom grid ── */
    .bottom-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    @media (max-width: 640px) {
        .bottom-grid { grid-template-columns: 1fr; }
    }

    .dash-panel {
        background: #fff;
        border-radius: 16px;
        padding: 1.4rem 1.5rem;
        border: 1.5px solid #bfdbfe;
        box-shadow: 0 2px 12px rgba(59,130,246,.07);
    }
    .dash-panel h3 {
        font-size: .72rem;
        font-weight: 800;
        color: #0d3b6e;
        text-transform: uppercase;
        letter-spacing: .08em;
        margin: 0 0 1rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ── Quick action buttons ── */
    .action-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: .84rem;
        font-weight: 600;
        text-decoration: none;
        margin-bottom: .55rem;
        transition: filter .15s, transform .15s;
        background: var(--bg);
        color: var(--clr);
    }
    .action-btn:last-child { margin-bottom: 0; }
    .action-btn:hover { filter: brightness(.96); transform: translateX(3px); }
    .action-btn .a-icon {
        width: 32px; height: 32px;
        background: var(--ic-bg);
        border-radius: 9px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem; flex-shrink: 0;
    }
    .action-btn .a-arrow { margin-left: auto; opacity: .45; font-size: .75rem; }

    /* ── Activity feed ── */
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: .75rem;
        padding-bottom: .75rem;
        margin-bottom: .1rem;
        border-bottom: 1px solid #eff6ff;
    }
    .activity-item:last-child { border-bottom: none; padding-bottom: 0; }
    .activity-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        background: #3b82f6;
        margin-top: 5px;
        flex-shrink: 0;
        box-shadow: 0 0 0 3px rgba(59,130,246,.15);
    }
    .activity-text  { font-size: .82rem; color: #334155; line-height: 1.45; }
    .activity-time  { font-size: .72rem; color: #94a3b8; margin-top: 2px; }
    .activity-empty { font-size: .83rem; color: #94a3b8; text-align: center; padding: 1.5rem 0; }
</style>
@endpush

@section('content')
<div class="dash-shell">

    {{-- Welcome Card --}}
    <div class="dash-welcome">
        <div>
            <h1>Selamat datang, {{ $user->name }}! 👋</h1>
            <p>
                Anda login sebagai
                <span class="role-badge">{{ ucfirst(str_replace('_', ' ', $user->role)) }}</span>
            </p>
        </div>
        <div class="avatar-icon">🏛️</div>
    </div>

    {{-- Stats --}}
    @php
        $statsData = [
            ['icon' => '🏛️', 'label' => 'Fasilitas',   'value' => $stats['total_fasilitas'], 'clr' => '#1d4ed8', 'accent' => '#3b82f6'],
            ['icon' => '📅', 'label' => 'Total Event',  'value' => $stats['total_event'],     'clr' => '#047857', 'accent' => '#10b981'],
            ['icon' => '⭐', 'label' => 'Ulasan',       'value' => $stats['total_ulasan'],    'clr' => '#b45309', 'accent' => '#f59e0b'],
            ['icon' => '✉️', 'label' => 'Pesan Masuk',  'value' => $stats['total_pesan'],     'clr' => '#6d28d9', 'accent' => '#8b5cf6'],
        ];
    @endphp

    <div class="stats-grid">
        @foreach($statsData as $s)
        <div class="stat-card" style="--clr:{{ $s['clr'] }};--accent:{{ $s['accent'] }};">
            <div class="s-icon">{{ $s['icon'] }}</div>
            <div class="s-value">{{ $s['value'] }}</div>
            <div class="s-label">{{ $s['label'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Bottom Grid --}}
    <div class="bottom-grid">

        {{-- Quick Actions --}}
        <div class="dash-panel">
            <h3>⚡ Aksi Cepat</h3>

            @php
                $actions = [
                    ['icon' => '🏛️', 'label' => 'Lihat Fasilitas', 'bg' => '#eff6ff', 'ic_bg' => '#dbeafe', 'clr' => '#1e40af', 'route' => 'fasilitas'],
                    ['icon' => '📅', 'label' => 'Lihat Event',     'bg' => '#f0fdf4', 'ic_bg' => '#dcfce7', 'clr' => '#166534', 'route' => 'event'],
                ];
            @endphp

            @foreach($actions as $a)
            <a href="{{ route($a['route']) }}" target="_blank" class="action-btn"
               style="--bg:{{ $a['bg'] }};--clr:{{ $a['clr'] }};--ic-bg:{{ $a['ic_bg'] }};">
                <span class="a-icon">{{ $a['icon'] }}</span>
                {{ $a['label'] }}
                <span class="a-arrow">→</span>
            </a>
            @endforeach
        </div>

        {{-- Recent Activity --}}
        <div class="dash-panel">
            <h3>🕐 Aktivitas Terbaru</h3>

            <div style="display:flex;flex-direction:column;">
                @forelse($recentActivities ?? [] as $activity)
                <div class="activity-item">
                    <span class="activity-dot"></span>
                    <div>
                        <div class="activity-text">{{ $activity['text'] }}</div>
                        <div class="activity-time">{{ $activity['time'] }}</div>
                    </div>
                </div>
                @empty
                <p class="activity-empty">Belum ada aktivitas terbaru.</p>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
