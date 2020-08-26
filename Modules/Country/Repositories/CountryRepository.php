<?php

namespace Modules\Country\Repositories;

use Modules\Country\Entities\Country;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method findOrFail(string $id)
 * @method create(array $attributes)
 */
class CountryRepository {
    /**
     * Get all countries
     *
     * @return Collection|Country[]
     */
    public function getItems(): Collection {
        return Country::all();
    }

    /**
     * Get country by its identifier
     *
     * @param string $id
     * @return Country
     */
    public function getItem(string $id): Country {
        return Country::findOrFail($id);
    }

    /**
     * Store a country
     *
     * @param array $attributes
     * @return Country
     */
    public function createItem(array $attributes): Country {
        return Country::create($attributes);
    }

    /**
     * Update a country
     *
     * @param string $id
     * @param array $attributes
     * @return Country
     */
    public function updateItem(string $id, array $attributes): Country {
        return tap(Country::findOrFail($id))->update($attributes);
    }

    /**
     * Delete a country
     *
     * @param string $id
     * @return Country
     */
    public function destroyItem(string $id): Country {
        $country = Country::findOrFail($id); Country::destroy($id);
        return $country;
    }
}
