<?php

namespace Modules\Country\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed created_at
 * @property mixed updated_at
 */
class Resource extends JsonResource
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
            "name"    => $this->name,
            "created" => $this->created_at,
            "updated" => $this->updated_at
        ];
    }
}
