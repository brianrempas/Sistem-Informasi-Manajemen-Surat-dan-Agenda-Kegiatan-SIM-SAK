<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_agenda')->nullable();
            $table->string('nomor_surat_asal');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('asal_surat');
            $table->string('perihal');
            $table->foreignId('kategori_id')->constrained('kategori_surats')->restrictOnDelete();
            $table->text('isi_ringkas')->nullable();
            $table->string('lampiran_file')->nullable();
            $table->enum('status_disposisi', ['belum', 'proses', 'selesai'])->default('belum');
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};