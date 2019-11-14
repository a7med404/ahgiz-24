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
        // dd(strtotime($this->trip->date . $this->trip->departure_time), strtotime(now()->toDateTimeString()));
        return  [
            'id'                        => $this->id,
            // 'customer'                  => $this->customer->c_name,
            // 'user'                      => $this->user,
            'company'                   => $this->trip->company->name,  
            'fromStation'               => $this->trip->fromStation->name,
            'toStation'                 => $this->trip->toStation->name,
            'departure_time'            => $this->trip->departure_time,
            'arrive_time'               => $this->trip->arrive_time,
            'number'                    => $this->number,
            'saleprice'                 => $this->trip->saleprice,
            'date'                      => $this->trip->date,
            'passengers'                => $this->passengers->count(),
            'canceled_at'                => $this->canceled_at,
            // 'seats_number'              => $this->trip->seats_number,
            'status'                    => reservationStatusForApp()[$this->status],
            'is_valid'                  => (strtotime($this->trip->date . $this->trip->departure_time) >= strtotime(now()->toDateTimeString())) ? true : false,
            'my_reservation_details'    => route('my-reservation-details', ['id' => $this->id]),
            'cancele_reservation'       => route('cancele-reservation'),
            // 'editRoute'         => showRoute('reservations', $this->id),
        ];
        // return parent::toArray($request);
    }
}
