<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
// use Modules\Address\Entities\Address;
// use Modules\Address\Entities\Contact;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'password', 'username', 'profile_image', 'phone_number', 'note', 'status', 'last_login'];

    // public function addresses()
    // {
    //     return $this->morphMany(Address::class, 'addressable');
    // }

    // public function contacts()
    // {
    //     return $this->morphMany(Contact::class, 'contactable');
    // }
}
