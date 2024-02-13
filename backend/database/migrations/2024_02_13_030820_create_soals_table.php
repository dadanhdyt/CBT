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
        Schema::create('soals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('bank_soal_id')->constrained('bank_soals')->restrictOnDelete()->cascadeOnUpdate();
            $table->char('type_soal',1)->comment("1:Pilihan ganda 2:Essay")->default(1);
            $table->longText('pertanyaan');
            $table->string('audio_url')->nullable();
            $table->string('direction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
