<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Vehicle\Entities\Station;

class Route extends Model
{
    protected $fillable = ['name', 'mileage', 'from_station_id', 'to_station_id'];

    public function fromStation()
    {
        return $this->hasOne(Station::Class, 'id', 'from_station_id');
    }

    public function toStation()
    {
        return $this->hasOne(Station::Class, 'id', 'to_station_id');
    }
}
