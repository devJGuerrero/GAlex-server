<?php

namespace Modules\Region\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;

class RegionDestroyItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Destroy region.
     *
     * @return void
     */
    public function testRegionDestroyItem()
    {
        # Population table of regions
        $this->seed(RegionDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("DELETE", "api/regions/1");
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "created", "updated"
                ]
            ]);
    }
}
