<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = [
            [
                'judul' => 'Pelatihan Konservasi Satwa Liar',
                'tanggal' => '15-17 Juni 2026',
                'waktu' => '08:00 - 17:00 WIB',
                'lokasi' => 'Aula Learning Center YIARI',
                'deskripsi' => 'Workshop intensif tentang teknik konservasi satwa liar untuk mahasiswa dan profesional di bidang lingkungan.',
                'kuota' => 50,
                'pendaftar' => 35,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1474511320723-9a56873571b7?w=600)',
                'kategori' => 'Workshop'
            ],
            [
                'judul' => 'Seminar Lingkungan Hidup',
                'tanggal' => '20 Juni 2026',
                'waktu' => '09:00 - 15:00 WIB',
                'lokasi' => 'Aula Learning Center YIARI',
                'deskripsi' => 'Diskusi panel mengenai isu-isu lingkungan terkini dengan pembicara dari berbagai institusi.',
                'kuota' => 100,
                'pendaftar' => 78,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1552664730-d307ca884978?w=600)',
                'kategori' => 'Seminar'
            ],
            [
                'judul' => 'Workshop Edukasi Masyarakat',
                'tanggal' => '25-26 Juni 2026',
                'waktu' => '08:00 - 16:00 WIB',
                'lokasi' => 'Ruang Kelas Learning Center',
                'deskripsi' => 'Pelatihan untuk relawan dalam menyampaikan edukasi lingkungan kepada masyarakat.',
                'kuota' => 30,
                'pendaftar' => 28,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600)',
                'kategori' => 'Workshop'
            ],
            [
                'judul' => 'Camp Konservasi Junior',
                'tanggal' => '1-3 Juli 2026',
                'waktu' => '3 Hari 2 Malam',
                'lokasi' => 'Area Outdoor Learning Center',
                'deskripsi' => 'Program camping edukatif untuk anak-anak usia 10-15 tahun tentang pelestarian lingkungan.',
                'kuota' => 40,
                'pendaftar' => 15,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=600)',
                'kategori' => 'Camp'
            ],
        ];

        $pastEvents = [
            [
                'judul' => 'Peringatan Hari Lingkungan Hidup',
                'tanggal' => '5 Juni 2026',
                'peserta' => 150,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?w=400)'
            ],
            [
                'judul' => 'Training of Trainers Konservasi',
                'tanggal' => '20-22 Mei 2026',
                'peserta' => 25,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=400)'
            ],
            [
                'judul' => 'Webinar Satwa Endemik Indonesia',
                'tanggal' => '10 Mei 2026',
                'peserta' => 200,
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1591115765373-5207764f72e7?w=400)'
            ],
        ];

        return view('frontend.event', compact('upcomingEvents', 'pastEvents'));
    }
}
