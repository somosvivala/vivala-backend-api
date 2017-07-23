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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//ContatoGeral
$factory->define(App\Models\ContatoGeral::class, function (Faker\Generator $faker) {
    $firstname = $faker->firstname;
    return [
        'nome_completo' => $firstname . " " . $faker->lastname,
        'nome_preferencia' => $firstname,
        'email' => $faker->email,
        'telefone' => $faker->cellphoneNumber,
        'mensagem' => $faker->text,
    ];
});


//ContatoAgente
$factory->define(App\Models\ContatoAgente::class, function (Faker\Generator $faker) {
    $firstname = $faker->firstname;
    return [
        'nome_completo' => $firstname . " " . $faker->lastname,
        'nome_preferencia' => $firstname,
        'email' => $faker->email,
        'telefone' => $faker->cellphoneNumber,
    ];
});

//ContatoCorporativo
$factory->define(App\Models\ContatoCorporativo::class, function (Faker\Generator $faker) {
    $firstname = $faker->firstname;
    return [
        'nome_empresa' => $faker->company . $faker->companySuffix,
        'numero_funcionarios' => $faker->numberBetween(2,100),
        'nome_contato' => $firstname . " " . $faker->lastname,
        'email' => $faker->email,
        'telefone' => $faker->cellphoneNumber,
        'mensagem' => $faker->text,
    ];
});

//InscricaoNewsletter
$factory->define(App\Models\InscricaoNewsletter::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
    ];
});

//Experiencia
$factory->define(App\Models\Experiencia::class, function (Faker\Generator $faker) {

    $data = $faker->dateTimeBetween('now', '+1 year');
    $dataInicio = new \Carbon\Carbon($data->format('Y-m-d'));
    $dataFim = $dataInicio->copy()->addDays($faker->randomDigit);

    return [
        'titulo' => ucwords($faker->word ." ". $faker->region ." #". $faker->randomDigit) ,
        'descricao_listagem' => $faker->paragraph(2),
        'data_inicio' => $dataInicio,
        'data_fim' => $dataFim
    ];
});

//BlocoDescricao
$factory->define(App\Models\BlocoDescricao::class, function (Faker\Generator $faker) {
    return [
        'titulo' => ucwords(implode(' ', $faker->words(3))),
        'texto' => $faker->paragraph(6),
    ];
});

//Expedicao
$factory->define(App\Models\Expedicao::class, function (Faker\Generator $faker) {

    $data = $faker->dateTimeBetween('now', '+1 year');
    $dataInicio = new \Carbon\Carbon($data->format('Y-m-d'));
    $dataFim = $dataInicio->copy()->addDays($faker->randomDigit);

    return [
        'titulo' => ucwords($faker->word ." ". $faker->region ." #". $faker->randomDigit) ,
        'descricao_listagem' => $faker->paragraph(2),
        'data_inicio' => $dataInicio,
        'data_fim' => $dataFim
    ];
});

//InscricaoExpedicao
$factory->define(App\Models\InscricaoExpedicao::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'telefone' => $faker->cellphoneNumber,
        'expedicao_id' => \App\Models\Expedicao::first()->id,
    ];
});

//InscricaoExperiencia
$factory->define(App\Models\InscricaoExperiencia::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'telefone' => $faker->cellphoneNumber,
        'experiencia_id' => \App\Models\Experiencia::first()->id,
    ];
});



