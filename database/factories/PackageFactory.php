<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(\App\Package::class, function (Faker $faker) {
    return [
        'owner' => $faker->firstName,
        'package_name' => $faker->lastName,
        'owner_avatar_url' => 'https://avatars1.githubusercontent.com/u/' . $faker->numberBetween(10000, 500000),
        'description' => $faker->realText(50),
        'package_url' => 'https://github.com/' . Str::slug($faker->firstName) . '/' . Str::slug($faker->lastName),
    ];
});
