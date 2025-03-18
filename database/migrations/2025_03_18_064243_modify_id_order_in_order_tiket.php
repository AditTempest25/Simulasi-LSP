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
            $table->bigIncrements('id_order')->change(); // Tambahin AUTO_INCREMENT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->bigInteger('id_order')->unsigned()->change(); // Rollback ke default (tanpa auto-increment)
        });
    }
};
