<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getLampiranAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        // Handle string JSON
        if (is_string($value)) {
            // Bersihkan string dari karakter escape dan kutipan
            $cleanedValue = stripslashes(trim($value, '"\''));
            
            $decoded = json_decode($cleanedValue, true);
            
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $this->cleanFilePaths($decoded);
            }
            
            // Jika bukan JSON valid, coba split string sebagai array
            if (str_contains($cleanedValue, ',')) {
                return $this->cleanFilePaths(explode(',', $cleanedValue));
            }
            
            // Jika bukan array, anggap sebagai single path
            return $this->cleanFilePaths([$cleanedValue]);
        }

        // Jika sudah array
        if (is_array($value)) {
            return $this->cleanFilePaths($value);
        }

        return [];
    }

    protected function cleanFilePaths(array $paths)
    {
        return array_filter(array_map(function($path) {
            // Normalisasi path (ganti semua jenis slash dengan forward slash)
            $cleanPath = str_replace(['\\', '\/', '//'], '/', trim($path));
            
            // Hapus prefix 'storage/' atau '/storage' jika ada
            $cleanPath = preg_replace('/^\/?storage\//', '', $cleanPath);
            
            // Hapus karakter kutipan yang mungkin tersisa
            $cleanPath = trim($cleanPath, '"\'');
            
            // Periksa apakah file ada di storage public
            if (!empty($cleanPath) && Storage::disk('public')->exists($cleanPath)) {
                return $cleanPath;
            }
            
            return null;
        }, $paths));
    }

    // Method untuk mendapatkan URL lengkap lampiran
    public function getLampiranUrls()
    {
        return array_map(function($path) {
            // Pastikan path tidak kosong dan valid
            if (empty($path)) {
                return null;
            }
            
            // Gunakan asset() untuk file di public/storage
            return asset('storage/'.$path);
        }, $this->lampiran);
    }
}