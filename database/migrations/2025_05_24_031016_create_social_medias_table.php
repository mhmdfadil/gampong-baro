<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('social_medias', function (Blueprint $table) {
            $table->id();
            $table->string('link_fb')->nullable();
            $table->boolean('active_fb')->nullable()->default(false);
            $table->string('link_ig')->nullable();
            $table->boolean('active_ig')->nullable()->default(false);
            $table->string('link_yt')->nullable();
            $table->boolean('active_yt')->nullable()->default(false);
            $table->string('link_wa')->nullable();
            $table->boolean('active_wa')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('social_medias');
    }
};