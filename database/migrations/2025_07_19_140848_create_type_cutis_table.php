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
        Schema::create('type_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // Misal CT, CB, CS, dll
            $table->string('nama');           // Nama cuti seperti "Cuti Tahunan"
            $table->integer('maks_hari')->nullable(); // Batas hari jika ada
            $table->text('deskripsi')->nullable();
            $table->boolean('butuh_dokumen')->default(false); // Surat dokter, dll
            $table->boolean('butuh_approval')->default(true);
            $table->json('status_berlaku')->nullable();
            // Contoh isi: ["pns", "pppk"]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_cutis');
    }
};
