<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
      'customer_id' => $faker->numberBetween(1, 5),     
	    'trip_id' => $faker->numberBetween(1, 5),     
	    'user_id' => $faker->numberBetween(1, 5),     
	    'number' => $faker->numberBetween(1, 5),     
	    'conceled_at' => $faker->word,     
	    'pay_method' => $faker->word,     
	    'status' => $faker->numberBetween(1, 5),     
    ];
});
