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
        Schema::create('tb_healthtalk', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('nama_narasumber');
            $table->string('spesialisasi');
            $table->string('unit_kerja');
            $table->string('tema_ht');
            $table->enum('status', ['Y', 'T', 'P']); // Y: Yes, T: No, P: Pending
            $table->unsignedBigInteger('mitra'); // relasi ke tb_mitra
            $table->unsignedBigInteger('tim_promkes'); // relasi ke tb_users
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('mitra')->references('id')->on('mitra')->onDelete('cascade');
            $table->foreign('tim_promkes')->references('id')->on('tb_users')->onDelete('cascade');
        });

        // Tabel pivot untuk relasi many-to-many antara tb_healthtalk dan tb_partisipan
        Schema::create('healthtalk_partisipan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('healthtalk_id');
            $table->unsignedBigInteger('partisipan_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('healthtalk_id')->references('id')->on('tb_healthtalk')->onDelete('cascade');
            $table->foreign('partisipan_id')->references('id')->on('partisipan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthtalk_partisipan');
        Schema::dropIfExists('tb_healthtalk');
    }
};
