<?php

namespace Modules\Region\Repositories;

use Modules\Region\Entities\Region;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method findOrFail(string $id)
 * @method create(array $attributes)
 */
class RegionRepository extends Region {
    /**
     * Get all regions
     *
     * @return Collection|Region[]
     */
    public function getItems(): Collection {
        return $this->all();
    }

    /**
     * Get region by its identifier
     *
     * @param string $id
     * @return Region
     */
    public function getItem(string $id): Region {
        return $this->findOrFail($id);
    }

    /**
     * Store a region
     *
     * @param array $attributes
     * @return Region
     */
    public function createItem(array $attributes): Region {
        return $this->create($attributes);
    }

    /**
     * Update a region
     *
     * @param string $id
     * @param array $attributes
     * @return Region
     */
    public function updateItem(string $id, array $attributes): Region {
        return tap($this->findOrFail($id))->update($attributes);
    }

    /**
     * Delete a region
     *
     * @param string $id
     * @return Region
     */
    public function destroyItem(string $id): Region {
        $region = $this->findOrFail($id); $this->destroy($id);
        return $region;
    }
}
