<?php
// ============================================================
// FILE: app/Http/Controllers/Admin/GalleryAdminController.php
// FUNGSI: CRUD Galeri (admin panel)
// ROUTE resource: admin.galleries.*
// ============================================================

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $galleries = $query->latest()->paginate(12);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'foto'  => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'judul.required' => 'Judul foto wajib diisi.',
            'foto.required'  => 'Foto wajib diunggah.',
        ]);

        Gallery::create([
            'judul' => $request->judul,
            'foto'  => $request->file('foto')->store('galleries', 'public'),
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'foto'  => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = ['judul' => $request->judul];

        if ($request->hasFile('foto')) {
            if ($gallery->foto) Storage::disk('public')->delete($gallery->foto);
            $data['foto'] = $request->file('foto')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->foto) Storage::disk('public')->delete($gallery->foto);
        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus!');
    }
}
