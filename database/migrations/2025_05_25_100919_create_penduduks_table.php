<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status_keluarga', ['Kepala Keluarga', 'Istri', 'Anak', 'Lainnya']);
            $table->string('alamat');
            $table->string('dusun');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']);
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('pendidikan_terakhir', [
                'Tidak Sekolah', 
                'SD', 
                'SMP', 
                'SMA', 
                'Diploma', 
                'Sarjana', 
                'Pascasarjana'
            ]);
            $table->enum('pekerjaan', [
                'Petani', 
                'PNS', 
                'Wiraswasta', 
                'Buruh', 
                'Pelajar/Mahasiswa', 
                'Ibu Rumah Tangga', 
                'Lainnya'
            ]);
            $table->string('no_kk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};