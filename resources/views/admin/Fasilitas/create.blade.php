@extends('layouts.admin')
@section('title','Tambah Fasilitas')
@section('page-title','Tambah Fasilitas')
@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.fasilitas.index') }}" class="text-sm text-slate-500 hover:text-blue-600 flex items-center gap-1 mb-5">
        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
    </a>
    <div class="card p-7">
        <h2 class="text-lg font-bold text-slate-800 mb-6">Tambah Fasilitas Baru</h2>
        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="form-label">Nama Fasilitas <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-input" placeholder="contoh: Ruang Rapat Utama" required>
                    @error('nama')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Jenis <span class="text-red-500">*</span></label>
                        <select name="jenis" class="form-input" required>
                            <option value="">-- Pilih --</option>
                            <option value="utama" {{ old('jenis')=='utama'?'selected':'' }}>Fasilitas Utama</option>
                            <option value="pendukung" {{ old('jenis')=='pendukung'?'selected':'' }}>Fasilitas Pendukung</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Kapasitas (orang)</label>
                        <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" class="form-input" placeholder="30" min="0">
                    </div>
                </div>
                <div>
                    <label class="form-label">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" class="form-input" rows="4" placeholder="Deskripsikan fasilitas ini..." required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Status</label>
                    <select name="status" class="form-input">
                        <option value="aktif" {{ old('status','aktif')=='aktif'?'selected':'' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status')=='nonaktif'?'selected':'' }}>Nonaktif</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Foto Fasilitas</label>
                    <input type="file" name="foto" class="form-input" accept="image/*" onchange="previewImg(this,'prev')">
                    <img id="prev" class="mt-3 rounded-xl h-40 object-cover hidden border border-slate-200">
                    @error('foto')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="flex gap-3 pt-2">
                    <a href="{{ route('admin.fasilitas.index') }}" class="flex-1 py-2.5 text-center rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-50">Batal</a>
                    <button type="submit" class="btn-primary flex-1 justify-center py-2.5"><i class="fa-solid fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
function previewImg(input,id){ if(input.files&&input.files[0]){ const r=new FileReader(); r.onload=e=>{ const img=document.getElementById(id); img.src=e.target.result; img.classList.remove('hidden'); }; r.readAsDataURL(input.files[0]); } }
</script>
@endpush
