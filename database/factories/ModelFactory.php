<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Producto::class, static function (Faker\Generator $faker) {
    return [
        'descripcion' => $faker->sentence,
        'tipo' => $faker->sentence,
        'precio' => $faker->randomFloat,
        'cantidad' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory *//** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Locale::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Locale::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'direccion' => $faker->sentence,
        'ciudad' => $faker->sentence,
        'CP' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Lugare::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'direccion' => $faker->sentence,
        'ciudad' => $faker->sentence,
        'CP' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'apellido' => $faker->sentence,
        'telefono' => $faker->sentence,
        'direccion' => $faker->sentence,
        'email' => $faker->email,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
