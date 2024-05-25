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
        Schema::create('tb_donordarah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_mitra'); // relasi ke tb_mitra
            $table->enum('status', ['Y', 'T']);
            $table->unsignedInteger('jml_partisipan');
            $table->unsignedInteger('jml_donor');
            $table->unsignedBigInteger('tim_promkes'); // relasi ke tb_users
            $table->unsignedBigInteger('dokumentasi'); // relasi ke tb_dokumentasi
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nama_mitra')->references('id')->on('mitra')->onDelete('cascade');
            $table->foreign('tim_promkes')->references('id')->on('tb_users')->onDelete('cascade');
            $table->foreign('dokumentasi')->references('id')->on('tb_dokumentasi')->onDelete('cascade');
        });

        // Tabel pivot untuk relasi many-to-many antara tb_donordarah dan tb_partisipan
        Schema::create('donordarah_partisipan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donordarah_id');
            $table->unsignedBigInteger('partisipan_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('donordarah_id')->references('id')->on('tb_donordarah')->onDelete('cascade');
            $table->foreign('partisipan_id')->references('id')->on('partisipan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donordarah_partisipan');
        Schema::dropIfExists('tb_donordarah');
    }
};
