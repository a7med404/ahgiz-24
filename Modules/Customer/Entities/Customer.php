<?php

namespace Modules\Customer\Entities;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Entities\PlaneReservation;


class Customer extends Authenticatable
{
    use HasApiTokens;
    protected $table = "customers";
    protected $fillable = [
        'id', 'c_name', 'phone_number', 'email','password','birthdate',
    ];  

    protected $hidden = [
         'remember_token',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function PlaneReservations(){
        return $this->hasMany(PlaneReservation::class);
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    // public function guard()
    // {
    //     return Auth::guard(['customer']);
    // }
    public function username()
    {
        return 'phone_number';
    }
}
