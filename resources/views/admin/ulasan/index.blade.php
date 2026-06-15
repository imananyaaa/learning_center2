@extends('layouts.admin')
@section('title','Ulasan')
@section('page-title','Kelola Ulasan')
@section('content')
{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([['Total','total','badge-blue'],['Pending','pending','badge-yellow'],['Disetujui','approved','badge-green'],['Ditolak','rejected','badge-red']] as $s)
    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">{{ $stats[$s[1]] }}</div>
        <span class="badge {{ $s[2] }} mt-1">{{ $s[0] }}</span>
    </div>
    @endforeach
</div>

{{-- Filter --}}
<div class="flex gap-3 mb-5 flex-wrap">
    @foreach([''=>'Semua','pending'=>'Pending','approved'=>'Disetujui','rejected'=>'Ditolak'] as $val=>$label)
    <a href="{{ request()->fullUrlWithQuery(['status'=>$val]) }}"
       class="px-4 py-2 rounded-xl text-sm font-semibold border transition-all {{ request('status')===$val ? 'bg-blue-700 text-white border-blue-700' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-300' }}">
        {{ $label }}
    </a>
    @endforeach
</div>

<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="tbl-head"><tr>
            <th class="text-left">#</th><th class="text-left">Pengguna</th><th class="text-left">Rating</th>
            <th class="text-left">Ulasan</th><th class="text-left">Tanggal</th><th class="text-left">Status</th><th class="text-center">Aksi</th>
        </tr></thead>
        <tbody>
            @forelse($ulasan as $i => $u)
            <tr class="tbl-row">
                <td class="text-slate-400 text-xs">{{ $ulasan->firstItem()+$i }}</td>
                <td>
                    <p class="font-semibold text-slate-800">{{ $u->nama }}</p>
                    <p class="text-xs text-slate-400">{{ $u->instansi ?? '-' }}</p>
                </td>
                <td><span class="text-yellow-500 font-bold">{{ str_repeat('★',$u->rating) }}<span class="text-slate-300">{{ str_repeat('★',5-$u->rating) }}</span></span></td>
                <td class="max-w-xs"><p class="text-sm text-slate-700 line-clamp-2">{{ $u->ulasan }}</p></td>
                <td class="text-xs text-slate-500">{{ $u->created_at->format('d M Y') }}</td>
                <td><span class="badge badge-{{ $u->status=='approved'?'green':($u->status=='rejected'?'red':'yellow') }}">{{ ucfirst($u->status) }}</span></td>
                <td>
                    <div class="flex items-center justify-center gap-1.5">
                        @if($u->status !== 'approved')
                        <form action="{{ route('admin.ulasan.approve',$u) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-info py-1.5 px-3 text-xs"><i class="fa-solid fa-check"></i></button>
                        </form>
                        @endif
                        @if($u->status !== 'rejected')
                        <form action="{{ route('admin.ulasan.reject',$u) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-warning py-1.5 px-3 text-xs"><i class="fa-solid fa-ban"></i></button>
                        </form>
                        @endif
                        <button onclick="openDel('{{ route('admin.ulasan.destroy',$u) }}')" class="btn-danger py-1.5 px-3 text-xs"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center py-12 text-slate-400">Belum ada ulasan.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($ulasan->hasPages())<div class="p-4 border-t border-slate-100">{{ $ulasan->links() }}</div>@endif
</div>
@endsection
