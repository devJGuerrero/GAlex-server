<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Modules\Region\Entities\Region;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Region::class, function (Faker $faker) {
    return [
        "name" => substr($faker->name, 1, 25),
    ];
});
