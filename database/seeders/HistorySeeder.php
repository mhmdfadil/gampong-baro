<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\History;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::create([
            'title' => 'Sejarah Awal Perusahaan',
            'description' => 'Ini adalah deskripsi sejarah awal berdirinya perusahaan kami yang dimulai pada tahun 1990.',
            'image' => 'sejarah-awal.jpg',
            'title_image' => 'Gambar Pendiri Perusahaan',
        ]);
    }
}