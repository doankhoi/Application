<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'photo' => str_random(10)."jpg",
        'number_login' => 2,
        'fails_login' => 1,
        'seen' => false,
        'last_login' => date('Y-m-d'),
        'register_token' => str_random(10),
    ];
});

$factory->define(App\Models\UserInfo::class, function (Faker\Generator $faker) {
	return [
		'username' => $faker->name(),
		'firstname' => $faker->firstName(),
		'lastname' => $faker->lastName(),
		'gender' => $faker->boolean(),
		'tel' => $faker->phoneNumber(),
		'city' => $faker->city(),
		'address' => $faker->address(),
		'online_status' => $faker->boolean(),
		'chat_status' => $faker->boolean()
	];
});

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
	return [
		'title' => str_random(20),
		'slug' => $faker->slug()
	];
});

