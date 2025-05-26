<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'nama_desa',
        'deskripsi_singkat',
        'peta',
        'alamat',
        'nomor_hp',
        'email',
        'bagan'
    ];

    protected $casts = [
        // Anda bisa menambahkan casts jika diperlukan
    ];
}