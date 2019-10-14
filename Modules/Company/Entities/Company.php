<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Address\Entities\Address;
use Modules\Address\Entities\Contact;
use Modules\Vehicle\Entities\Vehicle;

class Company extends Model
{
    protected $fillable = ['name', 'logo', 'note', 'type', 'status'];

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::Class);
    }
}
