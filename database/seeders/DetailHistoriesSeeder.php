<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailHistory;

class DetailHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $histories = [
            [
                'year' => 2020,
                'bg_year' => 'bg-primary',
                'title' => 'Pendirian Perusahaan',
                'description_singkat' => 'Perusahaan didirikan dengan visi untuk menjadi pemimpin di industri ini.',
            ],
            [
                'year' => 2022,
                'bg_year' => 'bg-success',
                'title' => 'Ekspansi Pasar',
                'description_singkat' => 'Melakukan ekspansi pasar ke beberapa negara tetangga dengan produk unggulan.',
            ],
        ];

        foreach ($histories as $history) {
            DetailHistory::create($history);
        }
    }
}