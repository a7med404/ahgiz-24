<?php

namespace Modules\Vehicle\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class SingleTripResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
