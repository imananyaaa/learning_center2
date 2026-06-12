<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

// ============================================================
// FILE: app/Http/Controllers/Admin/ReviewAdminController.php
// FUNGSI: Admin hanya bisa LIHAT dan HAPUS ulasan
// ROUTE: admin.reviews.*
// ============================================================

class ReviewAdminController extends Controller
{
    /** Daftar semua ulasan */
    public function index(Request $request)
    {
        $query = Review::with(['user', 'facility']);

        // Filter by fasilitas
        if ($request->filled('facility_id')) {
            $query->where('facility_id', $request->facility_id);
        }

        // Filter by rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Search nama user
        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })->orWhere('ulasan', 'like', '%' . $request->search . '%');
        }

        $reviews = $query->latest()->paginate(15);

        // Data untuk filter dropdown
        $facilities = \App\Models\Facility::select('id', 'nama_fasilitas')->get();

        return view('admin.reviews.index', compact('reviews', 'facilities'));
    }

    /** Hapus ulasan */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Ulasan berhasil dihapus!');
    }
}
