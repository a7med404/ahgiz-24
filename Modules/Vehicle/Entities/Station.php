<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
// use Modules\Vehicle\Entities\Route;
use Modules\Vehicle\Entities\Trip;

class Station extends Model
{
    protected $fillable = ['name', 'city'];

    // public function fromRoute()
    // {
    //     return $this->belongsToMany(Route::Class, 'from_station_id', 'id');
    // }

    // public function toRoute()
    // {
    //     return $this->belongsToMany(Route::Class, 'to_station_id', 'id');
    // }


    public function fromTrip()
    {
        return $this->belongsToMany(Trip::Class, 'from_station_id', 'id');
    }

    public function toTrip()
    {
        return $this->belongsToMany(Trip::Class, 'to_station_id', 'id');
    }

}
