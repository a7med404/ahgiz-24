<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Reservation\Entities\Reservation;
use Modules\Company\Entities\Company;
use Modules\Vehicle\Entities\Route;
use Modules\Vehicle\Entities\Station;
use Modules\Reservation\Entities\PlaneReservation;


class Trip extends Model
{
    protected $fillable = ['departure_time', 'arrive_time', 'price', 'saleprice', 'date', 'company_id', 'description', 'number', 'seats_number', 'status', 'from_station_id', 'to_station_id'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


    public function PlaneReservations()
    {
        return $this->hasMany(PlaneReservation::class);
    }

    // public function reservations()
    // {
    //     return $this->belongsTo(Reservation::class);
    // }
    public function company()
    {
        return $this->belongsTo (Company::Class);
    }

    public function route()
    {
        return $this->belongsTo(Route::Class);
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
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
