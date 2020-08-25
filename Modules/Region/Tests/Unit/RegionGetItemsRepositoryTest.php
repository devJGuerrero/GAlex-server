<?php

namespace Modules\Region\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;

class RegionGetItemsRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Get all regions.
     *
     * @return void
     */
    public function testRegionGetItems()
    {
        # Population table of regions
        $this->seed(RegionDatabaseSeeder::class);

        # Request all regions and validate response structure
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
        ->json("GET", "api/regions");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(7, "data")
            ->assertJsonStructure([
                "data" => [
                    ["id", "name", "created", "updated"]
                ]
            ]);
    }
}
