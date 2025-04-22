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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45)->nullable(); // IPv6 can be up to 45 chars
            $table->text('user_agent')->nullable(); // Changed to text for longer UA strings
            $table->string('path')->nullable();
            $table->text('referrer')->nullable(); // Changed to text for longer URLs
            $table->string('device', 50)->nullable(); // Added length limit
            $table->string('platform', 50)->nullable(); // Added length limit
            $table->string('browser', 50)->nullable(); // Added length limit
            $table->boolean('is_desktop')->default(false);
            $table->boolean('is_mobile')->default(false);
            $table->boolean('is_tablet')->default(false);
            $table->boolean('is_bot')->default(false);
            $table->boolean('is_smart_tv')->default(false); // Added new field
            $table->boolean('is_console')->default(false); // Added new field
            $table->boolean('is_wearable')->default(false); // Added new field
            $table->timestamps();
            
            // Optional indexes for better query performance
            $table->index('ip_address');
            $table->index('path');
            $table->index('created_at');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
};