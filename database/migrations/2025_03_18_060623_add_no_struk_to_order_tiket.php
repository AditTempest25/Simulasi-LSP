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
            $table->string('no_struk')->unique()->after('id_order'); // Tambahin kolom no_struk setelah id_order
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_tiket', function (Blueprint $table) {
            $table->dropColumn('no_struk'); // Hapus kolom kalau rollback
        });
    }
};
