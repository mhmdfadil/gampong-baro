<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class, 
            SocialMediaSeeder::class,
             ProductSeeder::class,
             PPIDSeeder::class,
             NewsSeeder::class,
             WilayahSeeder::class,
             VisionSeeder::class,
             PendudukSeeder::class,
             DetailHistoriesSeeder::class,
            MissionSeeder::class,
        StrukturOrganisasiSeeder::class,
        ]);
    }
}
