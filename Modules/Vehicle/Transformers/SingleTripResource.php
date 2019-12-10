<?php

namespace Modules\Vehicle\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleTripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'date'              => $this->date,
            'saleprice'         => $this->saleprice,
            'fromStation'       => $this->fromStation->name,
            'toStation'         => $this->toStation->name,
            'departure_time'    => $this->departure_time,
            'arrive_time'       => $this->arrive_time,
            'company'           => $this->company->name,
            // 'company'           => __('app/messages.agency') . ' ' . $this->company->name,
            // 'number'            => $this->number,
            'reserve_step_two'    => route('reserve-step-two', ['id' => $this->id]),
        ];

    }
}
