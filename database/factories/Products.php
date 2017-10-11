<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Products::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name(),
        'product_desc' => $faker->name(),
        'amount' => $faker->randomDigit(),
        'cover_image' => $faker->imageUrl(),
        'count' => $faker->randomDigit(),
        'left' => $faker->randomDigit(),
    ];
});
