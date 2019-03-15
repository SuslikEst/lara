<?php

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
	$title = $faker->sentence(rand(3, 8), true);
	$txt = $faker->realTExt(rand(1000, 4000));
	$isPublished = rand(1, 5) > 1;

	$data = [
		'category_id' => rand(1, 11),
		'user_id' => (rand(1, 11) == 5) ? 1 : 2,
		'title' => $title,
		'slug' => str_slug($title),
		'preview' => $faker->text(rand(40, 100)),
		'content_raw' => $txt,
		'content_html' => $txt,
		'is_published' => $isPublished,
		'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
	];

    return $data;
});