<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = [
            [
                'nama' => 'Ruang Rapat',
                'deskripsi' => 'Ruang rapat modern dengan fasilitas lengkap untuk meeting dan diskusi. Dilengkapi dengan AC, proyektor, whiteboard, dan koneksi WiFi.',
                'kapasitas' => '20 orang',
                'harga' => 'Rp 500.000/hari',
                'icon' => 'bi-people-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1431540015161-0bf868a2d407?w=600)',
                'fitur' => ['AC', 'Proyektor', 'Whiteboard', 'WiFi', 'Sound System']
            ],
            [
                'nama' => 'Aula Serbaguna',
                'deskripsi' => 'Aula besar untuk seminar, pelatihan, dan acara berskala besar. Dilengkapi dengan panggung, sound system profesional, dan area parkir luas.',
                'kapasitas' => '100 orang',
                'harga' => 'Rp 2.000.000/hari',
                'icon' => 'bi-building',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600)',
                'fitur' => ['Panggung', 'Sound System', 'AC Central', 'Proyektor', 'Parkir Luas']
            ],
            [
                'nama' => 'Kamar Penginapan',
                'deskripsi' => 'Kamar nyaman untuk peserta kegiatan yang memerlukan penginapan. Tersedia kamar twin dan double dengan fasilitas kamar mandi dalam.',
                'kapasitas' => '2-4 orang/kamar',
                'harga' => 'Rp 300.000/malam',
                'icon' => 'bi-house-door-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600)',
                'fitur' => ['AC', 'Kamar Mandi Dalam', 'TV', 'WiFi', 'Sarapan']
            ],
            [
                'nama' => 'Ruang Kelas',
                'deskripsi' => 'Ruang kelas untuk kegiatan pelatihan dan workshop dengan setting yang fleksibel.',
                'kapasitas' => '30 orang',
                'harga' => 'Rp 750.000/hari',
                'icon' => 'bi-book-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600)',
                'fitur' => ['AC', 'Proyektor', 'Meja & Kursi', 'WiFi', 'Papan Tulis']
            ],
            [
                'nama' => 'Area Outdoor',
                'deskripsi' => 'Area terbuka untuk kegiatan outbound, camping, dan aktivitas luar ruangan lainnya.',
                'kapasitas' => '200 orang',
                'harga' => 'Rp 1.500.000/hari',
                'icon' => 'bi-tree-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=600)',
                'fitur' => ['Lapangan Luas', 'Toilet', 'Mushola', 'Gazebo', 'Area Parkir']
            ],
            [
                'nama' => 'Kantin',
                'deskripsi' => 'Kantin dengan menu makanan dan minuman lengkap untuk peserta kegiatan.',
                'kapasitas' => '50 orang',
                'harga' => 'Paket Katering Tersedia',
                'icon' => 'bi-cup-hot-fill',
                'gambar' => '[images.unsplash.com](https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600)',
                'fitur' => ['Menu Variatif', 'Halal', 'Paket Katering', 'Coffee Break']
            ],
        ];

        return view('frontend.fasilitas', compact('fasilitas'));
        }
}
