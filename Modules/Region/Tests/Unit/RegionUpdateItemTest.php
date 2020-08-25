<?php

namespace Modules\Region\Tests\Unit;

use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;

class RegionUpdateItemTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Unit test: Update region.
     *
     * @return void
     */
    public function testRegionUpdateItem()
    {
        # Population table of regions
        $this->seed(RegionDatabaseSeeder::class);

        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("PUT", "api/regions/1", [
                "name" => "Otro Continente"
            ]);
        $response
            ->assertStatus(Response::HTTP_OK)
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
    public function testRegionUpdateItemValidateFieldName() {
        $response = $this->withHeaders([
            "Accept" => "application/json"
        ])
            ->json("PUT", "api/regions/1");
        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
