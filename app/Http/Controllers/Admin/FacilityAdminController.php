<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// ============================================================
// FILE: app/Http/Controllers/Admin/FacilityAdminController.php
// FUNGSI: CRUD Fasilitas (admin panel)
// ROUTE resource: admin.facilities.*
// ============================================================

class FacilityAdminController extends Controller
{
    /** Daftar semua fasilitas dengan search + pagination */
    public function index(Request $request)
    {
        $query = Facility::withCount('reviews')
                         ->withAvg('reviews', 'rating');

        // Search
        if ($request->filled('search')) {
            $query->where('nama_fasilitas', 'like', '%' . $request->search . '%');
        }

        $facilities = $query->latest()->paginate(10);

        return view('admin.facilities.index', compact('facilities'));
    }

    /** Form tambah fasilitas */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /** Simpan fasilitas baru */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => ['required', 'string', 'max:150'],
            'deskripsi'      => ['required', 'string'],
            'foto'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ], [
            'nama_fasilitas.required' => 'Nama fasilitas wajib diisi.',
            'deskripsi.required'      => 'Deskripsi wajib diisi.',
            'foto.image'              => 'File harus berupa gambar.',
            'foto.max'                => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('facilities', 'public');
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /** Detail fasilitas + ulasan */
    public function show(Facility $facility)
    {
        $facility->load(['reviews.user']);
        $avgRating = $facility->reviews->avg('rating');

        return view('admin.facilities.show', compact('facility', 'avgRating'));
    }

    /** Form edit fasilitas */
    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    /** Update fasilitas */
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'nama_fasilitas' => ['required', 'string', 'max:150'],
            'deskripsi'      => ['required', 'string'],
            'foto'           => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = $request->only(['nama_fasilitas', 'deskripsi']);

        // Ganti foto jika ada upload baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($facility->foto) {
                Storage::disk('public')->delete($facility->foto);
            }
            $data['foto'] = $request->file('foto')->store('facilities', 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /** Hapus fasilitas */
    public function destroy(Facility $facility)
    {
        // Hapus foto dari storage
        if ($facility->foto) {
            Storage::disk('public')->delete($facility->foto);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }
}
