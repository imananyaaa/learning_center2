<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tim = [
            [
                'nama' => 'Dr. Ahmad Wijaya',
                'jabatan' => 'Direktur',
                'foto' => '[ui-avatars.com](https://ui-avatars.com/api/?name=Ahmad+Wijaya&background=198754&color=fff&size=200)'
            ],
            [
                'nama' => 'Siti Rahmawati, M.Pd',
                'jabatan' => 'Koordinator Pendidikan',
                'foto' => '[ui-avatars.com](https://ui-avatars.com/api/?name=Siti+Rahmawati&background=198754&color=fff&size=200)'
            ],
            [
                'nama' => 'Budi Santoso, S.Hut',
                'jabatan' => 'Koordinator Konservasi',
                'foto' => '[ui-avatars.com](https://ui-avatars.com/api/?name=Budi+Santoso&background=198754&color=fff&size=200)'
            ],
            [
                'nama' => 'Dewi Lestari, S.Kom',
                'jabatan' => 'Koordinator IT',
                'foto' => '[ui-avatars.com](https://ui-avatars.com/api/?name=Dewi+Lestari&background=198754&color=fff&size=200)'
            ],
        ];

        $sejarah = [
            [
                'tahun' => '2013',
                'judul' => 'Pendirian Learning Center',
                'deskripsi' => 'Learning Center YIARI didirikan sebagai pusat edukasi konservasi.'
            ],
            [
                'tahun' => '2015',
                'judul' => 'Perluasan Fasilitas',
                'deskripsi' => 'Pembangunan aula dan penambahan kamar penginapan.'
            ],
            [
                'tahun' => '2018',
                'judul' => 'Kerjasama Internasional',
                'deskripsi' => 'Memulai kerjasama dengan organisasi konservasi internasional.'
            ],
            [
                'tahun' => '2023',
                'judul' => 'Digitalisasi Layanan',
                'deskripsi' => 'Peluncuran sistem informasi terpadu berbasis website.'
            ],
        ];

        return view('frontend.tentang_kami', compact('tim', 'sejarah'));
    }
}
