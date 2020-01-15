<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->userName,
        //'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\GriffonTech\User\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->userName,
        //'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\GriffonTech\Tutor\Models\TutorProfile::class, function(Faker $faker){
    return [
        'title' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
        'description' => $faker->sentence(5)
    ];
});

$factory->define(\GriffonTech\Blog\Models\Blog::class, function(Faker $faker){
    $data = [
        'title' => $faker->sentence(2),
        'body' => $faker->sentence(40)
    ];
    $data['url_key'] = str_slug($data['title']);

    return $data;
});

$factory->define(\GriffonTech\Blog\Models\BlogComment::class, function(Faker $faker){
    $data = [
        'comment' => $faker->sentence(20)
    ];
    return $data;
});
