<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BlogRoll;
use Faker\Generator as Faker;

$factory->define(BlogRoll::class, function (Faker $faker) {
    return [
        'titulo'     => $faker->catchPhrase,
        'url_site'   => $faker->url,
    ];
});
