<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wilayah', function (Blueprint $table) {
            $table->id();
            $table->text('peta_wilayah')->nullable();
            $table->string('batas_barat')->nullable();
            $table->decimal('jarak_barat', 10, 2)->nullable(); // dalam km
            $table->string('batas_selatan')->nullable();
            $table->decimal('jarak_selatan', 10, 2)->nullable(); // dalam km
            $table->string('batas_timur')->nullable();
            $table->decimal('jarak_timur', 10, 2)->nullable(); // dalam km
            $table->string('batas_utara')->nullable();
            $table->decimal('jarak_utara', 10, 2)->nullable(); // dalam km
            $table->decimal('luas_wilayah_ha', 10, 2)->nullable(); // dalam hektar
            $table->decimal('ketinggian_mdl', 10, 2)->nullable(); // dalam meter di atas laut
            $table->integer('jumlah_penduduk')->nullable(); // dalam jiwa
            $table->decimal('kepadatan_penduduk', 10, 2)->nullable(); // per km2
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wilayah');
    }
};