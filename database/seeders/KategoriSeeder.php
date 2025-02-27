<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'ELEC001',
                'kategori_nama' =>  'Elektronik',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'PETS002',
                'kategori_nama' =>  'Aksesoris Hewan',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'FASH003',
                'kategori_nama' =>  'Pakaian',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'SAFE004',
                'kategori_nama' =>  'Peralatan Keselamatan',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'LABS005',
                'kategori_nama' =>  'Peralatan Laboratorium',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
