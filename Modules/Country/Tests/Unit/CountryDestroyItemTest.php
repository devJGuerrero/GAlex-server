<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CountryDestroyItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Destroy country.
     *
     * @return void
     */
    public function testCountryDestroyItem()
    {
        # Population table of countries
        $this->seed(CountryDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("DELETE", "api/countries/1");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "created", "updated"
                ]
            ]);
    }
}
