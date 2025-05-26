<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'link_fb' => 'https://facebook.com/example',
            'active_fb' => true,
            'link_ig' => 'https://instagram.com/example',
            'active_ig' => true,
            'link_yt' => 'https://youtube.com/@example',
            'active_yt' => false,
            'link_wa' => 'https://wa.me/6281234567890',
            'active_wa' => true,
        ]);
    }
}
