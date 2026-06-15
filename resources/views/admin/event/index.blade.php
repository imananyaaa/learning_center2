@extends('layouts.admin')
@section('title','Event')
@section('page-title','Event')
@section('content')
<div class="flex items-center justify-between mb-6">
    <div><h2 class="text-xl font-bold text-slate-800">Kelola Event</h2><p class="text-sm text-slate-500 mt-0.5">Total {{ $events->total() }} event terdaftar</p></div>
    <a href="{{ route('admin.event.create') }}" class="btn-primary"><i class="fa-solid fa-plus"></i> Tambah Event</a>
</div>
<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="tbl-head"><tr>
                <th class="text-left">#</th><th class="text-left">Event</th><th class="text-left">Tanggal</th>
                <th class="text-left">Lokasi</th><th class="text-left">Jenis</th><th class="text-left">Status</th><th class="text-center">Aksi</th>
            </tr></thead>
            <tbody>
                @forelse($events as $i => $e)
                <tr class="tbl-row">
                    <td class="text-slate-400 text-xs">{{ $events->firstItem()+$i }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            @if($e->foto)
                                <img src="{{ Storage::url($e->foto) }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                    <i class="fa-solid fa-calendar text-green-500 text-sm"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-800">{{ $e->nama }}</p>
                                <p class="text-xs text-slate-400">{{ $e->kuota ? $e->kuota.' peserta' : 'Tidak terbatas' }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="font-medium text-slate-700">{{ \Carbon\Carbon::parse($e->tanggal)->format('d M Y') }}</p>
                        <p class="text-xs text-slate-400">{{ $e->waktu }}</p>
                    </td>
                    <td class="text-slate-600 text-sm">{{ $e->lokasi }}</td>
                    <td><span class="badge badge-{{ $e->jenis=='internal'?'blue':'green' }}">{{ ucfirst($e->jenis) }}</span></td>
                    <td><span class="badge badge-{{ $e->status=='aktif'?'green':($e->status=='selesai'?'gray':'red') }}">{{ ucfirst($e->status ?? 'aktif') }}</span></td>
                    <td>
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.event.edit',$e) }}" class="btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                            <button onclick="openDel('{{ route('admin.event.destroy',$e) }}')" class="btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-slate-400">Belum ada event. <a href="{{ route('admin.event.create') }}" class="text-blue-600 font-semibold">Tambah sekarang →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($events->hasPages())<div class="p-4 border-t border-slate-100">{{ $events->links() }}</div>@endif
</div>
@endsection
