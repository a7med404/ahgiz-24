<?php

namespace Modules\Reservation\Entities;

use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model
{
    protected $fillable = ['id', 'seat_id', 'reservation_id',];
}
