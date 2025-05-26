<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vision;

class VisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vision::create([
            'title' => 'Visi Perusahaan 2025',
            'visi' => 'Menjadi perusahaan terdepan dalam inovasi teknologi di tahun 2025'
        ]);

        // Atau contoh dengan visi null
        // Vision::create([
        //     'title' => 'Visi Sementara',
        //     'visi' => null
        // ]);
    }
}