<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'content' => $faker->text(500),
        'create_by' => User::all()->random()->id,
        'image' => '/images//62e889f4ace1b-%E1%BA%A3nh1.jpg',
        'created_at' => $faker->dateTimeBetween('-10 year', 'now'),
    ];
});
