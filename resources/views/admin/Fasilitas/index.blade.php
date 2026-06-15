@extends('layouts.admin')
@section('title','Fasilitas')
@section('page-title','Fasilitas')
@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-xl font-bold text-slate-800">Kelola Fasilitas</h2>
        <p class="text-sm text-slate-500 mt-0.5">Total {{ $fasilitas->total() }} fasilitas terdaftar</p>
    </div>
    <a href="{{ route('admin.fasilitas.create') }}" class="btn-primary">
        <i class="fa-solid fa-plus"></i> Tambah Fasilitas
    </a>
</div>

<div class="card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="tbl-head">
                <tr>
                    <th class="text-left">#</th>
                    <th class="text-left">Fasilitas</th>
                    <th class="text-left">Jenis</th>
                    <th class="text-left">Kapasitas</th>
                    <th class="text-left">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fasilitas as $i => $f)
                <tr class="tbl-row">
                    <td class="text-slate-400 text-xs">{{ $fasilitas->firstItem()+$i }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            @if($f->foto)
                                <img src="{{ Storage::url($f->foto) }}" class="w-10 h-10 rounded-lg object-cover border border-slate-200">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                    <i class="fa-solid fa-building text-blue-500 text-sm"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-800">{{ $f->nama }}</p>
                                <p class="text-xs text-slate-400 line-clamp-1 max-w-xs">{{ $f->deskripsi }}</p>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge badge-{{ $f->jenis=='utama'?'blue':'green' }}">{{ ucfirst($f->jenis) }}</span></td>
                    <td class="text-slate-600">{{ $f->kapasitas ? $f->kapasitas.' orang' : '-' }}</td>
                    <td><span class="badge badge-{{ $f->status=='aktif'?'green':'gray' }}">{{ ucfirst($f->status ?? 'aktif') }}</span></td>
                    <td>
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.fasilitas.edit',$f) }}" class="btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                            <button onclick="openDel('{{ route('admin.fasilitas.destroy',$f) }}')" class="btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-12 text-slate-400">Belum ada fasilitas. <a href="{{ route('admin.fasilitas.create') }}" class="text-blue-600 font-semibold">Tambah sekarang →</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($fasilitas->hasPages())
    <div class="p-4 border-t border-slate-100">{{ $fasilitas->links() }}</div>
    @endif
</div>
@endsection
