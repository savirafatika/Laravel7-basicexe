<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        // random 1 -3
        'category_id' => rand(1, 3),
        'title' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'body' => $faker->paragraph(10),
    ];
});
