<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'H. Ahmad Sudirman',
                'jabatan' => 'Kepala Desa',
                'whatsapp' => '6281234567890',
                'email' => 'kepaladesa@desa.id',
                'urutan' => 1,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Siti Aminah',
                'jabatan' => 'Sekretaris Desa',
                'whatsapp' => '6281234567891',
                'email' => 'sekretaris@desa.id',
                'urutan' => 2,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Bendahara Desa',
                'whatsapp' => '6281234567892',
                'email' => 'bendahara@desa.id',
                'urutan' => 3,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Dewi Lestari',
                'jabatan' => 'Kasi Pemerintahan',
                'whatsapp' => '6281234567893',
                'email' => 'kasipemerintahan@desa.id',
                'urutan' => 4,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Eko Prasetyo',
                'jabatan' => 'Kasi Kesejahteraan',
                'whatsapp' => '6281234567894',
                'email' => 'kasikesejahteraan@desa.id',
                'urutan' => 5,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Fitriani',
                'jabatan' => 'Kasi Pelayanan',
                'whatsapp' => '6281234567895',
                'email' => 'kasipelayanan@desa.id',
                'urutan' => 6,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Gunawan',
                'jabatan' => 'Kaur Keuangan',
                'whatsapp' => '6281234567896',
                'email' => 'kaurkeuangan@desa.id',
                'urutan' => 7,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Hesti Wulandari',
                'jabatan' => 'Kaur Umum',
                'whatsapp' => '6281234567897',
                'email' => 'kaurumum@desa.id',
                'urutan' => 8,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Irfan Maulana',
                'jabatan' => 'Kaur Perencanaan',
                'whatsapp' => '6281234567898',
                'email' => 'kaurperencanaan@desa.id',
                'urutan' => 9,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Joko Susilo',
                'jabatan' => 'Staff Administrasi',
                'whatsapp' => '6281234567899',
                'email' => 'staffadmin@desa.id',
                'urutan' => 10,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Kartika Sari',
                'jabatan' => 'Staff BPD',
                'whatsapp' => '6281234567800',
                'email' => 'staffbpd@desa.id',
                'urutan' => 11,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Lukman Hakim',
                'jabatan' => 'Ketua BPD',
                'whatsapp' => '6281234567801',
                'email' => 'bpd@desa.id',
                'urutan' => 12,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Maya Indah',
                'jabatan' => 'Ketua PKK',
                'whatsapp' => '6281234567802',
                'email' => 'pkk@desa.id',
                'urutan' => 13,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Nur Cahyo',
                'jabatan' => 'Ketua Karang Taruna',
                'whatsapp' => '6281234567803',
                'email' => 'karangtaruna@desa.id',
                'urutan' => 14,
                'status' => 'aktif'
            ],
            [
                'nama' => 'Oki Setiawan',
                'jabatan' => 'Ketua Linmas',
                'whatsapp' => '6281234567804',
                'email' => 'linmas@desa.id',
                'urutan' => 15,
                'status' => 'aktif'
            ]
        ];

        foreach ($data as $item) {
            StrukturOrganisasi::create($item);
        }
    }
}