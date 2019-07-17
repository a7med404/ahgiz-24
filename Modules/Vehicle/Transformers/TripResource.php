<?php

namespace Modules\Vehicle\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class TripResource extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    { 
        return  [
            'id'                => $this->id,
            'departure_time'    => $this->departure_time,
            'arrive_time'       => $this->arrive_time,
            'date'              => $this->date,
            'number'            => $this->number,
            'price'             => $this->price,
            'company'           => $this->company,
            'fromStation'       => getName('stations', $this->from_station_id),
            'toStation'         => getName('stations', $this->to_station_id),
            'status'            => tripStatus()[$this->status],
            'editRoute'         => editRoute('trips', $this->id),
            'showRoute'         => showRoute('trips', $this->id),
            'description'       => $this->description,
            'seats_number'      => $this->seats_number,
            'avalibale_seats'   => $this->seats_number - $this->reservations->count() 
        ];
        return parent::toArray($request);
    }
}
