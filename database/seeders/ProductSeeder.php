<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'name' => 'Vape',
                'details' => 'Flavour',
                'product_image' =>'',
                'price' => rand(999,9999),
                'quantity' => rand(1,10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
