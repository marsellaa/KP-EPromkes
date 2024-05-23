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
        Schema::create('tb_peh', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('nama_narasumber');
            $table->string('spesialisasi');
            $table->string('unit_kerja');
            $table->string('tema');
            $table->char('status', 1); 
            $table->string('host');
            $table->integer('jml_penonton');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peh');
    }
};
