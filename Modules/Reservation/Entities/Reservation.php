<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;
use Modules\Vehicle\Entities\Trip;
use Modules\Vehicle\Entities\Seat;
use Modules\User\Entities\User;
use Modules\Reservation\Entities\Passenger;
class Reservation extends Model
{
    protected $fillable = ['customer_id', 'number', 'trip_id', 'user_id', 'pay_method', 'status'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function passengers(){
        return $this->hasMany(Passenger::class);
    }

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seats(){
        return $this->BelongsToMany(Seat::class, 'seat_reservations');
    }
}
