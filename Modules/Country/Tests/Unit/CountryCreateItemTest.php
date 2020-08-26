<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class CountryCreateItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Insert country.
     *
     * @return void
     */
    public function testCountryCreateItem()
    {
        # Population table of countries
        $this
            ->seed(RegionDatabaseSeeder::class)
            ->seed(CountryDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("POST", "api/countries", [
                 "name"     => "Albania",
                "region_id" => 7
            ]);
        $response
            ->assertCreated()
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
    public function testCountryCreateItemValidateFieldName() {
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("POST", "api/countries");
        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
