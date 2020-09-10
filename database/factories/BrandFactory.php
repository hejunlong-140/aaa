<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->name,
        'brand_url' => $faker->unique()->safeEmail,
        'brand_logo' => 'http://upload.2001.com/upload/zcwMDIPint9gtWsTYyozP9x2iToWqVGXQiJJhr8p.jpeg',
        'brand_desc' => now(),
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at'=>date('Y-m-d H:i:s',time()),
    ];      
});
