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
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->dropForeign(['id_maskapai']); // Hapus foreign key

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->foreign('id_maskapai')->references('id_maskapai')->on('maskapai'); // Tambahin lagi kalo rollback
        });
    }
};
