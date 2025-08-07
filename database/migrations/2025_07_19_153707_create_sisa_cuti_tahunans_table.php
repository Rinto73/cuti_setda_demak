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
        Schema::create('sisa_cuti_tahunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained()->cascadeOnDelete();
            $table->year('tahun'); // Misalnya: 2023, 2024, dst
            $table->integer('sisa_hari')->default(12); // default hak cuti tahunan
            $table->timestamps();

            $table->unique(['pegawai_id', 'tahun']); // 1 entri per pegawai per tahun
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sisa_cuti_tahunans');
    }
};
