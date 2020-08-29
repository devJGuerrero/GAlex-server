<?php

namespace Modules\Region\Repositories;

use App\Repository\BaseRepository;
use Modules\Region\Entities\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class RegionRepository extends BaseRepository {
    /**
     * Get instance of model.
     *
     * @return Model
     */
    function getModel(): Model { return new Region(); }

    /**
     * Get region by its identifier.
     *
     * @param string $id
     * @return Region
     */
    public function findOrFail(string $id): Model { return parent::findOrFail($id); }

    /**
     * Get all regions.
     *
     * @return Collection|Region[]
     */
    public function all(): Collection { return parent::all(); }

    /**
     * Store a region.
     *
     * @param array $attributes
     * @return Region
     */
    public function create(array $attributes): Model { return parent::create($attributes); }

    /**
     * Update a region.
     *
     * @param string $id
     * @param array $attributes
     * @return Region
     */
    public function update(string $id, array $attributes): Model
    {
        return tap(parent::findOrFail($id))->update($attributes);
    }

    /**
     * Delete a region.
     *
     * @param string $id
     * @return Region
     */
    public function delete(string $id): Model
    {
        $region = parent::findOrFail($id); parent::delete($id);
        return $region;
    }
}
