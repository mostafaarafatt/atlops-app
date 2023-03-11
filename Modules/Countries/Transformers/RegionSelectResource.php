<?php

namespace Modules\Countries\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->city->country->name . ' - ' . $this->city->name . ' - ' . $this->name,
            'image' => $this->city->country->getFirstMediaUrl('flags'),
        ];
    }
}
