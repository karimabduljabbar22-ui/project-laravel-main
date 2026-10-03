<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        Staff::create([
            'name' => 'Drs. H. Ahmad Dahlan, M.Pd.',
            'position' => 'Kepala Sekolah',
            'bio' => 'Berdedikasi dalam memajukan pendidikan karakter dan prestasi siswa.'
        ]);

        Staff::create([
            'name' => 'Siti Nurhaliza, S.Pd.',
            'position' => 'Guru Matematika',
            'bio' => 'Pengajar matematika dengan metode interaktif dan menyenangkan.'
        ]);

        Staff::create([
            'name' => 'Budi Santoso, S.Kom.',
            'position' => 'Guru Informatika & IT Support',
            'bio' => 'Membimbing siswa dalam pengembangan teknologi dan pemrograman.'
        ]);

        Staff::create([
            'name' => 'Dewi Lestari, M.Hum.',
            'position' => 'Guru Bahasa Indonesia',
            'bio' => 'Aktif membina ekstrakurikuler jurnalistik dan karya tulis.'
        ]);
    }
}