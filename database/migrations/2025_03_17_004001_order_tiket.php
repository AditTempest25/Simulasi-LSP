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
            $table->unsignedBigInteger('id_order')->primary();
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_rute')->constrained('rute', 'id_rute')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_maskapai')->constrained('maskapai', 'id_maskapai')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_transaksi');
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
