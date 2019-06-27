<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;
use Modules\Vehicle\Entities\Trip;

class Reservation extends Model
{
    protected $fillable = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function trip(){
        return $this->belongsTo(Trip::class);
    }
}
