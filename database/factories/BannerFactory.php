<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'titulo'     => $faker->catchPhrase,
        'url_site'   => $faker->url,
        'url_banner' => $faker->imageUrl($width = 468, $height = 60),
    ];
});
