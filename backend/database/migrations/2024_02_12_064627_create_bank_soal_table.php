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
        Schema::create('bank_soals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('total_soal_pg')->default(0)->comment("Total soal pilihan ganda");
            $table->integer('total_soal_essay')->default(0)->comment('Total soal essay');
            $table->string('persen');
            $table->foreignUuid('matpel_id')->constrained('matpels','id')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_soals', function (Blueprint $table) {
            //
        });
    }
};
