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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengajuan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained()->cascadeOnDelete(); // Pemohon cuti
            $table->foreignId('type_cuti_id')->constrained()->cascadeOnDelete(); // Jenis cuti

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('lama_cuti'); // otomatis dihitung dari range tanggal

            $table->text('alasan')->nullable();
            $table->string('dokumen')->nullable(); // path file jika upload dokumen

            // // Relasi ke penandatangan dari tabel atasan_pejabats
            $table->foreignId('atasan_id')->nullable()->constrained('pegawais');
            $table->foreignId('pejabat_id')->nullable()->constrained('pegawais');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->boolean('is_committed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
