@extends('layouts.admin')
@section('title','Edit Event')
@section('page-title','Edit Event')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.event.index') }}" class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5"><i class="fa-solid fa-arrow-left text-xs"></i> Kembali</a>
    <div class="card p-7">
        <h2 class="text-lg font-bold text-slate-800 mb-6">Edit Event</h2>
        <form action="{{ route('admin.event.update',$event) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                <div>
                    <label class="form-label">Nama Event <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama',$event->nama) }}" class="form-input" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal',$event->tanggal) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Waktu</label>
                        <input type="time" name="waktu" value="{{ old('waktu',$event->waktu) }}" class="form-input" required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Jenis</label>
                        <select name="jenis" class="form-input">
                            <option value="internal" {{ old('jenis',$event->jenis)=='internal'?'selected':'' }}>Internal</option>
                            <option value="eksternal" {{ old('jenis',$event->jenis)=='eksternal'?'selected':'' }}>Eksternal</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Kuota</label>
                        <input type="number" name="kuota" value="{{ old('kuota',$event->kuota) }}" class="form-input" min="0">
                    </div>
                </div>
                <div>
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi',$event->lokasi) }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-input" rows="4" required>{{ old('deskripsi',$event->deskripsi) }}</textarea>
                </div>
                <div>
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input">
                        <option value="aktif" {{ old('status',$event->status)=='aktif'?'selected':'' }}>Aktif</option>
                        <option value="selesai" {{ old('status',$event->status)=='selesai'?'selected':'' }}>Selesai</option>
                        <option value="dibatalkan" {{ old('status',$event->status)=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Foto Event</label>
                    @if($event->foto)
                        <img src="{{ Storage::url($event->foto) }}" id="prev" class="mb-3 rounded-xl h-36 object-cover border border-slate-200">
                    @else
                        <img id="prev" class="mb-3 rounded-xl h-36 object-cover hidden border border-slate-200">
                    @endif
                    <input type="file" name="foto" class="form-input" accept="image/*" onchange="previewImg(this,'prev')">
                </div>
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('admin.event.index') }}" class="flex-1 py-2.5 text-center rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm">Batal</a>
                    <button type="submit" class="btn-primary flex-1 justify-center py-2.5"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>function previewImg(input,id){ if(input.files&&input.files[0]){ const r=new FileReader(); r.onload=e=>{ const img=document.getElementById(id); img.src=e.target.result; img.classList.remove('hidden'); }; r.readAsDataURL(input.files[0]); } }</script>
@endpush
