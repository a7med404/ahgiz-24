<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Customer\Entities\Customer;
use Modules\Vehicle\Entities\Trip;
use Modules\User\Entities\User;
use Modules\Company\Entities\Company;
use Modules\Vehicle\Entities\Station;



class PlaneReservation extends Model
{
    protected $fillable = ['customer_id', 'from_station_id', 'to_station_id', 'company_id', 'user_id', 'date', 'status', 'canceled_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fromStation()
    {
        return $this->hasOne(Station::Class, 'id', 'from_station_id');
    }

    public function toStation()
    {
        return $this->hasOne(Station::Class, 'id', 'to_station_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
