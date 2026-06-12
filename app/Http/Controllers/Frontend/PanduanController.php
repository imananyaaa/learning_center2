<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PanduanController extends Controller
{
    public function index()
    {
        $panduanReservasi = [
            [
                'step' => 1,
                'judul' => 'Pilih Fasilitas',
                'deskripsi' => 'Kunjungi halaman Fasilitas dan pilih fasilitas yang ingin Anda gunakan.',
                'icon' => 'bi-search'
            ],
            [
                'step' => 2,
                'judul' => 'Hubungi Admin',
                'deskripsi' => 'Hubungi admin melalui WhatsApp atau email untuk mengecek ketersediaan.',
                'icon' => 'bi-chat-dots'
            ],
            [
                'step' => 3,
                'judul' => 'Konfirmasi Booking',
                'deskripsi' => 'Isi formulir pemesanan dan lakukan pembayaran DP minimal 50%.',
                'icon' => 'bi-clipboard-check'
            ],
            [
                'step' => 4,
                'judul' => 'Selesai',
                'deskripsi' => 'Anda akan menerima konfirmasi pemesanan melalui email atau WhatsApp.',
                'icon' => 'bi-check-circle'
            ],
        ];

        $faq = [
            [
                'pertanyaan' => 'Bagaimana cara melakukan reservasi fasilitas?',
                'jawaban' => 'Anda dapat menghubungi kami melalui WhatsApp di 0812-3456-7890 atau email ke info@learningcenter-yiari.org. Tim kami akan membantu proses reservasi Anda.'
            ],
            [
                'pertanyaan' => 'Berapa lama waktu minimal pemesanan?',
                'jawaban' => 'Pemesanan minimal dilakukan 3 hari sebelum tanggal penggunaan. Untuk event besar, disarankan melakukan pemesanan 2 minggu sebelumnya.'
            ],
            [
                'pertanyaan' => 'Apakah tersedia paket katering?',
                'jawaban' => 'Ya, kami menyediakan paket katering dengan menu variatif. Harga mulai dari Rp 35.000/orang untuk snack dan Rp 50.000/orang untuk makan siang/malam.'
            ],
            [
                'pertanyaan' => 'Bagaimana kebijakan pembatalan?',
                'jawaban' => 'Pembatalan dapat dilakukan maksimal 7 hari sebelum tanggal penggunaan dengan pengembalian DP 50%. Pembatalan kurang dari 7 hari tidak mendapat pengembalian.'
            ],
            [
                'pertanyaan' => 'Apakah ada diskon untuk pemesanan rutin?',
                'jawaban' => 'Ya, kami memberikan diskon 10-20% untuk pemesanan rutin atau kerjasama jangka panjang. Silakan hubungi admin untuk informasi lebih lanjut.'
            ],
            [
                'pertanyaan' => 'Apa saja yang perlu dibawa saat menginap?',
                'jawaban' => 'Kamar sudah dilengkapi dengan handuk, sabun, dan perlengkapan mandi dasar. Anda cukup membawa pakaian pribadi dan kebutuhan personal lainnya.'
            ],
        ];

        $dokumen = [
            [
                'nama' => 'Formulir Pemesanan Fasilitas',
                'file' => '#',
                'ukuran' => '125 KB',
                'tipe' => 'PDF'
            ],
            [
                'nama' => 'Syarat dan Ketentuan',
                'file' => '#',
                'ukuran' => '89 KB',
                'tipe' => 'PDF'
            ],
            [
                'nama' => 'Daftar Harga Fasilitas 2026',
                'file' => '#',
                'ukuran' => '156 KB',
                'tipe' => 'PDF'
            ],
            [
                'nama' => 'Paket Katering',
                'file' => '#',
                'ukuran' => '234 KB',
                'tipe' => 'PDF'
            ],
        ];

        return view('frontend.panduan', compact('panduanReservasi', 'faq', 'dokumen'));
    }
}
