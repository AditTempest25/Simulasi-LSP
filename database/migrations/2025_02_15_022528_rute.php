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
        Schema::create('rute', function (Blueprint $table) {
            $table->id('id_rute');
            $table->unsignedBigInteger(column: 'id_maskapai');
            $table->foreign('id_maskapai')->references('id_maskapai')->on('maskapai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kota_asal')
                ->constrained('master_kotas', 'id')
                ->onDelete('cascade');
            $table->foreignId('kota_tujuan')
                ->constrained('master_kotas', 'id')
                ->onDelete('cascade');
            $table->date('tanggal_pergi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rute');
    }
};
