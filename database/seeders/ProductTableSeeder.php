<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loop to create 10 random products
        for ($i = 1; $i <= 20; $i++) {
            $category = rand(0, 1) ? 'Food' : 'Beverage';
            Product::create([
                'name' => 'Product ' . $i,
                'category' => $category,
                'description' => 'Description for product ' . $i,
                'created_date' => '2025-03-10',
                'created_time' => '12:05:00'
            ]);
        }
    }
}
