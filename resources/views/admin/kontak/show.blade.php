@extends('layouts.admin')
@section('title','Detail Pesan')
@section('page-title','Detail Pesan')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.kontak.index') }}" class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5"><i class="fa-solid fa-arrow-left text-xs"></i> Kembali</a>
    <div class="card p-7 mb-5">
        <div class="flex items-start justify-between mb-5">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-lg">{{ strtoupper(substr($kontak->nama,0,1)) }}</div>
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">{{ $kontak->nama }}</h3>
                    <p class="text-sm text-slate-500">{{ $kontak->email }} {{ $kontak->telepon ? '· '.$kontak->telepon : '' }}</p>
                </div>
            </div>
            <span class="badge badge-{{ $kontak->status=='baru'?'red':($kontak->status=='dibalas'?'green':'yellow') }}">{{ ucfirst($kontak->status) }}</span>
        </div>
        <div class="bg-slate-50 rounded-xl p-5 border border-slate-100">
            <p class="text-xs font-bold text-slate-400 uppercase mb-3">Pesan</p>
            <p class="text-slate-700 leading-relaxed">{{ $kontak->pesan }}</p>
        </div>
        <p class="text-xs text-slate-400 mt-3">Dikirim: {{ $kontak->created_at->format('d F Y, H:i') }} WIB</p>
    </div>

    {{-- Balasan --}}
    <div class="card p-7">
        <h4 class="font-bold text-slate-800 mb-4">Tulis Balasan</h4>
        @if($kontak->balasan)
        <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5">
            <p class="text-xs font-bold text-green-700 mb-2">Balasan Tersimpan:</p>
            <p class="text-sm text-green-800">{{ $kontak->balasan }}</p>
        </div>
        @endif
        <form action="{{ route('admin.kontak.balas',$kontak) }}" method="POST">
            @csrf @method('PATCH')
            <div class="mb-4">
                <label class="form-label">Balasan</label>
                <textarea name="balasan" class="form-input" rows="5" placeholder="Tulis balasan untuk pesan ini...">{{ old('balasan',$kontak->balasan) }}</textarea>
                @error('balasan')<p class="form-error">{{ $message }}</p>@enderror
            </div>
            <button type="submit" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Simpan Balasan</button>
        </form>
    </div>
</div>
@endsection
