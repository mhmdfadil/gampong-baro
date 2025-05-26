<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    public function run()
    {
        Wilayah::create([
            'peta_wilayah' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127154.39303766719!2d97.02523399372214!3d5.171884730297715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304778e967f2b613%3A0x3039d80b220cc20!2sLhokseumawe%2C%20Kota%20Lhokseumawe%2C%20Aceh!5e0!3m2!1sid!2sid!4v1748089377590!5m2!1sid!2sid',
            'batas_barat' => 'Kota Barat',
            'jarak_barat' => 15.5,
            'batas_selatan' => 'Kabupaten Selatan',
            'jarak_selatan' => 22.3,
            'batas_timur' => 'Kota Timur',
            'jarak_timur' => 18.7,
            'batas_utara' => 'Kabupaten Utara',
            'jarak_utara' => 12.4,
            'luas_wilayah_ha' => 12543.21,
            'ketinggian_mdl' => 45.5,
            'jumlah_penduduk' => 342567,
            'kepadatan_penduduk' => 2730.45
        ]);
    }
}