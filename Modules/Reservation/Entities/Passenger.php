<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Reservation\Entities\Reservation;
class Passenger extends Model
{
    protected $fillable = ['name', 'gender', 'reservation_id'];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

}
