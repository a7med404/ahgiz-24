<?php

namespace Modules\Reservation\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class SinglePassengerResource extends Resource
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
            'name'     => $this->name,
            'gender'   => maleOrfemale()[$this->gender],
        ];
       // return parent::toArray($request);
    }
}
