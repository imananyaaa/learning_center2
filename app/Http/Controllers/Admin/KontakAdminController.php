<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class KontakAdminController extends Controller
{
    public function index()
    {
        // Ambil semua pesan kontak terbaru
        $kontaks = PesanKontak::latest()->paginate(15);

        // Statistik kontak
        $stats = [
            'total' => PesanKontak::count(),
            'baru' => PesanKontak::where('status_baca', false)->count(),
        ];

        return view('admin.kontak.index', compact('kontaks', 'stats'));
    }


    public function show(PesanKontak $kontak)
    {
        $kontak->update([
        'status_baca' => true
        ]);

        return view('admin.kontak.show', compact('kontak'));
    }


    public function destroy(PesanKontak $kontak)
    {
        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}
