<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';

    protected $fillable = [
        'peta_wilayah',
        'batas_barat',
        'jarak_barat',
        'batas_selatan',
        'jarak_selatan',
        'batas_timur',
        'jarak_timur',
        'batas_utara',
        'jarak_utara',
        'luas_wilayah_ha',
        'ketinggian_mdl',
        'jumlah_penduduk',
        'kepadatan_penduduk'
    ];
}