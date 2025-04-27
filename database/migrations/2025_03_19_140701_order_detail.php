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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id('id_order_detail');
            $table->foreignId('id_order')->constrained('order_tiket', 'id_order')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_user');
            $table->string('name');
            $table->string('nama_maskapai');
            $table->time('waktu_berangkat');
            $table->time('waktu_tiba');
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->string('total_tiket');
            $table->date('tanggal_transaksi');
            $table->integer('total_harga');
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
