<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class GetItemRepository extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
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
                    "name", "created", "updated"
                ]
            ]);
    }
}
