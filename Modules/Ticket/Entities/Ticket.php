<?php

namespace Modules\Ticket\Entities;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_number', 'reservation_id'];
    
    public function Reservation()
    {
        return $this->belongsTo(Reservation::Class);
    }
}

