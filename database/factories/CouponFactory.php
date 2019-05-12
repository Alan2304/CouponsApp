<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify('Coupon ???'),
        'discount' => $faker->randomFloat($nbMaxDecimals=2, $min=5, $max=95),
        'expiration' => '2019-07-21',
        'code' => $faker->unique()->randomNumber($nbDigits=7),
        'description' => $faker->text($maxNbChars = 100),
        'establishment_id' => $faker->numberBetween($min=1, $max=3),
        'product_id' => $faker->numberBetween($min=2, $max=6)         
    ];
});
