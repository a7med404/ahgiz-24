<?php

namespace Modules\Customer\Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Customer\Entities\Customer;

class CustomerControllerTest extends TestCase
{
    // use DatabaseTransactions;
    // use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function customer_add()
    {
        $data = factory(Customer::class, 2)->make(); 
        $this->assertTrue(is_object($data));
    }
}
