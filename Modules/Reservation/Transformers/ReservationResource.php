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
            'id'                => $this->id,
            'customer'          => $this->customer->c_name,
            // 'user'              => $this->user,
            'company'           => $this->trip->company->name,
            'fromStation'       => $this->trip->fromStation->name,
            'toStation'         => $this->trip->toStation->name,
            'departure_time'    => $this->trip->departure_time,
            'arrive_time'       => $this->trip->arrive_time,
            'number'            => $this->trip->number,
            'saleprice'         => $this->trip->saleprice,
            'date'              => $this->trip->date,
            'seats_number'      => $this->trip->seats_number,
            'status'            => $this->status,
            'current_date'      => now(),
            'valid_unit'        => strtotime($this->trip->date.$this->trip->departure_time),
            'editRoute'         => showRoute('reservations', $this->id),
        ];
        // return parent::toArray($request);
    } 
}
