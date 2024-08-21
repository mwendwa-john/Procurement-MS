<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i <= 100; $i++ ) {
            $measures = ['pieces', 'kgs', 'bottles'];

            Product::create([
                'item_name'         => 'Product ' . $i,
                'product_slug'      => 'product-' . $i,
                'description'       => 'Description for Product ' . $i,
                'unit_of_measure'   => $measures[array_rand($measures)],
                'price'             => 19.99,
                'is_saved'          => false,
            ]);
        }
    }
}
