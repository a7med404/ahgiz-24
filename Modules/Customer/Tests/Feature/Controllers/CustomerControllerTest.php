<?php

namespace Modules\Customer\Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerControllerTest extends TestCase
{
    // use DatabaseMigrations;
    // use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function customer_add()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
