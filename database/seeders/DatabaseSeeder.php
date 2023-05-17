<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\User;
use App\Models\JenisPelaporan;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // MAKE SEEDER FOR UNIT

        Unit::create([
            'id'        => 1,
            'nama_unit' => "Unit 1"
        ]);

        Unit::create([
            'id'        => 2,
            'nama_unit' => 'Unit 2'
        ]);

        Unit::create([
            'id'        => 3,
            'nama_unit' => 'Unit 3'
        ]);

        Unit::create([
            'id'        => 4,
            'nama_unit' => 'Unit 4'
        ]);
        

        
        // MAKE SEEDER FOR USER

        User::create([
            'id'        => 1,
            'unit_id'   => 4,
            'name'      => 'AKP Endro Prabowo',
            'email'     => 'endro@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'Admin',
            'jabatan'   => 'Kanit',
        ]);
        
        User::create([
            'id'        => 2,
            'name'      => 'Muhammad Rafli Akbar',
            'email'     => 'rafli@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Kasubdit',
        ]);

        User::create([
            'id'        => 3,
            'unit_id'   => 1,
            'name'      => 'Tobias Martin Suena',
            'email'     => 'martin@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Kanit',
        ]);

        User::create([
            'id'        => 4,
            'unit_id'   => 2,
            'name'      => 'Vigyantara Dentawardana',
            'email'     => 'vigy@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Kanit',
        ]);

        User::create([
            'id'        => 5,
            'unit_id'   => 3,
            'name'      => 'Adriel Sebastian',
            'email'     => 'adriel@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Kanit',
        ]);

        User::create([
            'id'        => 6,
            'unit_id'   => 4,
            'name'      => 'Ryan Sidabutar',
            'email'     => 'ryan@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Kanit',
        ]);

        User::create([
            'id'        => 7,
            'unit_id'   => 1,
            'name'      => 'Andira Faqih',
            'email'     => 'faqih@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 1',
        ]);

        User::create([
            'id'        => 8,
            'unit_id'   => 2,
            'name'      => 'Rayhan Illias',
            'email'     => 'rayhan@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 1',
        ]);

        User::create([
            'id'        => 9,
            'unit_id'   => 3,
            'name'      => 'Nikolas Al-Widad',
            'email'     => 'nikol@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 1',
        ]);

        User::create([
            'id'        => 10,
            'unit_id'   => 4,
            'name'      => 'Fahrel Gibran',
            'email'     => 'fahrel@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 1',
        ]);

        User::create([
            'id'        => 11,
            'unit_id'   => 1,
            'name'      => 'Naufal Randika',
            'email'     => 'naufal@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 2',
        ]);

        User::create([
            'id'        => 12,
            'unit_id'   => 2,
            'name'      => 'Sultan Jodi',
            'email'     => 'jodi@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 2',
        ]);

        User::create([
            'id'        => 13,
            'unit_id'   => 3,
            'name'      => 'Rifan Fa\'toni',
            'email'     => 'rifan@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 2',
        ]);

        User::create([
            'id'        => 14,
            'unit_id'   => 4,
            'name'      => 'Rijal Kurniawan',
            'email'     => 'rijal@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Panit 2',
        ]);

        User::create([
            'id'        => 15,
            'unit_id'   => 1,
            'name'      => 'Muhammad Kurniawan',
            'email'     => 'kur@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Anggota',
        ]);

        User::create([
            'id'        => 16,
            'unit_id'   => 2,
            'name'      => 'Jason Al-Hilal Sabda Dewa',
            'email'     => 'jason@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Anggota',
        ]);

        User::create([
            'id'        => 17,
            'unit_id'   => 3,
            'name'      => 'Dani Drajat Kurniawan',
            'email'     => 'dani@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Anggota',
        ]);

        User::create([
            'id'        => 18,
            'unit_id'   => 4,
            'name'      => 'Vito Husein',
            'email'     => 'vito@krimsus.com',
            'password'  => Hash::make('krimsus123'),
            'level'     => 'User',
            'jabatan'   => 'Anggota',
        ]);




        // MAKE SEEDER FOR JENIS_PELAPORAN

        JenisPelaporan::create([
            'id'                => 1,
            'nama_pelaporan'    => 'Kesusilaan'
        ]);

        JenisPelaporan::create([
            'id'                => 2,
            'nama_pelaporan'    => 'Perjudian'
        ]);

        JenisPelaporan::create([
            'id'                => 3,
            'nama_pelaporan'    => 'Pencemaran Nama Baik'
        ]);

        JenisPelaporan::create([
            'id'                => 4,
            'nama_pelaporan'    => 'Ancaman Pemerasan'
        ]);

        JenisPelaporan::create([
            'id'                => 5,
            'nama_pelaporan'    => 'Penipuan'
        ]);

        JenisPelaporan::create([
            'id'                => 6,
            'nama_pelaporan'    => 'Ujaran Kebencian'
        ]);

        JenisPelaporan::create([
            'id'                => 7,
            'nama_pelaporan'    => 'Ancaman Kekerasan'
        ]);

        JenisPelaporan::create([
            'id'                => 8,
            'nama_pelaporan'    => 'Akses Ilegal Peretasan'
        ]);

        JenisPelaporan::create([
            'id'                => 9,
            'nama_pelaporan'    => 'Penyadapan Ilegal'
        ]);

        JenisPelaporan::create([
            'id'                => 10,
            'nama_pelaporan'    => 'Gangguan Terhadap Data'
        ]);

        JenisPelaporan::create([
            'id'                => 11,
            'nama_pelaporan'    => 'Gangguan terhadap Sistem'
        ]);

        JenisPelaporan::create([
            'id'                => 12,
            'nama_pelaporan'    => 'Penyalahgunaan Perangkat'
        ]);

        JenisPelaporan::create([
            'id'                => 13,
            'nama_pelaporan'    => 'Manipulasi Data'
        ]);

        JenisPelaporan::create([
            'id'                => 14,
            'nama_pelaporan'    => 'Hoax'
        ]);

        JenisPelaporan::create([
            'id'                => 15,
            'nama_pelaporan'    => 'Investasi'
        ]);

        JenisPelaporan::create([
            'id'                => 16,
            'nama_pelaporan'    => 'Pinjol'
        ]);



    }
}
