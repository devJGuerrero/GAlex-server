<?php

namespace Modules\Region\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\Region;

class RegionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table("regions")->insert([
            ["name" => "África",        "created_at" => now(), "updated_at" => now()],
            ["name" => "Antártida",     "created_at" => now(), "updated_at" => now()],
            ["name" => "Asia",          "created_at" => now(), "updated_at" => now()],
            ["name" => "Europa",        "created_at" => now(), "updated_at" => now()],
            ["name" => "Norte América", "created_at" => now(), "updated_at" => now()],
            ["name" => "Oceanía",       "created_at" => now(), "updated_at" => now()],
            ["name" => "Sur América",   "created_at" => now(), "updated_at" => now()]
        ]);
    }
}
