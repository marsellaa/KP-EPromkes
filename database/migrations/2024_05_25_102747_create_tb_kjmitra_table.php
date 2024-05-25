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
        Schema::create('tb_kjmitra', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->unsignedBigInteger('nama_mitra'); // relasi ke tb_mitra
            $table->text('tujuan');
            $table->unsignedBigInteger('tim_promkes'); // relasi ke tb_users
            $table->unsignedBigInteger('dokumentasi'); // relasi ke tb_dokumentasi
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nama_mitra')->references('id')->on('mitra')->onDelete('cascade');
            $table->foreign('tim_promkes')->references('id')->on('tb_users')->onDelete('cascade');
            $table->foreign('dokumentasi')->references('id')->on('tb_dokumentasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kjmitra');
    }
};
