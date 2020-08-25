<?php

namespace Modules\Region\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;

class RegionCreateItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Insert region.
     *
     * @return void
     */
    public function testRegionCreateItem()
    {
        # Population table of regions
        $this->seed(RegionDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("POST", "api/regions", [
                 "name" => "Continente"
            ]);
        $response
            ->assertCreated()
            ->assertJsonStructure([
                "data" => [
                    "id", "name", "created", "updated"
                ]
            ]);
    }

    /**
     * Unit test: Validate field name region.
     *
     * @return void
     */
    public function testRegionCreateItemValidateFieldName() {
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("POST", "api/regions");
        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
