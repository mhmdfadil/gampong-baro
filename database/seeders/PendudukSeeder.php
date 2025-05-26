<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        
        // List of possible values for enum fields
        $jenisKelamin = ['L', 'P'];
        $statusKeluarga = ['Kepala Keluarga', 'Istri', 'Anak', 'Lainnya'];
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];
        $statusPerkawinan = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        $pendidikanTerakhir = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'Diploma', 'Sarjana', 'Pascasarjana'];
        $pekerjaan = ['Petani', 'PNS', 'Wiraswasta', 'Buruh', 'Pelajar/Mahasiswa', 'Ibu Rumah Tangga', 'Lainnya'];
        
        // Indonesian cities for tempat_lahir
        $kota = ['Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Semarang', 'Yogyakarta', 'Denpasar', 
                'Makassar', 'Palembang', 'Padang', 'Bogor', 'Malang', 'Balikpapan', 'Samarinda'];
        
        // Dusun names
        $dusun = ['Dusun Krajan', 'Dusun Sumber', 'Dusun Pucang', 'Dusun Ngemplak', 
                'Dusun Wonosari', 'Dusun Karanganyar', 'Dusun Sidomulyo'];
        
        $data = [];
        
        for ($i = 0; $i < 100; $i++) {
            $gender = $faker->randomElement($jenisKelamin);
            $tanggalLahir = $faker->dateTimeBetween('-70 years', '-18 years');
            $status = $faker->randomElement($statusPerkawinan);
            
            // Generate NIK (16 digits)
            $nik = $faker->numerify('################');
            
            $data[] = [
                'nik' => $nik,
                'nama_lengkap' => $faker->name($gender == 'L' ? 'male' : 'female'),
                'tempat_lahir' => $faker->randomElement($kota),
                'tanggal_lahir' => $tanggalLahir->format('Y-m-d'),
                'jenis_kelamin' => $gender,
                'status_keluarga' => $faker->randomElement($statusKeluarga),
                'alamat' => 'RT '.$faker->numberBetween(1, 10).'/RW '.$faker->numberBetween(1, 5).' '.$faker->streetAddress,
                'dusun' => $faker->randomElement($dusun),
                'agama' => $faker->randomElement($agama),
                'status_perkawinan' => $status,
                'pendidikan_terakhir' => $faker->randomElement($pendidikanTerakhir),
                'pekerjaan' => $faker->randomElement($pekerjaan),
                'no_kk' => $faker->optional(0.8)->numerify('################'), // 80% chance of having KK
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        
        DB::table('penduduks')->insert($data);
    }
}