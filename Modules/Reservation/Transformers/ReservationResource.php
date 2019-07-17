<?php

namespace Modules\Reservation\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'id'            => $this->id,
            'customer'      => $this->customer,
            'trip'          => $this->trip,
            'seats'         => $this->seats,
            'user'          => $this->user,
            'company'       => $this->trip->company,
            'fromStation'   => getName('stations', $this->trip->from_station_id),
            'toStation'     => getName('stations', $this->trip->to_station_id),
            'status'        => reservationStatus()[$this->status],
            'editRoute'     => editRoute('reservations', $this->id),
            // 'deleteRoute'   => deleteRoute()[$this->status]
        ];
        return parent::toArray($request);
    } 
}
