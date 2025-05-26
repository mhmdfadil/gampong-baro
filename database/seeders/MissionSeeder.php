<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $missions = [
            [
                'index' => 1,
                'bg_index' => 'bg-primary',
                'misi' => 'Misi pertama kita adalah melakukan inovasi teknologi',
            ],
            [
                'index' => 2,
                'bg_index' => 'bg-gold',
                'misi' => 'Misi kedua adalah meningkatkan kualitas pelayanan',
            ],
          
            [
                'index' => 3,
                'bg_index' => 'bg-purple',
                'misi' => 'Misi ketiga adalah ekspansi pasar global',
            ],
            [
                'index' => 4,
                'bg_index' => 'bg-success',
                'misi' => 'Misi keempat adalah pengembangan SDM unggul',
            ],
        ];

        foreach ($missions as $mission) {
            Mission::create($mission);
        }
    }
}