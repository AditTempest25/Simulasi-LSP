<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaskapaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maskapai')->insert([
            [
                'nama_maskapai' => 'Garuda Indonesia',
                'logo_maskapai' => 'garuda.png',
                'kelas' => 'Eksekutif',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_maskapai' => 'Lion Air',
                'logo_maskapai' => 'lion.png',
                'kelas' => 'Ekonomi',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_maskapai' => 'Batik Air',
                'logo_maskapai' => 'batik.png',
                'kelas' => 'Bisnis',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_maskapai' => 'Citilink',
                'logo_maskapai' => 'citilink.png',
                'kelas' => 'Ekonomi',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_maskapai' => 'Emirates',
                'logo_maskapai' => 'emirates.png',
                'kelas' => 'Luxury',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
