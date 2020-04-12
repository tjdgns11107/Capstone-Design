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
        \App\Product::create([
            'product_title' => 'WaiStand',
            'product_price' => 100000,
            'product_content' => 'test waistand',
        ]);
    }
}
