<?php

namespace Modules\User\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
// use Modules\Address\Entities\Address;
// use Modules\Address\Entities\Contact;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'username', 'profile_image', 'phone_number', 'note', 'status', 'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function addresses()
    // {
    //     // return $this->hasOne(Address::class, 'address_id', 'id');
    //     return $this->morphMany(Address::class, 'addressable');
    // }

    // public function contacts()
    // {
    //     return $this->morphMany(Contact::class, 'contactable');
    // }
}
