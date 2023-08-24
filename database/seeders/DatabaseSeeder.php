<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         DB::table('users')->insert([
           [
                'id' => 1,
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('12345678'),
                'role' => 'Admin'
                ]
            
            ]);

            // DB::table('produks')->insert([
            //     [
            //         'id' => 1,
            //         'kode' =>'KR01',
            //         'nama_barang' => 'Kemplang Tenggiri',
            //         'harga' => 55000,
            //         'berat' => 500,
            //         'deskripsi' => 'Cuocok untuk cemilan',
            //         'stok' => 50,
            //         'foto' => '../admin/assets/img/kemplang.jpg'
            //     ],
            //     [
            //         'id' => 2,
            //         'kode' =>'KR02',
            //         'nama_barang' => 'Kemplang',
            //         'harga' => 55000,
            //         'berat' => 1000,
            //         'deskripsi' => 'Cocok untuk lauk makan',
            //         'stok' => 40,
            //         'foto' => '../admin/assets/img/Kemplangg.jpg'
            //     ],
            //     [
            //         'id' => 3,
            //         'kode' =>'KR03',
            //         'nama_barang' => 'Kemplang Panggang',
            //         'harga' => 55000,
            //         'berat' => 750,
            //         'deskripsi' =>'Enak dipanggang',
            //         'stok' => 60,
            //         'foto' => '../admin/assets/img/kemplang1.jpg'
            //     ]
              
            // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
  
}
