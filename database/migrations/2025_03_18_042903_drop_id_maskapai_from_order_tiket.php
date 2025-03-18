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
            $table->dropForeign(['id_maskapai']); 
            $table->dropColumn('id_maskapai'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->foreignId('id_maskapai')->constrained('maskapai', 'id_maskapai')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
