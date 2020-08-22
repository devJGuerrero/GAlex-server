<?php

namespace Modules\Country\Repository;

use Modules\Country\Entities\Country as Model;

class Country {
    /**
     * Get all countries
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all() {
        return Model::all();
    }
}
