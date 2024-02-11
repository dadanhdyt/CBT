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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nomor_peserta',10)->unique()->comment('Nomor peserta nantinya bisa nisn atau nip tergantung aplikasi cbt ini untuk apa');
            $table->string('nama');
            $table->string('password');
            $table->string('api_token')->nullable()->unique();
            $table->boolean('status')->default(1)->comment('Untuk status peserta jika 1 aktif jika 0 tidak aktif');
            $table->foreignUuid('agama_id')->constrained('agamas','id')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignUuid('jurusan_id')->constrained('jurusans','id')->cascadeOnUpdate()->restrictOnDelete();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
