<?php

namespace Modules\Region\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;

class RegionGetItemRepository extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Obtain a region by identifier.
     *
     * @return void
     */
    public function testRegionGetItem()
    {
        # Population table of regions
        $this->seed(RegionDatabaseSeeder::class);

        # Request all regions and validate response structure
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("GET", "api/regions/7");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "created", "updated"
                ]
            ]);
    }
}
