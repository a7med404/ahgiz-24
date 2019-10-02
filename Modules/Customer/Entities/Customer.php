<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Reservation\Entities\Reservation;

class Customer extends Authenticatable
{
    protected $table = "customers";
    protected $fillable = [
        'id', 'first_name', 'last_name', 'phone_number', 'email', 'password'
    ];  

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
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
