<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteSeeder extends Seeder
{
    public function run()
    {
        $ruteData = [
            [
                'id_maskapai' => 1, 
                'kota_asal' => 1, 
                'kota_tujuan' => 2, 
                'tanggal_pergi' =>  '2026-03-02',
            ],
            [
                'id_maskapai' => 2,
                'kota_asal' => 3,
                'kota_tujuan' => 5,
                'tanggal_pergi' => '2025-03-03',
            ],
            [
                'id_maskapai' => 3,
                'kota_asal' => 4,
                'kota_tujuan' => 6,
                'tanggal_pergi' => '2025-03-04',
            ],
        ];

        DB::table('rute')->insert($ruteData);
    }
}
