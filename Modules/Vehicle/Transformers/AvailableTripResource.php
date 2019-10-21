<?php

namespace Modules\Vehicle\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailableTripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    
     public function seatNumber(){
        $reservations = $this->reservations->map(function ($reservation) {
            $passengers = $reservation->passengers->count();
            return  $passengers;
        });
        return array_sum($reservations->toArray());
     }

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
            'company'           => __('app/messages.agency').' '.$this->company->name,  
            'number'            => $this->number,
            'avalibale_seats'   => $this->seats_number - $this->seatNumber(),
            'reserve_step_one'    => route('reserve-step-one', ['tripId' => $this->id, 'customerId' => auth()->user()->id]),
        ];
    }
}
