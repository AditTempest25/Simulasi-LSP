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
        Schema::create('order_tiket', function (Blueprint $table) {
            $table->id('id_order');
            $table->string('no_struk')->unique();
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_jadwal')->constrained('jadwal_maskapai', 'id_jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_maskapai');
            $table->integer('total_tiket');
            $table->dateTimeTz('tanggal_transaksi');
            $table->enum('status_verifikasi', ['pending', 'verified', 'rejected'])->default('pending');
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
