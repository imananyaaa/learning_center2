<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $fasilitas = [
            [
                'nama' => 'Ruang Rapat',
                'deskripsi' => 'Fasilitas untuk rapat dan diskusi dengan kapasitas 20 orang.',
                'icon' => 'bi-people-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1431540015161-0bf868a2d407?w=400)'
            ],
            [
                'nama' => 'Aula',
                'deskripsi' => 'Fasilitas untuk seminar dan pelatihan dengan kapasitas 100 orang.',
                'icon' => 'bi-building',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400)'
            ],
            [
                'nama' => 'Kamar',
                'deskripsi' => 'Fasilitas penginapan peserta kegiatan dengan 15 kamar tersedia.',
                'icon' => 'bi-house-door-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400)'
            ],
        ];

        $events = [
            [
                'judul' => 'Pelatihan Konservasi Satwa',
                'tanggal' => '15 Juni 2026',
                'deskripsi' => 'Workshop tentang teknik konservasi satwa liar.',
                'status' => 'upcoming'
            ],
            [
                'judul' => 'Seminar Lingkungan Hidup',
                'tanggal' => '20 Juni 2026',
                'deskripsi' => 'Diskusi mengenai isu-isu lingkungan terkini.',
                'status' => 'upcoming'
            ],
            [
                'judul' => 'Workshop Edukasi Masyarakat',
                'tanggal' => '25 Juni 2026',
                'deskripsi' => 'Pelatihan untuk relawan edukasi lingkungan.',
                'status' => 'upcoming'
            ],
        ];

        $statistik = [
            'tahun_aktif' => date('Y') - 2013,
            'total_peserta' => 5000,
            'total_event' => 250,
            'total_mitra' => 50
        ];

        return view('frontend.home', compact('fasilitas', 'events', 'statistik'));
    }
}
