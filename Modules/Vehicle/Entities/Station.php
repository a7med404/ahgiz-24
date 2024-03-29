<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
// use Modules\Vehicle\Entities\Route;
use Modules\Vehicle\Entities\Trip;

class Station extends Model
{
    protected $fillable = ['name', 'city_id','status','type'];

    public function fromTrip()
    {
        return $this->belongsToMany(Trip::Class, 'from_station_id', 'id');
    } 

    public function toTrip()
    {
        return $this->belongsToMany(Trip::Class, 'to_station_id', 'id');
    }

    // public function trips()
    // {
    //     return $this->hasMany(Trip::class);
    // }
}
