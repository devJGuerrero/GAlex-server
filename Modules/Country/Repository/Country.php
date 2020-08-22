<?php

namespace Modules\Country\Repository;

use Modules\Country\Entities\Country as Model;

class Country extends Model {
    /**
     * Get all countries
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getItems() {
        return $this->all();
    }

    /**
     * Get country by its identifier
     *
     * @param  string $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getItem($id) {
        return $this->findOrFail($id);
    }

    /**
     * Store a country
     *
     * @param  array $attributes
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function createItem($attributes) {
        return $this->create($attributes);
    }

    /**
     * Update a country
     *
     * @param  string $id
     * @param  array  $attributes
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function updateItem($id, $attributes) {
        return tap($this->findOrFail($id))->update($attributes);
    }

    /**
     * Delete a country
     *
     * @param  string $id
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function destroyItem($id) {
        $country = $this->findOrFail($id); $this->destroy($id);
        return $country;
    }
}
