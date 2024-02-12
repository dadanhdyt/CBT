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
        Schema::create('peserta_ujians', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jadwal_id')->constrained('jadwals','id')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('peserta_id')->constrained('pesertas','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->time('waktu_mulai');
            $table->integer('siswa_waktu')->default(0);
            $table->time('waktu_selesai');
            $table->boolean('status_ujian')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_ujians');
    }
};
