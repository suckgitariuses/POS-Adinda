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
            ['kategori_id' => 1, 'kategore_kode' => 'SMB', 'kategori_nama' => 'Sembako'],
            ['kategori_id' => 2, 'kategore_kode' => 'MKN', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => 3, 'kategore_kode' => 'MNM', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 4, 'kategore_kode' => 'OBT', 'kategori_nama' => 'Obat-obatan'],
            ['kategori_id' => 5, 'kategore_kode' => 'KSM', 'kategori_nama' => 'Kosmetik'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
