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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(DuoSytem\Model\StatusAtividade::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'descricao'     => $faker->word,
        'situacao'      => 1,
    ];
});


$factory->define(DuoSytem\Model\Atividade::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome'          => $faker->name,
        'descricao'     => $faker->text(600),
        'dt_inicio'     => $faker->date(),
        'dt_fim'        => $faker->date(),
        'status_id'     => $faker->numberBetween(1,4),
        'situacao'      => 1,
    ];
});
