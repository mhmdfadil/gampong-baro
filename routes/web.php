<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    // return view('home');
    return view('home')->with('noLoading', true)->with(['navbarScroll' => true]);
})->name('beranda');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login']);

Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

use App\Http\Controllers\SocialMediaController;

Route::resource('social-media', SocialMediaController::class)->only([
    'index', 'update', 'destroy'
]);

use App\Http\Controllers\SettingController;

Route::resource('setting', SettingController::class)->only([
    'index', 'update', 'destroy'
]);

use App\Http\Controllers\SlideController;
Route::resource('slides', SlideController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

use App\Http\Controllers\VisionController;

Route::resource('vision', VisionController::class)->only([
    'index', 'update', 'destroy'
]);

use App\Http\Controllers\HistoryController;

Route::resource('histories', HistoryController::class)->only([
    'index', 'update', 'destroy'
]);

use App\Http\Controllers\WilayahController;

Route::resource('wilayah', WilayahController::class)->only([
    'index', 'update', 'destroy'
]);

use App\Http\Controllers\UserController;

    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

use App\Http\Controllers\StrukturOrganisasiController;
Route::resource('struktur-organisasi', StrukturOrganisasiController::class)
    ->except(['show'])
    ->parameters(['struktur-organisasi' => 'strukturOrganisasi']);

use App\Http\Controllers\AcceptanceController;

Route::resource('acceptances', AcceptanceController::class)->only([
    'index', 'create', 'store', 'update', 'destroy'
]);

Route::post('acceptances/{acceptance}/restore', [AcceptanceController::class, 'restore'])
    ->name('acceptances.restore');

use App\Http\Controllers\PengaduanAdminController;

Route::resource('complaint', PengaduanAdminController::class)->only([
    'index', 'show', 'edit', 'update', 'destroy'
]);

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);


use App\Http\Controllers\PendudukController;

Route::resource('penduduks', PendudukController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

use App\Http\Controllers\PPIDController;

Route::resource('ppids', PPIDController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

use App\Http\Controllers\DetailHistoriesController;

Route::resource('detailhistories', DetailHistoriesController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);

use App\Http\Controllers\MissionController;

Route::resource('missions', MissionController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy'
]);


Route::get('ppids/download/{id}', [PPIDController::class, 'download'])->name('ppids.download');

use App\Http\Controllers\NewsController;

Route::resource('news', NewsController::class)->except(['show']);
Route::get('news/{news:slug}', [NewsController::class, 'show'])->name('news.show');




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

Route::get('/berita/{slug}', function($slug) {
    \Carbon\Carbon::setLocale('id');
    $news = \App\Models\News::where('slug', $slug)->firstOrFail();
    $news->increment('views'); // Increment views count
    $latestNews = \App\Models\News::orderBy('created_at', 'desc')->take(6)->get();
    
    return view('detail_berita', compact('news', 'latestNews'))->with('noLoading', true)->with(['navbarScroll' => false]);
})->name('berita.show');

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

// Struktur Organisasi
Route::get('/struktur-organisasi/anggota', function () {
    return view('anggota')
        ->with('noLoading', true)
        ->with('navbarScroll', false);
})->name('struktur-organisasi-anggota');

