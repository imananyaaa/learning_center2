@extends('layouts.admin')

@section('title','Ulasan')
@section('page-title','Kelola Ulasan')

@section('content')

{{-- Statistik --}}
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">
            {{ $stats['total'] }}
        </div>
        <span class="badge badge-blue mt-1">
            Total Ulasan
        </span>
    </div>

    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">
            {{ $stats['avg'] }}
            ⭐
        </div>
        <span class="badge badge-yellow mt-1">
            Rata-rata Rating
        </span>
    </div>
</div>


{{-- Tabel Ulasan --}}
<div class="card overflow-hidden">

    <table class="w-full">

        <thead class="tbl-head">
            <tr>
                <th class="text-left">#</th>
                <th class="text-left">Pengguna</th>
                <th class="text-left">Instansi</th>
                <th class="text-left">Rating</th>
                <th class="text-left">Komentar</th>
                <th class="text-left">Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($ulasan as $i => $u)

            <tr class="tbl-row">

                <td class="text-slate-400 text-xs">
                    {{ $ulasan->firstItem() + $i }}
                </td>

                <td class="font-semibold text-slate-800">
                    {{ $u->user->name ?? 'User tidak ditemukan' }}
                </td>

                <td>
                    {{ $u->instansi ?? '-' }}
                </td>

                <td class="text-yellow-500 font-bold">
                    {{ str_repeat('★', $u->rating) }}
                    <span class="text-slate-300">
                        {{ str_repeat('★', 5 - $u->rating) }}
                    </span>
                </td>

                <td class="max-w-xs">
                    <p class="text-sm text-slate-700 line-clamp-2">
                        {{ $u->komentar }}
                    </p>
                </td>

                <td class="text-xs text-slate-500">
                    {{ $u->created_at->format('d M Y') }}
                </td>


                <td>
                    <div class="flex justify-center">

                        <button
                            onclick="openDel('{{ route('admin.ulasan.destroy', $u) }}')"
                            class="btn-danger py-1.5 px-3 text-xs">

                            <i class="fa-solid fa-trash"></i>

                        </button>

                    </div>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="7"
                    class="text-center py-12 text-slate-400">
                    Belum ada ulasan.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>


    @if($ulasan->hasPages())

        <div class="p-4 border-t border-slate-100">
            {{ $ulasan->links() }}
        </div>

    @endif

</div>

@endsection
