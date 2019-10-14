<?php

namespace Modules\Vehicle\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class AvailableTripResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'                => $this->id,
            'date'              => $this->date,
            'saleprice'         => $this->saleprice,
            'fromStation'       => $this->fromStation->name,
            'toStation'         => $this->toStation->name,
            'departure_time'    => $this->departure_time,
            'arrive_time'       => $this->arrive_time,
            'number'            => $this->number,
            'avalibale_seats'   => $this->seats_number - $this->reservations->count() ,
            ];
    }
}
