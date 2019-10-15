<?php

namespace Modules\Ticket\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'id'                        => $this->id,
        ];
        return parent::toArray($request);
    }
}
