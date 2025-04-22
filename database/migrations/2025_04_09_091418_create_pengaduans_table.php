<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengaduan')->unique();
            $table->string('nama');
            $table->string('kontak');
            $table->enum('kategori', ['umum', 'sosial_kebersihan', 'keamanan', 'kesehatan', 'permintaan']);
            $table->text('isi_pengaduan');
            $table->json('lampiran')->nullable();
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru');
            $table->dateTime('tanggal_pengaduan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};