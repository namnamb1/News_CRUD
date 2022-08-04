<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\CategoryPost;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(CategoryPost::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->unique()->random()->id,
        'post_id' => Post::all()->unique()->random()->id,
    ];
});
