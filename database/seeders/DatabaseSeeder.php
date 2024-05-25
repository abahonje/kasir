<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $dataUser = [
        //     [
        //         'nama_lengkap' => 'Anung',
        //         'username' => 'admin',
        //         'password' => Hash::make('admin'),
        //         'level' => 'admin',
        //         'status' => 'aktif',
        //     ],
        //     [
        //         'nama_lengkap' => 'Okki',
        //         'username' => 'userkasir',
        //         'password' => Hash::make('123456'),
        //         'level' => 'kasir',
        //         'status' => 'nonaktif',
        //     ],
        // ];

        // foreach($dataUser as $user) {
        //     User::create($user);
        // }

        // $dataSupplier = [
        //     [
        //         'user_id' => 1,
        //         'nama' => 'CV. Abadi Sentosa',
        //         'no_hp' => '123456789012',
        //         'alamat' => 'Jl. Jend. A Yani No. 178'
        //     ],
        //     [
        //         'user_id' => 2,
        //         'nama' => 'PT. Multijasa Shoes',
        //         'no_hp' => '123456789013',
        //         'alamat' => 'Jl. Petamburan No. 156 Jakarta'
        //     ],
        // ];

        // foreach($dataSupplier as $supplier) {
        //     Supplier::create($supplier);
        // }

        // $dataJenis = [
        //     [
        //         'user_id' => 1,
        //         'kode' => 'ss-nike',
        //         'jenis' => 'Sepatu Sport Nike'
        //     ],
        //     [
        //         'user_id' => 1,
        //         'kode' => 'sk-adidas',
        //         'jenis' => 'Sepatu Kets Adidas',
        //     ],
        // ];

        // foreach($dataJenis as $jenis){
        //     Jenis::create($jenis);
        // }

        $dataBarang = [
            [
                'user_id' => 1,
                'jenis_id' => 1,
                'nama_barang' => 'Nike Zoom Flyknit',
                'harga' => 200000,
                'ukuran' => 41,
                'stok' => 5,
                'deskripsi' => 'Sepatu Murah Nike Zoom Flyknit Airmax Sneakers Sport Men Abu Hitam - Sepatu Olahraga Pria Running Jogging Gym Stylist Fashion Best Seller',
                'photo' => 'sport-nike.jpg'
            ],
            [
                'user_id' => 1,
                'jenis_id' => 1,
                'nama_barang' => 'Nike Zoom Flyknit',
                'harga' => 200000,
                'ukuran' => 42,
                'stok' => 5,
                'deskripsi' => 'Sepatu Murah Nike Zoom Flyknit Airmax Sneakers Sport Men Abu Hitam - Sepatu Olahraga Pria Running Jogging Gym Stylist Fashion Best Seller',
                'photo' => 'sport-nike.jpg'
            ],
            [
                'user_id' => 1,
                'jenis_id' => 2,
                'nama_barang' => 'Adidas Neo Zoom',
                'harga' => 148000,
                'ukuran' => 41,
                'stok' => 5,
                'deskripsi' => 'Sepatu Kets Adidas Neo Zoom Casual Running Man Pria Grade Ori Navy',
                'photo' => 'kets-adidas.jpeg'
            ],
            [
                'user_id' => 1,
                'jenis_id' => 2,
                'nama_barang' => 'Adidas Neo Zoom',
                'harga' => 148000,
                'ukuran' => 42,
                'stok' => 5,
                'deskripsi' => 'Sepatu Kets Adidas Neo Zoom Casual Running Man Pria Grade Ori Navy',
                'photo' => 'kets-adidas.jpeg'
            ],
            [
                'user_id' => 1,
                'jenis_id' => 2,
                'nama_barang' => 'Adidas White Kets',
                'harga' => 60000,
                'ukuran' => 40,
                'stok' => 5,
                'deskripsi' => 'Sepatu kets Adidas list hitam bahan kulit sintetis',
                'photo' => 'kets-adidas1.jpg'
            ],
            [
                'user_id' => 1,
                'jenis_id' => 2,
                'nama_barang' => 'Adidas White Kets',
                'harga' => 60000,
                'ukuran' => 41,
                'stok' => 5,
                'deskripsi' => 'Sepatu kets Adidas list hitam bahan kulit sintetis',
                'photo' => 'kets-adidas1.jpg'
            ],
        ];

        foreach($dataBarang as $barang) {
            Barang::create($barang);
        }
    }
}
