<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'ELEC001', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'ELEC002', 'barang_nama' => 'Laptop', 'harga_beli' => 7000000, 'harga_jual' => 8000000],
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'ELEC003', 'barang_nama' => 'Headphone', 'harga_beli' => 500000, 'harga_jual' => 700000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'PETS001', 'barang_nama' => 'Kalung Anjing', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'PETS002', 'barang_nama' => 'Kandang Kucing', 'harga_beli' => 300000, 'harga_jual' => 400000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'FASH001', 'barang_nama' => 'Jaket Kulit', 'harga_beli' => 500000, 'harga_jual' => 700000],
            ['barang_id' => 7, 'kategori_id' => 3, 'barang_kode' => 'FASH002', 'barang_nama' => 'Sepatu Sneakers', 'harga_beli' => 400000, 'harga_jual' => 550000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'SAFE001', 'barang_nama' => 'Helm Safety', 'harga_beli' => 250000, 'harga_jual' => 350000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'LABS001', 'barang_nama' => 'Mikroskop', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'LABS002', 'barang_nama' => 'Tabung Reaksi', 'harga_beli' => 50000, 'harga_jual' => 75000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
