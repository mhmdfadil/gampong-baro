<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PPID;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PPIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            PPID::create([
                'title' => 'Judul Dokumen ' . $i,
                'description' => 'Deskripsi dokumen ' . $i . ' yang berisi informasi penting mengenai topik tertentu.',
                'filename' => 'dokumen_' . $i . '.pdf',
                'download_count' => rand(0, 500),
                'publish_date' => Carbon::now()->subDays(rand(0, 365)),
            ]);
        }
    }
}
