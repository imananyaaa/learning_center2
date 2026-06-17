<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Ulasan::with('user')->latest();

        // Filter berdasarkan rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        $ulasan = $query->paginate(15);

        // Statistik ulasan
        $stats = [
            'total' => Ulasan::count(),
            'avg'   => round(Ulasan::avg('rating') ?? 0, 1),
        ];

        return view('admin.ulasan.index', compact('ulasan', 'stats'));
    }


    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();

        return back()->with('success', 'Ulasan berhasil dihapus!');
    }
}
