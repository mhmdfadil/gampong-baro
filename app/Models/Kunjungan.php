<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungans';
    protected $guarded = [];

    /**
     * Scope untuk kunjungan hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope untuk kunjungan minggu ini
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }

    /**
     * Scope untuk kunjungan bulan ini
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    /**
     * Scope untuk kunjungan tahun ini
     */
    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', now()->year);
    }

    /**
     * Scope untuk kunjungan kemarin
     */
    public function scopeYesterday($query)
    {
        return $query->whereDate('created_at', today()->subDay());
    }

    /**
     * Scope untuk kunjungan minggu lalu
     */
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->subWeek()->startOfWeek(),
            now()->subWeek()->endOfWeek()
        ]);
    }

    /**
     * Scope untuk kunjungan bulan lalu
     */
    public function scopeLastMonth($query)
    {
        return $query->whereMonth('created_at', now()->subMonth()->month)
                     ->whereYear('created_at', now()->subMonth()->year);
    }

    /**
     * Scope untuk kunjungan tahun lalu
     */
    public function scopeLastYear($query)
    {
        return $query->whereYear('created_at', now()->subYear()->year);
    }
}