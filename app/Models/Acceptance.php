<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acceptance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'official_name',
        'position',
        'signature_image',
        'photo',
        'greeting_opening',
        'greeting_closing',
        'quote',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Scope untuk sambutan yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the full greeting with content
     */
    public function getFullContentAttribute()
    {
        return $this->greeting_opening . "\n\n" . 
               $this->content . "\n\n" .
               ($this->quote ? "\"" . $this->quote . "\"\n\n" : "") .
               $this->greeting_closing;
    }

    /**
     * Get the photo URL
     */
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    /**
     * Get the signature image URL
     */
    public function getSignatureUrlAttribute()
    {
        return $this->signature_image ? asset('storage/' . $this->signature_image) : null;
    }
}