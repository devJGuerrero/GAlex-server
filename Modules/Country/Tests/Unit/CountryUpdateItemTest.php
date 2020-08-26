<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class CountryUpdateItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Update country.
     *
     * @return void
     */
    public function testCountryUpdateItem()
    {
        # Population table of countries
        $this
            ->seed(RegionDatabaseSeeder::class)
            ->seed(CountryDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("PUT", "api/countries/1", [
                "name"      => "Albania",
                "region_id" => 7
            ]);
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "region", "created", "updated"
                ]
            ]);
    }

    /**
     * Unit test: Validate field name country.
     *
     * @return void
     */
    public function testCountryUpdateItemValidateFieldName() {
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("PUT", "api/countries/1");
        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
