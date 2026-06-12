<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// ============================================================
// FILE: app/Http/Controllers/Admin/AboutAdminController.php
// FUNGSI: CRUD Tentang Kami (admin panel)
// ROUTE resource: admin.abouts.*
// Catatan: karena data Tentang Kami biasanya hanya 1 baris,
//   index langsung tampilkan edit jika sudah ada data.
// ============================================================

class AboutAdminController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sejarah'             => ['required', 'string'],
            'profil'              => ['required', 'string'],
            'visi'                => ['required', 'string'],
            'misi'                => ['required', 'string'],
            'struktur_pengelola'  => ['nullable', 'string'],
            'foto_struktur'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        $data = $request->only(['sejarah', 'profil', 'visi', 'misi', 'struktur_pengelola']);

        if ($request->hasFile('foto_struktur')) {
            $data['foto_struktur'] = $request->file('foto_struktur')->store('abouts', 'public');
        }

        About::create($data);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'Data Tentang Kami berhasil disimpan!');
    }

    public function show(About $about)
    {
        return view('admin.abouts.show', compact('about'));
    }

    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'sejarah'            => ['required', 'string'],
            'profil'             => ['required', 'string'],
            'visi'               => ['required', 'string'],
            'misi'               => ['required', 'string'],
            'struktur_pengelola' => ['nullable', 'string'],
            'foto_struktur'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
        ]);

        $data = $request->only(['sejarah', 'profil', 'visi', 'misi', 'struktur_pengelola']);

        if ($request->hasFile('foto_struktur')) {
            if ($about->foto_struktur) Storage::disk('public')->delete($about->foto_struktur);
            $data['foto_struktur'] = $request->file('foto_struktur')->store('abouts', 'public');
        }

        $about->update($data);

        return redirect()->route('admin.abouts.index')
            ->with('success', 'Data Tentang Kami berhasil diperbarui!');
    }

    public function destroy(About $about)
    {
        if ($about->foto_struktur) Storage::disk('public')->delete($about->foto_struktur);
        $about->delete();

        return redirect()->route('admin.abouts.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
