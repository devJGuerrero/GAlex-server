<?php

namespace Modules\Country\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

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
        $this
            ->seed(RegionDatabaseSeeder::class)
            ->seed(CountryDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("DELETE", "api/countries/1");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "region", "created", "updated"
                ]
            ]);
    }
}
