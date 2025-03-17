<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Udah
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Raya No. 1',
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Aditya Puta Aji Nur Alamsyah',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2001-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Raya No. 1',
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Zainudin',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Gatot Subroto No. 1',
            'role' => 'petugas',
        ]);

        DB::table('users')->insert([
            'name' => 'Septi',
            'email' => 'penumpang2@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Menteng',
            'role' => 'penumpang',
        ]);

        //Insert User Penumpang
        DB::table('users')->insert([
            'name' => 'Asep',
            'email' => 'asep@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2002-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Gatot Subroto No. 1',
            'role' => 'penumpang',
        ]);
        DB::table('users')->insert([
            'name' => 'Iqbal Saputra',
            'email' => 'bal213@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2007-01-01',
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Tanah Abang',
            'role' => 'penumpang',
        ]);
        DB::table('users')->insert([
            'name' => 'Alice Elizabeth',
            'email' => 'alip@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2001-01-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'PIK 2',
            'role' => 'penumpang',
        ]);
        DB::table('users')->insert([
            'name' => 'Alice Elizabeth',
            'email' => 'alice@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2001-01-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'PIK 2',
            'role' => 'penumpang',
        ]);
        DB::table('users')->insert([
            'name' => 'Fitri',
            'email' => 'fitri@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2001-01-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'PIK 2',
            'role' => 'penumpang',
        ]);
        DB::table('users')->insert([
            'name' => 'Villy Thorma Mulanderxa',
            'email' => 'villy@gmail.com',
            'password' => Hash::make('123456789'),
            'tanggal_lahir' => '2001-01-01',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'PIK 2',
            'role' => 'penumpang',
        ]);

        // Insert Master Kota
        DB::table('master_kotas')->insert([
            'nama_kota' => 'Jakarta',
        ]);
        DB::table('master_kotas')->insert([
            'nama_kota' => 'Bandung',
        ]);
        DB::table('master_kotas')->insert([
            'nama_kota' => 'Yogyakarta',
        ]);
        DB::table('master_kotas')->insert([
            'nama_kota' => 'Tokyo',
        ]);
        DB::table('master_kotas')->insert([
            'nama_kota' => 'Hiroshima',
        ]);
        DB::table('master_kotas')->insert([
            'nama_kota' => 'California',
        ]);
   }
}
