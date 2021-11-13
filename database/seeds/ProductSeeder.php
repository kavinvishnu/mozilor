<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => Str::random(10),
            'sku' => Str::random(5),
            'price' => mt_rand( 100, 500),
            'description' => Str::random(200),
        ]);
    }
}
