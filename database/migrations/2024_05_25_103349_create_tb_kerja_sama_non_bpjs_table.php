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
        Schema::create('tb_kerjaSamaNonBpjs', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->unsignedBigInteger('nama_mitra'); // relasi ke tb_mitra
            $table->string('jenis_kerjasama');
            $table->enum('status', ['Baru', 'Perpanjangan']);
            $table->unsignedBigInteger('pic'); // relasi ke tb_users
            $table->string('no_telp_pic');
            $table->unsignedBigInteger('dokumentasi'); // relasi ke tb_dokumentasi
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nama_mitra')->references('id')->on('mitra')->onDelete('cascade');
            $table->foreign('pic')->references('id')->on('tb_users')->onDelete('cascade');
            $table->foreign('dokumentasi')->references('id')->on('tb_dokumentasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kerjaSamaNonBpjs');
    }
};
