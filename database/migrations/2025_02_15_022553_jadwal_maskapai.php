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
        Schema::create('jadwal_maskapai', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->foreignId('id_rute')->constrained('rute', 'id_rute')->onDelete('cascade')->onUpdate('cascade');
            $table->time('waktu_berangkat');
            $table->time('waktu_tiba');
            $table->integer('harga');
            $table->integer('kapasitas');
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
