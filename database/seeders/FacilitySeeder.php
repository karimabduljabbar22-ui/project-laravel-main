<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facility;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        Facility::create([
            'name' => 'Laboratorium Komputer Modern',
            'description' => 'Dilengkapi dengan 40 unit PC spesifikasi tinggi, koneksi internet fiber optik, dan AC untuk mendukung pembelajaran IT.',
        ]);

        Facility::create([
            'name' => 'Perpustakaan Digital',
            'description' => 'Menyediakan ribuan koleksi buku fisik dan e-book yang dapat diakses oleh seluruh siswa dan guru.',
        ]);

        Facility::create([
            'name' => 'Lapangan Olahraga Serbaguna',
            'description' => 'Lapangan outdoor terpadu untuk kegiatan futsal, basket, voli, dan upacara bendera.',
        ]);

        Facility::create([
            'name' => 'Laboratorium IPA Terpadu',
            'description' => 'Fasilitas praktikum Fisika, Kimia, dan Biologi lengkap dengan peralatan presisi dan standar keselamatan.',
        ]);
    }
}