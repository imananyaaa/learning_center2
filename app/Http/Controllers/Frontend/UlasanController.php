<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    // Menampilkan halaman ulasan
    public function index()
    {
        // Ambil semua ulasan beserta data user
        $ulasan = Ulasan::with('user')
                    ->latest()
                    ->get();

        // Hitung rata-rata rating
        $rataRating = Ulasan::avg('rating');

        // Hitung jumlah ulasan
        $totalUlasan = Ulasan::count();

        $ratingPersen = [];

        for ($i = 5; $i >= 1; $i--) {

        $jumlah = Ulasan::where('rating', $i)->count();

        $ratingPersen[$i] = $totalUlasan > 0
           ? ($jumlah / $totalUlasan) * 100
           : 0;
        }

        return view('frontend.ulasan', compact(
            'ulasan',
            'rataRating',
            'totalUlasan'
            'ratingPersen'
        ));
    }


    // Menyimpan ulasan baru
    public function store(Request $request)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()
                ->route('register')
                ->with('error', 'Silakan daftar terlebih dahulu untuk memberikan ulasan.');
        }


        // Validasi data
        $request->validate([
            'instansi' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);


        // Simpan ke tabel ulasan
        Ulasan::create([
            'user_id'  => Auth::id(),
            'instansi' => $request->instansi,
            'rating'   => $request->rating,
            'komentar' => $request->komentar,
        ]);


        return redirect()
            ->route('ulasan')
            ->with('success', 'Terima kasih, ulasan Anda berhasil dikirim.');
    }
}
