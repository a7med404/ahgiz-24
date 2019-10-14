<?php

namespace Modules\Vehicle\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Reservation\Entities\Reservation;

class Seat extends Model
{
    protected $fillable = ['name'];

    public function reservations(){
        return $this->BelongsToMany(Reservation::class, 'seat_reservations');


        
    }
    
    public function trip()
    {
    	return $this->belongTo(Trip::class);
    }
}
