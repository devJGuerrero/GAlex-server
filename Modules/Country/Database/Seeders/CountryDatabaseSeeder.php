<?php

namespace Modules\Country\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Country\Entities\Country;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\Region;

class CountryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Country::class, 50)->create();
    }
}
