@extends('layouts.admin')

@section('title','Kontak')
@section('page-title','Pesan Masuk')

@section('content')

{{-- Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">
            {{ $stats['total'] }}
        </div>
        <span class="badge badge-blue mt-1">
            Total Pesan
        </span>
    </div>
</div>


{{-- Tabel Pesan --}}
<div class="card overflow-hidden">

    <table class="w-full">

        <thead class="tbl-head">
            <tr>
                <th class="text-left">#</th>
                <th class="text-left">Pengirim</th>
                <th class="text-left">Tujuan</th>
                <th class="text-left">Pesan</th>
                <th class="text-left">Status</th>
                <th class="text-left">Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>


        <tbody>

        @forelse($kontaks as $i => $k)

            <tr class="tbl-row">

                <td class="text-slate-400 text-xs">
                    {{ $kontaks->firstItem() + $i }}
                </td>

                <td>
                    <p class="font-semibold text-slate-800">
                        {{ $k->nama }}
                    </p>

                    <p class="text-xs text-slate-400">
                        {{ $k->email }}
                    </p>

                    @if($k->telepon)
                        <p class="text-xs text-slate-400">
                            {{ $k->telepon }}
                        </p>
                    @endif
                </td>


                <td>
                    {{ $k->tujuan }}
                </td>

                <td class="max-w-xs">
                    <p class="text-sm text-slate-700 line-clamp-2">
                        {{ $k->pesan }}
                    </p>
                </td>

                <td>
                    @if($k->status_baca)
                        <span class="badge badge-green">
                            Dibaca
                        </span>

                    @else
                        <span class="badge badge-red">
                            Baru
                        </span>
                    @endif
                </td>


                <td class="text-xs text-slate-500">
                    {{ $k->created_at ? $k->created_at->format('d M Y H:i') : '-' }}
                </td>


                <td>
                    <div class="flex items-center justify-center gap-2">

                        {{-- Lihat detail --}}
                        <a href="{{ route('admin.kontak.show', $k) }}"
                           class="btn-info">
                            <i class="fa-solid fa-eye"></i>
                        </a>


                        {{-- Hapus --}}
                        <button
                            onclick="openDel('{{ route('admin.kontak.destroy', $k) }}')"
                            class="btn-danger">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7"
                    class="text-center py-12 text-slate-400">
                    Belum ada pesan masuk.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>


    {{-- Pagination --}}
    @if($kontaks->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $kontaks->links() }}
        </div>
    @endif

</div>

@endsection
