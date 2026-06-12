<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = [
            'alamat' => 'Jl. Konservasi No. 123, Ketapang, Kalimantan Barat',
            'telepon' => '0534-123456',
            'whatsapp' => '0812-3456-7890',
            'email' => 'info@learningcenter-yiari.org',
            'jam_operasional' => 'Senin - Jumat: 08:00 - 17:00 WIB',
            'maps_embed' => '[google.com](https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6567!2d110.0!3d-1.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sLearning%20Center%20YIARI!5e0!3m2!1sen!2sid!4v1234567890)'
        ];

        $sosialMedia = [
            ['nama' => 'Facebook', 'url' => '[facebook.com](https://facebook.com/yiari)', 'icon' => 'bi-facebook'],
            ['nama' => 'Instagram', 'url' => '[instagram.com](https://instagram.com/yiari)', 'icon' => 'bi-instagram'],
            ['nama' => 'Twitter', 'url' => '[twitter.com](https://twitter.com/yiari)', 'icon' => 'bi-twitter-x'],
            ['nama' => 'YouTube', 'url' => '[youtube.com](https://youtube.com/yiari)', 'icon' => 'bi-youtube'],
        ];

        return view('frontend.kontak', compact('kontak', 'sosialMedia'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|max:2000',
        ]);

        // Di sini Anda bisa menambahkan logika untuk menyimpan pesan ke database
        // atau mengirim email notifikasi

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
    }
}
