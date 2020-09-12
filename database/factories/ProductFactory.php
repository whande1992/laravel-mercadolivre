<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product as ProductAlias;
use Faker\Generator as Faker;

$factory->define(ProductAlias::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'brand' => $faker->company,
        'description' => $faker->text,
        'available_quantity' => $faker->numberBetween(1,10),
        'price' => $faker->numerify('###,##')
    ];

});
