<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Reservation\Entities\Reservation;
use Modules\Company\Entities\Company;
use Modules\Vehicle\Entities\Route;
use Modules\Vehicle\Entities\Station;

class Trip extends Model
{
    protected $fillable = ['departure_time', 'arrive_time', 'price', 'date', 'company_id', 'description', 'number', 'seats_number', 'status', 'from_station_id', 'to_station_id'];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::Class);
    }
    public function route()
    {
        return $this->belongsTo(Route::Class);
    }

    public function fromStation()
    {
        return $this->hasOne(Station::Class, 'id', 'from_station_id');
    }

    public function toStation()
    {
        return $this->hasOne(Station::Class, 'id', 'to_station_id');
    }
}
