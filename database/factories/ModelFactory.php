<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    $factory->define(App\Menu::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    $menus = App\Menu::all();
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'parent' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'order' => 0
    ];
});
}