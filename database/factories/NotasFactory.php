<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Notas;
use Faker\Generator as Faker;

$factory->define(Notas::class, function (Faker $faker) {
    return [
        'titulo'     => $faker->catchPhrase,
        'intro'      => $faker->text($maxNbChars = 200),
        'texto'      => $faker->text($maxNbChars = 500),
        'user_id'    => $faker->numberBetween(1, 3),
        'publicado'  => $faker->numberBetween(0, 1),
    ];
});
