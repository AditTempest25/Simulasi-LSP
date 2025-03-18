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
            $table->dropForeign(['id_rute']);
            $table->dropColumn('id_rute');

            $table->foreignId('id_jadwal')->constrained('jadwal_maskapai', 'id_jadwal')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->dropForeign(['id_jadwal']);
            $table->dropColumn('id_jadwal');

            $table->foreignId('id_rute')->constrained('rute', 'id_rute')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
