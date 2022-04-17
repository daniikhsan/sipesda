<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Penduduk;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy_penduduk = [
            [
                'nik' => '6474010205020001',
                'nama' => 'Muhammad Priandani Nur Ikhsan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Bontang',
                'tanggal_lahir' => '2002-05-02',
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SLTA/Sederajat',
                'alamat' => 'JL. Flores No.9 BTN KCY',
                'pekerjaan' => 'Pelajar/Mahasiswa',
                'email' => 'priandani25@gmail.com',
                'role' => 'super_admin',
            ],
            [
                'nik' => '1',
                'nama' => 'Erick Gusnaldi Hendrawan Ang',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SLTA/Sederajat',
                'alamat' => null,
                'pekerjaan' => 'Pelajar/Mahasiswa',
                'email' => '10201036@student.itk.ac.id',
                'role' => 'admin',
            ],
            [
                'nik' => '2',
                'nama' => 'Hana Karimah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SLTA/Sederajat',
                'alamat' => null,
                'pekerjaan' => 'Pelajar/Mahasiswa',
                'email' => '10201044@student.itk.ac.id',
                'role' => 'admin',
            ],
            [
                'nik' => '3',
                'nama' => 'Maya Saraswati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'status_perkawinan' => 'Belum Kawin',
                'pendidikan' => 'SLTA/Sederajat',
                'alamat' => null,
                'pekerjaan' => 'Pelajar/Mahasiswa',
                'email' => '10201054@student.itk.ac.id',
                'role' => 'admin',
            ],
        ];
        
        for ($i=0; $i < count($dummy_penduduk); $i++) { 
            $penduduk = Penduduk::create([
                'nik' => $dummy_penduduk[$i]['nik'],
                'nama' => $dummy_penduduk[$i]['nama'],
                'jenis_kelamin' => $dummy_penduduk[$i]['jenis_kelamin'],
                'tempat_lahir' => $dummy_penduduk[$i]['tempat_lahir'],
                'tanggal_lahir' => $dummy_penduduk[$i]['tanggal_lahir'],
                'status_perkawinan' => $dummy_penduduk[$i]['status_perkawinan'],
                'pendidikan' => $dummy_penduduk[$i]['pendidikan'],
                'alamat' => $dummy_penduduk[$i]['alamat'],
                'pekerjaan' => $dummy_penduduk[$i]['pekerjaan']
            ]);

            $user = $penduduk->user()->create([
                'nik' => $dummy_penduduk[$i]['nik'],
                'email' => $dummy_penduduk[$i]['email'],
                'password' => Hash::make('password'),
                'role' => $dummy_penduduk[$i]['role']
            ]);
        
        }
    }
}
