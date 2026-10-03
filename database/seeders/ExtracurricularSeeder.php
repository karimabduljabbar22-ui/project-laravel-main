<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Extracurricular;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        Extracurricular::create([
            'name' => 'Pramuka',
            'description' => 'Membentuk karakter kedisiplinan, kemandirian, dan kepemimpinan siswa melalui berbagai kegiatan alam terbuka.',
            'instructor' => 'Kak Budi Santoso, S.Pd.',
            'schedule' => 'Jumat, 15.00 - 17.00 WIB',
            'location' => 'Lapangan Utama Sekolah',
            'icon' => '⛺'
        ]);

        Extracurricular::create([
            'name' => 'Paskibra (Passus)',
            'description' => 'Melatih baris-berbaris, mental, dan kedisiplinan tinggi untuk persiapan pengibaran bendera serta kompetisi.',
            'instructor' => 'Pelatih Serda Ahmad',
            'schedule' => 'Rabu & Sabtu, 15.30 WIB',
            'location' => 'Lapangan Upacara',
            'icon' => '🇮🇩'
        ]);

        Extracurricular::create([
            'name' => 'Futsal & Sepak Bola',
            'description' => 'Wadah pengembangan bakat olahraga futsal bagi siswa, rutin mengikuti turnamen antar-sekolah.',
            'instructor' => 'Coach Rian Febrian',
            'schedule' => 'Selasa & Kamis, 16.00 WIB',
            'location' => 'Lapangan Olahraga',
            'icon' => '⚽'
        ]);

        Extracurricular::create([
            'name' => 'Coding Club (IT & Robotik)',
            'description' => 'Belajar pemrograman web, aplikasi mobile, serta dasar-dasar jaringan komputer dan teknologi modern.',
            'instructor' => 'Eka Prasetya, S.Kom.',
            'schedule' => 'Sabtu, 09.00 - 12.00 WIB',
            'location' => 'Laboratorium Komputer 1',
            'icon' => '💻'
        ]);

        Extracurricular::create([
            'name' => 'Seni Musik & Band',
            'description' => 'Mengembangkan bakat bermain alat musik, vokal, dan mengaransemen lagu untuk penampilan acara sekolah.',
            'instructor' => 'Siti Rahma, S.Sn.',
            'schedule' => 'Senin, 15.30 - 17.30 WIB',
            'location' => 'Ruang Seni & Musik',
            'icon' => '🎸'
        ]);
    }
}