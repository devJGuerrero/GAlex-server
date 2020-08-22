<?php

namespace Modules\Country\Repository;

use Modules\Country\Entities\Country as Model;
use Modules\Country\Transformers\Resource;

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
     * @param  string $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getID($id) {
        return Model::findOrFail($id);
    }

    /**
     * Store a country
     *
     * @param  array $attributes
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function store($attributes) {
        return Model::create($attributes);
    }

    /**
     * Update a country
     *
     * @param  string $id
     * @param  array  $attributes
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function update($id, $attributes) {
        return tap(Model::findOrFail($id))->update($attributes);
    }

    /**
     * Delete a country
     *
     * @param  string $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function destroy($id) {
        $country = Model::findOrFail($id); Model::destroy($id);
        return $country;
    }
}
