<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Data dummy untuk user (nanti akan diambil dari auth)
        $user = null; // Auth::user() nanti
        $role = null; // 'Super Admin', 'Admin', 'Sekretariat', 'Member', 'Direktur'

        // Data dummy statistik kunjungan
        $dataKunjungan = [
            ['bulan' => '2025-05', 'total' => 120],
            ['bulan' => '2025-06', 'total' => 150],
            ['bulan' => '2025-07', 'total' => 180],
            ['bulan' => '2025-08', 'total' => 200],
            ['bulan' => '2025-09', 'total' => 175],
            ['bulan' => '2025-10', 'total' => 220],
        ];

        // Data dummy genre koleksi
        $dataGenre = [
            ['genre' => 'Kedokteran', 'total' => 85],
            ['genre' => 'Kesehatan', 'total' => 72],
            ['genre' => 'Anatomi', 'total' => 65],
            ['genre' => 'Farmasi', 'total' => 58],
            ['genre' => 'Manajemen', 'total' => 45],
        ];

        // Data dummy view dokumen
        $dataDokumen = [
            ['tipe' => 'Panduan', 'total' => 125],
            ['tipe' => 'Pedoman', 'total' => 98],
            ['tipe' => 'SOP', 'total' => 142],
        ];

        // Data dummy promkes
        $dataPromkes = [
            ['bulan' => '2025-05', 'total' => 45],
            ['bulan' => '2025-06', 'total' => 52],
            ['bulan' => '2025-07', 'total' => 68],
            ['bulan' => '2025-08', 'total' => 75],
            ['bulan' => '2025-09', 'total' => 62],
            ['bulan' => '2025-10', 'total' => 88],
        ];

        // Data dummy artikel
        $artikel = [
            [
                'id' => 1,
                'judul' => 'Pentingnya Pola Hidup Sehat',
                'deskripsi' => 'Menerapkan pola hidup sehat dapat meningkatkan kualitas hidup dan mencegah berbagai penyakit.',
                'image_url' => asset('images/artikel/artikel-1.jpeg'),
                'tanggal' => '2025-11-01',
            ],
            [
                'id' => 2,
                'judul' => 'Inovasi Teknologi Kesehatan',
                'deskripsi' => 'Perkembangan teknologi dalam dunia kesehatan membawa perubahan signifikan dalam pelayanan medis.',
                'image_url' => asset('images/artikel/artikel-2.jpeg'),
                'tanggal' => '2025-10-28',
            ],
            [
                'id' => 3,
                'judul' => 'Tips Menjaga Kesehatan Mental',
                'deskripsi' => 'Kesehatan mental sama pentingnya dengan kesehatan fisik dalam kehidupan sehari-hari.',
                'image_url' => asset('images/artikel/artikel-3.jpeg'),
                'tanggal' => '2025-10-25',
            ],
        ];

        // Data dummy video
        $video = [
            'id' => 1,
            'judul' => 'Pengenalan Ruang Baca Virtual',
            'file_url' => 'https://www.youtube.com/embed/b5jSucGS-RA',
            'tanggal' => '2025-11-01',
        ];

        // Data dummy trend buku
        $trendBuku = [
            [
                'id' => 1,
                'judul' => 'KAMUS LENGKAP KEDOKTERAN',
                'image_url' => asset('images/buku/buku-1.jpeg'),
            ],
            [
                'id' => 2,
                'judul' => 'MANAJEMEN INFORMASI KESEHATAN',
                'image_url' => asset('images/buku/buku-2.jpeg'),
            ],
            [
                'id' => 3,
                'judul' => 'ANATOMI UNTUK MAHASISWA KEDOKTERAN GIGI',
                'image_url' => asset('images/buku/buku-3.jpeg'),
            ],
            [
                'id' => 4,
                'judul' => 'KAMUS LENGKAP KEDOKTERAN',
                'image_url' => asset('images/buku/buku-1.jpeg'),
            ],
            [
                'id' => 5,
                'judul' => 'MANAJEMEN INFORMASI KESEHATAN',
                'image_url' => asset('images/buku/buku-2.jpeg'),
            ],
            [
                'id' => 6,
                'judul' => 'ANATOMI UNTUK MAHASISWA KEDOKTERAN GIGI',
                'image_url' => asset('images/buku/buku-3.jpeg'),
            ],
        ];

        // E-office menu berdasarkan role
        $eofficeAll = [
            'surat-masuk' => 'Surat Masuk',
            'surat-keluar' => 'Surat Keluar',
            'disposisi-pengajuan' => 'Disposisi Pengajuan',
            'surat-disposisi' => 'Disposisi Surat',
            'disposisi-tindak-lanjut' => 'Disposisi Tindak Lanjut',
            'surat-notif' => 'Surat Notif',
            'surat-pengajuan' => 'Pengajuan',
        ];

        $rolePages = [
            'Super Admin' => array_keys($eofficeAll),
            'Sekretariat' => ['surat-masuk', 'surat-keluar', 'disposisi-pengajuan'],
            'Direktur' => ['surat-disposisi', 'surat-notif'],
            'Admin' => ['surat-notif', 'surat-pengajuan'],
            'Member' => ['surat-notif', 'surat-pengajuan'],
        ];

        $allowedEofficePages = $rolePages[$role] ?? [];
        $canAccessEoffice = !empty($allowedEofficePages);

        return view('welcome', compact(
            'user',
            'role',
            'dataKunjungan',
            'dataGenre',
            'dataDokumen',
            'dataPromkes',
            'artikel',
            'video',
            'trendBuku',
            'eofficeAll',
            'allowedEofficePages',
            'canAccessEoffice'
        ));
    }
}
