<?php

namespace Modules\Address\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
<<<<<<< HEAD
            return[
            'id'                => $this->id,
            'name'              => $this->name,
            ];

=======
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'parent_id'  => $this->parent_id,
        ];
        return parent::toArray($request);
>>>>>>> b1d728e7d9bd1e2625aeb5fdefce73d377cc69e9
    }
}
