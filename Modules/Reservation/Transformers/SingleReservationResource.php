<?php

namespace Modules\Reservation\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id'                => $this->id,
            // 'customer'          => $this->customer->c_name,
            // 'trip'          => $this->trip,
            // 'seats'         => $this->seats,
            // 'user'              => $this->user,
            'company'           => $this->trip->company->name,
            'fromStation'       => $this->trip->fromStation->name,
            'toStation'         => $this->trip->toStation->name,
            'departure_time'    => $this->trip->departure_time,
            'arrive_time'       => $this->trip->arrive_time,
            'number'            => $this->number,
            'saleprice'         => $this->trip->saleprice,
            'date'              => $this->trip->date,
            'saleprice'         => formatCurrency($this->trip->saleprice),
            'status'            => $this->status, 
            'status_value'            => reservationStatus()[$this->status],
            'passengers'        => filterData('passengers', $this->id),//$this->passengers,
            // 'status'        => reservationStatus()[$this->status],
            // 'editRoute'     => editRoute('reservations', $this->id),
            // 'deleteRoute'   => deleteRoute()[$this->status]
        ];
    }
}
