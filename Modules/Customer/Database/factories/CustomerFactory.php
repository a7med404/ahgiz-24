<?php

use Faker\Generator as Faker;
use Modules\Customer\Entities\Customer;


$factory->define(Customer::class, function (Faker $faker) {
    $phoneNumber = $faker->e164PhoneNumber();
    return [
        'c_name' => $faker->name(),
        'phone_number' => $phoneNumber,
        'email' => $faker->safeEmail(),
        'password' => bcrypt($phoneNumber),
        'remember_token' => str_random(10),
        'gender' => 1,
        'birthdate' => now(),
    ];
});
