<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create([
            "name" => "Manzana",
            "image" => "img/manzana.jpg",
            "price" => "10500"
        ]);
    }
}
