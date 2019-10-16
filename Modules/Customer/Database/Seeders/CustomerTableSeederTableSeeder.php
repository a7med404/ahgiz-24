<?php

namespace Modules\Customer\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;

class CustomerTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        $count = 100;
        factory(Customer::class, $count)->create();
    
        // $this->call("OthersTableSeeder");
    }
}
