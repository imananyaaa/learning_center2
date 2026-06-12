<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;

// ============================================================
// FILE: app/Http/Controllers/Admin/GuideAdminController.php
// FUNGSI: CRUD Panduan (admin panel)
// ROUTE resource: admin.guides.*
// ============================================================

class GuideAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Guide::query();
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $guides = $query->latest()->paginate(10);
        return view('admin.guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'isi'   => ['required', 'string'],
        ], [
            'judul.required' => 'Judul panduan wajib diisi.',
            'isi.required'   => 'Isi panduan wajib diisi.',
        ]);

        Guide::create($request->only(['judul', 'isi']));

        return redirect()->route('admin.guides.index')
            ->with('success', 'Panduan berhasil ditambahkan!');
    }

    public function show(Guide $guide)
    {
        return view('admin.guides.show', compact('guide'));
    }

    public function edit(Guide $guide)
    {
        return view('admin.guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:200'],
            'isi'   => ['required', 'string'],
        ]);

        $guide->update($request->only(['judul', 'isi']));

        return redirect()->route('admin.guides.index')
            ->with('success', 'Panduan berhasil diperbarui!');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('admin.guides.index')
            ->with('success', 'Panduan berhasil dihapus!');
    }
}
