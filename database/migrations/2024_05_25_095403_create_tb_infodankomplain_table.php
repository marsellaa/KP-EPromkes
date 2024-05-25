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
        Schema::create('tb_infodankomplain', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->enum('jenis_berita', ['Informasi', 'Komplain']);
            $table->enum('media_sosial', ['Instagram', 'Facebook', 'TikTok']);
            $table->text('isi_berita');
            $table->enum('kelompok', ['Layanan', 'Parkir', 'Pembayaran', 'Dokter', 'Pendaftaran', 'Hasil Pemeriksaan']);
            $table->unsignedBigInteger('tim_promkes'); // relasi ke tb_users
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('tim_promkes')->references('id')->on('tb_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_infodankomplain');
    }
};
