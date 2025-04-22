<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
    //return view('home')->with('noLoading', true)->with(['navbarScroll' => true]);
})->name('beranda');

use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PengaduanController;

// Route untuk mencatat kunjungan
Route::post('/kunjungan', [KunjunganController::class, 'store']);

// Route untuk mendapatkan statistik kunjungan
Route::get('/kunjungan/stats', [KunjunganController::class, 'getStats']);

// Route Profil Desa
Route::get('/profil', function () {
    return view('profil')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('profil');

// Route Berita
Route::get('/berita', function () {
    return view('berita')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('berita');

// Route Belanja
Route::get('/belanja', function () {
    return view('belanja')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('belanja');

// Route PPID
Route::get('/ppid', function () {
    return view('ppid')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('ppid');

Route::get('/pengaduan', function () {
    return view('pengaduan')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('pengaduan');

Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

Route::get('/pengaduan/success', [PengaduanController::class, 'success'])->name('pengaduan.success');

Route::get('/infografis/penduduk', function () {
    return view('infografis_penduduk')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('infografis.penduduk');

Route::get('/infografis/apbdes', function () {
    return view('infografis_apbdes')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('infografis.apbdes');

Route::get('/coming_soon', function () {
    return view('coming_soon')->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('coming.soon');


