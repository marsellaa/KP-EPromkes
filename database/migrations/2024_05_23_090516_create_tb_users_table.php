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
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->unsignedBigInteger('role_id'); // Menambahkan kolom role_id untuk relasi
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('role_id')->references('id')->on('tb_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_users');
    }
};