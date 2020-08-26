<?php

namespace Modules\Region\Repositories;

use Modules\Region\Entities\Region;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method findOrFail(string $id)
 * @method create(array $attributes)
 */
class RegionRepository {
    /**
     * Get all regions
     *
     * @return Collection|Region[]
     */
    public function getItems(): Collection {
        return Region::all();
    }

    /**
     * Get region by its identifier
     *
     * @param string $id
     * @return Region
     */
    public function getItem(string $id): Region {
        return Region::findOrFail($id);
    }

    /**
     * Store a region
     *
     * @param array $attributes
     * @return Region
     */
    public function createItem(array $attributes): Region {
        return Region::create($attributes);
    }

    /**
     * Update a region
     *
     * @param string $id
     * @param array $attributes
     * @return Region
     */
    public function updateItem(string $id, array $attributes): Region {
        return tap(Region::findOrFail($id))->update($attributes);
    }

    /**
     * Delete a region
     *
     * @param string $id
     * @return Region
     */
    public function destroyItem(string $id): Region {
        $region = Region::findOrFail($id); Region::destroy($id);
        return $region;
    }
}
