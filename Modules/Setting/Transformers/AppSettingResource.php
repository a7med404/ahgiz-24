<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class AppSettingResource extends JsonResource
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
            'max_seats_allowed'                 => $this->max_seats_allowed,
            'BOK_status'                        => $this->BOK_status,
            'EPS_status'                        => $this->EPS_status,
            'cash_status'                       => $this->cash_status,
            'terms'                             => $this->terms,
            'cancel_condition'                  => $this->cancel_condition,
        ];
        return parent::toArray($request);
    }
}
