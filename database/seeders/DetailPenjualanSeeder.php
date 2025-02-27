<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $selectedBarang = array_rand(range(1, 10), 3); // Pilih 3 barang random
            foreach ($selectedBarang as $barangIndex) {
                $barang_id = $barangIndex + 1;
                $harga = DB::table('m_barang')->where('barang_id', $barang_id)->value('harga_jual');
                $data[] = [
                    'penjualan_id' => $i,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => rand(1, 5),
                ];
            }
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}
