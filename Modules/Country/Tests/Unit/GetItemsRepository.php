<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class GetItemsRepository extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Get all countries.
     *
     * @return void
     */
    public function testCountryGetItems()
    {
        # Population table of countries
        $this->seed(CountryDatabaseSeeder::class);

        # Request all countries and validate response structure
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
        ->json("GET", "api/countries");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(50, "data")
            ->assertJsonStructure([
                "data" => [
                    ["id", "name", "created", "updated"]
                ]
            ]);
    }
}
