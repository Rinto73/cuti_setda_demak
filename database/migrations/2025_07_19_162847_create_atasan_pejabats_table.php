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
        Schema::create('atasan_pejabats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pejabat_id')->constrained('pegawais');
            $table->enum('tanda_tangan', ['atasan', 'pejabat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atasan_pejabats');
    }
};
