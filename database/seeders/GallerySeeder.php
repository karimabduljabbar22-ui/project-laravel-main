<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Upacara Peringatan Hari Kemerdekaan',
            'type' => 'foto',
            'file_path' => 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?w=600'
        ]);

        Gallery::create([
            'title' => 'Kegiatan Praktikum di Laboratorium Komputer',
            'type' => 'foto',
            'file_path' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600'
        ]);

        Gallery::create([
            'title' => 'Juara 1 Lomba Futsal Antar Sekolah',
            'type' => 'foto',
            'file_path' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=600'
        ]);

        Gallery::create([
            'title' => 'Pentas Seni & Budaya Tahunan',
            'type' => 'foto',
            'file_path' => 'https://images.unsplash.com/photo-1465847899084-d164df4dedc6?w=600'
        ]);
    }
}