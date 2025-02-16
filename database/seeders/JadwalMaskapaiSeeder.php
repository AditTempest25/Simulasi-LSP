<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalMaskapaiSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ID rute sesuai dengan data dummy di tabel rute
        $data = [
            [
                'id_rute'         => 1, // misal rute dengan id 1 ada
                'waktu_berangkat' => '08:00',
                'waktu_tiba'      => '10:00',
                'harga'           => 1500000,
                'kapasitas'       => 180,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id_rute'         => 2, // misal rute dengan id 2 ada
                'waktu_berangkat' => '12:00',
                'waktu_tiba'      => '14:30',
                'harga'           => 2000000,
                'kapasitas'       => 200,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id_rute'         => 3, // misal rute dengan id 3 ada
                'waktu_berangkat' => '16:00',
                'waktu_tiba'      => '18:00',
                'harga'           => 1800000,
                'kapasitas'       => 150,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ];

        DB::table('jadwal_maskapai')->insert($data);
    }
}
