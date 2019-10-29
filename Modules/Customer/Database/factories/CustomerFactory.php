<?php

use Faker\Generator as Faker;
use Modules\Customer\Entities\Customer;


$factory->define(Customer::class, function (Faker $faker) {
    return [

        // 'first_name' => $faker->firstName(),
        'c_name' => $faker->name(),
        'phone_number' => $faker->e164PhoneNumber(),
        'email' => $faker->safeEmail(),
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'gender' => 1,
        'birthdate' => now(),
    ];
});
