<?php

namespace Modules\Country\Entities;

use Modules\Region\Entities\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "region_id"
    ];

    /**
     * Get the region record associated with the country.
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
