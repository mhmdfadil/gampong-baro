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
        Schema::create('acceptances', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul sambutan
            $table->text('content'); // Isi sambutan
            $table->string('official_name'); // Nama pejabat (Kepala Desa)
            $table->string('position'); // Jabatan
            $table->string('signature_image')->nullable(); // Path gambar tanda tangan
            $table->string('photo')->nullable(); // Foto pejabat
           $table->string('greeting_opening')->default('Assalamualaikum Warahmatullahi Wabarakatuh');
$table->string('greeting_closing')->default('Wassalamualaikum Warahmatullahi Wabarakatuh');
            $table->string('quote')->nullable(); // Kutipan motivasi
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->timestamps();
            $table->softDeletes(); // Untuk soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptances');
    }
};