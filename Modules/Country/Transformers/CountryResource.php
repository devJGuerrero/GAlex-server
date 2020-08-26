<?php

namespace Modules\Country\Transformers;

use Illuminate\Http\Request;
use Modules\Region\Transformers\RegionWithoutCountries;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed region
 * @property mixed created_at
 * @property mixed updated_at
 */
class CountryResource extends JsonResource
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
            "region"    => new RegionWithoutCountries($this->region),
            "created"   => $this->created_at,
            "updated"   => $this->updated_at
        ];
    }
}
