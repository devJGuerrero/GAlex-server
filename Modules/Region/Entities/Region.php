<?php

namespace Modules\Region\Entities;

use Modules\Country\Entities\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name"
    ];

    /**
     * Get the countries for the blog region.
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
    }
}
