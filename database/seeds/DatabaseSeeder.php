<?php

use Illuminate\Database\Seeder;
use Modules\Region\Database\Seeders\RegionDatabaseSeeder;
use Modules\Country\Database\Seeders\CountryDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application"s database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
        UserSeeder::class,
        RegionDatabaseSeeder::class,
        CountryDatabaseSeeder::class,
    ]);
  }
}
