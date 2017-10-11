<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Order::class, function (Faker $faker) {
    return [
        'order_no' => \App\Library\Helper\Utils::orderNumberGenerator(0x1, 0x1),
        'title' => $faker->title(),
        'body' => $faker->title(),
        'status' => $faker->randomDigit(),
        'amount' => $faker->randomNumber(),
        'vendor_trade_no' => $faker->randomNumber(),
        'vendor' => $faker->randomNumber(),
        'count' => $faker->randomDigit(),
        'confirm_time' => $faker->dateTime(),
    ];
});