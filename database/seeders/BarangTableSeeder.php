<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::insert([
            [
                'nama_barang' => 'Barang 1', 
                'harga_barang' => 20000, 
                'stok_barang' => 100,
            ],
            [
                'nama_barang' => 'Barang 2', 
                'harga_barang' => 21000, 
                'stok_barang' => 100,
            ],
            [
                'nama_barang' => 'Barang 3', 
                'harga_barang' => 22000, 
                'stok_barang' => 100,
            ],
            [
                'nama_barang' => 'Barang 4', 
                'harga_barang' => 23000, 
                'stok_barang' => 100,
            ],
            [
                'nama_barang' => 'Barang 5', 
                'harga_barang' => 24000, 
                'stok_barang' => 100,
            ],
        ]);
    }
}
