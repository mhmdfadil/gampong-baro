<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'whatsapp',
        'email',
        'urutan',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Scope untuk data aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope untuk urutan
     */
    public function scopeUrutan($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/struktur-organisasi/' . $this->foto);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->nama) . '&background=random';
    }

    /**
     * Get WhatsApp link
     */
    public function getWhatsappLinkAttribute()
    {
        if ($this->whatsapp) {
            $phone = preg_replace('/[^0-9]/', '', $this->whatsapp);
            return 'https://wa.me/' . $phone;
        }
        return '#';
    }

    /**
     * Get email link
     */
    public function getEmailLinkAttribute()
    {
        if ($this->email) {
            return 'mailto:' . $this->email;
        }
        return '#';
    }
}