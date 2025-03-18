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
        Schema::table('order_detail', function (Blueprint $table) {
            // Hapus foreign key di id_user (tapi tetap biarin kolomnya ada)
            $table->dropForeign(['id_user']);

            // Hapus id_maskapai
            $table->dropForeign(['id_maskapai']);
            $table->dropColumn('id_maskapai');

            // Ubah jumlah_tiket menjadi total_tiket
            $table->renameColumn('jumlah_tiket', 'total_tiket');

            // Tambahkan tanggal_transaksi
            $table->date('tanggal_transaksi')->after('total_tiket');

            // Tambahkan kolom baru
            $table->string('name')->after('id_user');
            $table->string('nama_maskapai')->after('name');
            $table->time('waktu_berangkat')->after('nama_maskapai');
            $table->time('waktu_tiba')->after('waktu_berangkat');
            $table->string('kota_asal')->after('waktu_tiba');
            $table->string('kota_tujuan')->after('kota_asal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_detail', function (Blueprint $table) {
            // Tambahkan kembali foreign key id_user

            // Tambahkan kembali id_maskapai
            $table->foreignId('id_maskapai')->constrained('maskapai', 'id_maskapai')->onDelete('cascade')->onUpdate('cascade');

            // Ubah total_tiket kembali jadi jumlah_tiket
            $table->renameColumn('total_tiket', 'jumlah_tiket');

            // Hapus tanggal_transaksi dan kolom tambahan
            $table->dropColumn(['tanggal_transaksi', 'name', 'nama_maskapai', 'waktu_berangkat', 'waktu_tiba', 'kota_asal', 'kota_tujuan']);
        });
    }
};
