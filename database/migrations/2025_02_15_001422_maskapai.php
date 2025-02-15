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
        Schema::create('maskapai', function (Blueprint $table) {
            $table->unsignedBigInteger('id_maskapai')->autoIncrement();
            $table->string('nama_maskapai');
            $table->text('logo_maskapai')->nullable();
            $table->enum('kelas', ['Ekonomi', 'Bisnis', 'Eksekutif', 'Luxury']);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
