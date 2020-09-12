<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [

        'order' => 1,
        'source' => 'https://loremflickr.com/500/500?random='.$faker->numberBetween(1,99)
    ];
});

