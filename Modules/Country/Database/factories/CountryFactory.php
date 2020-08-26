<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Modules\Country\Entities\Country;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Country::class, function (Faker $faker) {
    return [
        "name"      => $faker->country,
        "region_id" => rand(1, 7)
    ];
});
