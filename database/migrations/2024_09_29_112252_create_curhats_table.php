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
        Schema::create('curhats', function (Blueprint $table) {
            $table->id();
            $table->text('isi');
            $table->dateTime('tanggal_posting');
            $table->integer('jumlah_like')->nullable()->default(0);
            $table->integer('jumlah_komentar')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curhats');
    }
};
