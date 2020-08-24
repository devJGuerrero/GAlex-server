<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class CountryGetItemRepository extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Obtain a country by identifier.
     *
     * @return void
     */
    public function testCountryGetItem()
    {
        # Population table of countries
        $this->seed(CountryDatabaseSeeder::class);

        # Request all countries and validate response structure
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("GET", "api/countries/50");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "created", "updated"
                ]
            ]);
    }
}
