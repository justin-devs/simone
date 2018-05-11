<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'genre_id' => '1',
        'body' => $faker->paragraphs(rand(2, 10), true),
        'cover_image' => 'placeholder.png'
    ];
});
