<?php

namespace Modules\Country\Repository;

use Modules\Country\Entities\Country as Model;

class Country {
    /**
     * Get all countries
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getALL() {
        return Model::all();
    }

    /**
     * Get country by its identifier
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getID($id) {
        return Model::findOrFail($id);
    }

    /**
     * Store a country
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function store($attributes) {
        return Model::create($attributes);
    }
}
