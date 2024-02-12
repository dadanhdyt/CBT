<?php

use App\Models\Agama;
use App\Models\Jurusan;
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
        Schema::create('matpels', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_mapel')->unique();
            $table->string('nama');
            $table->foreignUuid('agama_id')->nullable()->constrained('agamas','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignUuid('jurusan_id')->nullable()->constrained('jurusans','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matpels');
    }
};


