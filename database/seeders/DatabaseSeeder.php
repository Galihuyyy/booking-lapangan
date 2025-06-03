<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Lapangan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::create([
            "name"=> "user",
            "password" => bcrypt("user"),
        ]);

        User::create([
            "name"=> "admin",
            "password" => bcrypt("admin"),
            "role" => "admin",
        ]);
        
        for ($i = 0; $i < 4; $i++) {
            Lapangan::create([
                "foto" => 'default.jpg',
                "name" => "lapangan" . $i,
                "deskripsi"=> "lorem ipsum dolor sit amet fo huji sakj",
                "harga_sewa" => $i * 10000
            ]);
        }
        
    }
}
