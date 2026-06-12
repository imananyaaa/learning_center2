@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Greeting --}}
@php
    $hour  = now()->hour;
    $salam = $hour < 11 ? 'Selamat Pagi' : ($hour < 15 ? 'Selamat Siang' : ($hour < 18 ? 'Selamat Sore' : 'Selamat Malam'));
    $role  = ucfirst(auth()->user()->role ?? 'admin');
@endphp

<div class="mb-8">
    <h2 class="text-2xl font-extrabold text-slate-800">
        {{ $salam }}, <span style="color:#1e40af">{{ auth()->user()->name }}</span>! 👋
    </h2>
    <p class="text-sm text-slate-500 mt-1">
        Anda masuk sebagai <span class="font-semibold text-slate-700">{{ $role }}</span>.
        Selamat datang di panel admin Learning Center Sir Michael Uren.
    </p>
</div>

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

    {{-- Total Ulasan --}}
    <div class="stat-card">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background: linear-gradient(135deg, #fef3c7, #fde68a)">
                <i class="fa-solid fa-star text-amber-500 text-xl"></i>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1">Total Ulasan</p>
                <p class="text-3xl font-extrabold text-slate-800">{{ $totalUlasan }}</p>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-slate-100">
            <a href="#" class="text-xs font-semibold flex items-center gap-1" style="color:#1e40af">
                Lihat semua ulasan <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>
    </div>

    {{-- Fasilitas --}}
    <div class="stat-card">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background: linear-gradient(135deg, #dce8ff, #bfdbfe)">
                <i class="fa-solid fa-building text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1">Fasilitas</p>
                <p class="text-3xl font-extrabold text-slate-800">—</p>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-slate-100">
            <a href="#" class="text-xs font-semibold flex items-center gap-1" style="color:#1e40af">
                Kelola fasilitas <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>
    </div>

    {{-- Event --}}
    <div class="stat-card">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center flex-shrink-0"
                 style="background: linear-gradient(135deg, #dcfce7, #bbf7d0)">
                <i class="fa-solid fa-calendar-days text-emerald-500 text-xl"></i>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-1">Event</p>
                <p class="text-3xl font-extrabold text-slate-800">—</p>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-slate-100">
            <a href="#" class="text-xs font-semibold flex items-center gap-1" style="color:#1e40af">
                Kelola event <i class="fa-solid fa-arrow-right text-[10px]"></i>
            </a>
        </div>
        </div>

</div>

@endsection
