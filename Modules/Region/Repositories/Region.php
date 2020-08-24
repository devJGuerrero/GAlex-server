<?php

namespace Modules\Region\Repositories;

use Modules\Region\Entities\Region as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * @method findOrFail(string $id)
 * @method create(array $attributes)
 */
class Region extends Model {
    /**
     * Get all regions
     *
     * @return Collection|Region[]
     */
    public function getItems() {
        return $this->all();
    }

    /**
     * Get region by its identifier
     *
     * @param  string $id
     * @return Collection
     */
    public function getItem($id) {
        return $this->findOrFail($id);
    }

    /**
     * Store a region
     *
     * @param  array $attributes
     * @return Collection
     */
    public function createItem($attributes) {
        return $this->create($attributes);
    }

    /**
     * Update a region
     *
     * @param  string $id
     * @param  array  $attributes
     * @return Collection
     */
    public function updateItem($id, $attributes) {
        return tap($this->findOrFail($id))->update($attributes);
    }

    /**
     * Delete a region
     *
     * @param  string $id
     * @return Collection
     */
    public function destroyItem($id) {
        $region = $this->findOrFail($id); $this->destroy($id);
        return $region;
    }
}
