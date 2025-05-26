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
        Schema::create('detail_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('bg_year', 20); // bg-gold, bg-primary, etc.
            $table->string('title');
            $table->text('description_singkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_histories');
    }
};