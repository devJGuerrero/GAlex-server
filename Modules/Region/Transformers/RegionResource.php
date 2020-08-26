<?php

namespace Modules\Region\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Country\Transformers\CountryWithoutRegionResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed countries
 * @property mixed created_at
 * @property mixed updated_at
 */
class RegionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"        => $this->id,
            "name"      => $this->name,
            "countries" => CountryWithoutRegionResource::collection($this->countries),
            "created"   => $this->created_at,
            "updated"   => $this->updated_at
        ];
    }
}
