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
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_maskapai')->constrained('jadwal_maskapai', 'id_jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_order', 20);
            $table->integer('jumlah_tiket');
            $table->integer('total_harga');
            $table->foreign('id_order')->references('id_order')->on('order_tiket')->onDelete('cascade')->onUpdate('cascade');
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
