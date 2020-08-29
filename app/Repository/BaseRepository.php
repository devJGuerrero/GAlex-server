<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository
{
    /**
     * Get instance of model
     *
     * @return Model
     */
    abstract function getModel(): Model;

    /**
     * Get all records
     *
     * @return Collection
     */
    public function all(): Collection { return $this->getModel()->all(); }

    /**
     * Get record by its identifier
     *
     * @param string $id
     * @return Model
     */
    public function findOrFail(string $id): Model { return $this->getModel()->findOrFail($id); }

    /**
     * Store a record
     *
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model { return $this->getModel()->create($attributes); }

    /**
     * Update a record
     *
     * @param string $id
     * @param array $attributes
     * @return Model
     */
    public function update(string $id, array $attributes): Model { return tap($this->getModel()->findOrFail($id))->update($attributes); }

    /**
     * Delete a record
     *
     * @param string $id
     * @return Model
     */
    public function delete(string $id): Model { $region = $this->getModel()->findOrFail($id); $this->getModel()->destroy($id); return $region; }
}
