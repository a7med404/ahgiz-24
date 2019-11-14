<?php

namespace Modules\Customer\Tests\Feature\Api\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Generator as Faker;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Customer\Entities\Customer;

class ApiCustomerControllerTest extends TestCase
{
// use DatabaseMigrations;
use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function it_can_create_a_user()
    {
        /**
         * * Given => pre condition to let test work [user is authenticated]
         * * When  => the action we want to take [when make a post request to create customer]
         * * Then  =>  out of that action accordian to given condition [customer should be added]
         */
        $data = [
            'phone_number' => $phone_number = '928264846'
        ];
        $response = $this->json('POST', route('login-register'), $data);
        $this->assertEquals($data['phone_number'], $phone_number);
        $this->assertDatabaseHas('customers', [
            'phone_number' => addSudanKey($phone_number)
        ]);
        $response->assertJsonStructure([
            "customer" => [
                "id", "c_name", "phone_number", "email", "gender", "birthdate", "access_token", "isNew", "customer_update", "customer_logout", "customer_delete", "my_reservations", "search_reservation", "get_bus_stations"
            ]
        ])->assertStatus(200);
    }
}












// $faker = Factory::create();
// $phoneNumber = $faker->e164PhoneNumber();
// $data = [
//     // 'c_name' => $faker->name(),
//     'phone_number' => $phone_number = '928565478',
//     // 'email' => $faker->safeEmail(),
//     // 'password' => bcrypt($phoneNumber),
//     // 'remember_token' => str_random(10),
//     // 'gender' => 1,
//     // 'birthdate' => now(),
// ];
