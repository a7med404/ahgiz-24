<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        
        'street_1' => $faker->streetAddress(),
        'street_2' => $faker->streetAddress(),
        'city' => $faker->numberBetween(1,10),
        'local' => $faker->numberBetween(1,3),
        'addressable_id' => $faker->numberBetween(1,10),
        'addressable_type' => $faker->name(10),
        'number ' => $faker->phoneNumber(),
    ];
});
