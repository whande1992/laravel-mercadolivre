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
        \App\ProductImage::truncate();
        \App\Product::truncate();

        factory(App\Product::class, 10)->create()->each(function ($product) {
            $product->images()->save(factory(App\ProductImage::class)->make());
        });

    }
}
