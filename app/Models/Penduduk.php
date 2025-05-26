<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_keluarga',
        'alamat',
        'dusun',
        'agama',
        'status_perkawinan',
        'pendidikan_terakhir',
        'pekerjaan',
        'no_kk',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Scope untuk mendapatkan data kepala keluarga
     */
    public function scopeKepalaKeluarga($query)
    {
        return $query->where('status_keluarga', 'Kepala Keluarga');
    }

    /**
     * Hitung umur berdasarkan tanggal lahir
     */
    public function getUmurAttribute()
    {
        return now()->diffInYears($this->tanggal_lahir);
    }

    /**
     * Klasifikasi kelompok umur
     */
    public function getKelompokUmurAttribute()
    {
        $umur = $this->umur;
        
        if ($umur <= 5) return '0-5';
        if ($umur <= 12) return '6-12';
        if ($umur <= 17) return '13-17';
        if ($umur <= 25) return '18-25';
        if ($umur <= 35) return '26-35';
        if ($umur <= 45) return '36-45';
        if ($umur <= 55) return '46-55';
        if ($umur <= 65) return '56-65';
        return '65+';
    }

    /**
     * Data untuk chart distribusi dusun
     */
    public static function getDataDusun()
    {
        return self::select('dusun')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('dusun')
            ->orderBy('total', 'desc')
            ->get();
    }

    /**
     * Data untuk piramida penduduk
     */
    public static function getDataPiramidaPenduduk()
{
    $maleData = [];
    $femaleData = [];
    $kelompokUmur = ['0-5', '6-12', '13-17', '18-25', '26-35', '36-45', '46-55', '56-65', '65+'];

    foreach ($kelompokUmur as $kelompok) {
        if ($kelompok === '65+') {
            $maleData[] = self::where('jenis_kelamin', 'L')
                ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [65])
                ->count();

            $femaleData[] = self::where('jenis_kelamin', 'P')
                ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= ?', [65])
                ->count();
        } else {
            [$min, $max] = explode('-', $kelompok);

            $maleData[] = self::where('jenis_kelamin', 'L')
                ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN ? AND ?', [$min, $max])
                ->count();

            $femaleData[] = self::where('jenis_kelamin', 'P')
                ->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN ? AND ?', [$min, $max])
                ->count();
        }
    }

    return [
        'labels' => $kelompokUmur,
        'maleData' => $maleData,
        'femaleData' => $femaleData
    ];
}


    /**
     * Data untuk chart pendidikan
     */
    public static function getDataPendidikan()
    {
        return self::select('pendidikan_terakhir')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('pendidikan_terakhir')
            ->orderBy('total', 'desc')
            ->get();
    }

    /**
     * Data untuk chart pekerjaan
     */
    public static function getDataPekerjaan()
    {
        return self::select('pekerjaan')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('pekerjaan')
            ->orderBy('total', 'desc')
            ->get();
    }

    /**
     * Data untuk chart agama
     */
    public static function getDataAgama()
    {
        return self::select('agama')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('agama')
            ->orderBy('total', 'desc')
            ->get();
    }

    /**
     * Statistik kependudukan
     */
    public static function getStatistikKependudukan()
{
    $now = now();
    $tahunIni = $now->year;
    $awalTahunIni = $now->copy()->startOfYear();
    
    // Total penduduk saat ini (sampai hari ini)
    $totalPendudukSaatIni = self::where('tanggal_lahir', '<=', $now)->count();

    // Total penduduk sampai akhir tahun sebelumnya (31 Desember 2024)
    $akhirTahunLalu = $awalTahunIni->copy()->subDay(); // 31 Desember tahun sebelumnya
    $totalPendudukTahunLalu = self::where('tanggal_lahir', '<=', $akhirTahunLalu)->count();

    // Hitung pertumbuhan
    $pertumbuhan = $totalPendudukTahunLalu > 0
        ? round((($totalPendudukSaatIni - $totalPendudukTahunLalu) / $totalPendudukTahunLalu) * 100, 2)
        : 0;

    // Data lain
    $totalKK = self::where('status_keluarga', 'Kepala Keluarga')->count();
    $totalLaki = self::where('jenis_kelamin', 'L')->count();
    $totalPerempuan = self::where('jenis_kelamin', 'P')->count();

    return [
        'total_penduduk' => $totalPendudukSaatIni,
        'total_kk' => $totalKK,
        'total_lk' => $totalLaki,
        'total_pr' => $totalPerempuan,
        'rasio_jk' => $totalPerempuan > 0 ? round($totalLaki / $totalPerempuan, 2) : 0,
        'pertumbuhan' => $pertumbuhan, // Sekarang dihitung otomatis
        'kepadatan' => 1245 // Masih tetap manual, atau bisa dihitung jika luas wilayah tersedia
    ];
}

}