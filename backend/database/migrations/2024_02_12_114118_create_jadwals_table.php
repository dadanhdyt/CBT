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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->longText('bank_soal_ids')->nullable(false);
            $table->date('tanggal');
            $table->string('nama')->nullable();
            $table->time("waktu_mulai");
            $table->string('lama_ujian')->comment('Format dalam menit misal 30 menit');
            $table->boolean('status')->default(false);
            $table->longText('sesi')->nullable();
            $table->integer('minimal_soal_diisi')->default(null)->nullable();
            $table->json('config')->default("[]")->nullable();
            $table->foreignUuid('event_id')->nullable()->constrained('events', 'id')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
