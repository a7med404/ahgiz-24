<?php

use Faker\Generator as Faker;
use Modules\Customer\Entities\Customer;


$factory->define(Customer::class, function (Faker $faker) {
    return [

        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'phone_number' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'gender' => $faker->randomElements(['male','female']),
        'brithdate' => now(),
    ];
});
