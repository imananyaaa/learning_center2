@extends('layouts.admin')
@section('title','Kontak')
@section('page-title','Pesan Masuk')
@section('content')
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    @foreach([['Total','total','badge-blue'],['Baru','baru','badge-red'],['Dibaca','dibaca','badge-yellow'],['Dibalas','dibalas','badge-green']] as $s)
    <div class="card p-4 text-center">
        <div class="text-2xl font-black text-slate-800">{{ $stats[$s[1]] }}</div>
        <span class="badge {{ $s[2] }} mt-1">{{ $s[0] }}</span>
    </div>
    @endforeach
</div>

<div class="flex gap-3 mb-5 flex-wrap">
    @foreach([''=>'Semua','baru'=>'Baru','dibaca'=>'Dibaca','dibalas'=>'Dibalas'] as $val=>$label)
    <a href="{{ request()->fullUrlWithQuery(['status'=>$val]) }}"
       class="px-4 py-2 rounded-xl text-sm font-semibold border transition-all {{ request('status')===$val ? 'bg-blue-700 text-white border-blue-700' : 'bg-white text-slate-600 border-slate-200 hover:border-blue-300' }}">
        {{ $label }}
    </a>
    @endforeach
</div>

<div class="card overflow-hidden">
    <table class="w-full">
        <thead class="tbl-head"><tr>
            <th class="text-left">#</th><th class="text-left">Pengirim</th><th class="text-left">Pesan</th>
            <th class="text-left">Tanggal</th><th class="text-left">Status</th><th class="text-center">Aksi</th>
        </tr></thead>
        <tbody>
            @forelse($kontaks as $i => $k)
            <tr class="tbl-row {{ $k->status=='baru'?'bg-blue-50/40':'' }}">
                <td class="text-slate-400 text-xs">{{ $kontaks->firstItem()+$i }}</td>
                <td>
                    <p class="font-semibold text-slate-800 flex items-center gap-2">
                        {{ $k->nama }}
                        @if($k->status=='baru')<span class="w-2 h-2 rounded-full bg-red-500 inline-block"></span>@endif
                    </p>
                    <p class="text-xs text-slate-400">{{ $k->email }}</p>
                    @if($k->telepon)<p class="text-xs text-slate-400">{{ $k->telepon }}</p>@endif
                </td>
                <td class="max-w-xs"><p class="text-sm text-slate-700 line-clamp-2">{{ $k->pesan }}</p></td>
                <td class="text-xs text-slate-500">{{ $k->created_at->format('d M Y H:i') }}</td>
                <td><span class="badge badge-{{ $k->status=='baru'?'red':($k->status=='dibalas'?'green':'yellow') }}">{{ ucfirst($k->status) }}</span></td>
                <td>
                    <div class="flex items-center justify-center gap-2">
                        <a href="{{ route('admin.kontak.show',$k) }}" class="btn-info"><i class="fa-solid fa-eye"></i></a>
                        <button onclick="openDel('{{ route('admin.kontak.destroy',$k) }}')" class="btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-12 text-slate-400">Belum ada pesan masuk.</td></tr>
            @endforelse
        </tbody>
    </table>
    @if($kontaks->hasPages())<div class="p-4 border-t border-slate-100">{{ $kontaks->links() }}</div>@endif
</div>
@endsection
