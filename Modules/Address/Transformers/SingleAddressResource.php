<?php

namespace Modules\Address\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class SingleAddressResource extends Resource
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
