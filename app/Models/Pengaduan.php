<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    
    protected $fillable = [
        'nomor_pengaduan',
        'nama',
        'kontak',
        'kategori',
        'isi_pengaduan',
        'lampiran',
        'status',
        'tanggal_pengaduan',
    ];

    protected $casts = [
        'lampiran' => 'array',
        'tanggal_pengaduan' => 'datetime',
    ];
}