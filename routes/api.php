<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('cotacoes/pacotes', 'CotacaoPacoteAPIController');

Route::resource('contatos/agente', 'ContatoAgenteAPIController');
Route::resource('contatos/corporativo', 'ContatoCorporativoAPIController');
Route::resource('contatos/geral', 'ContatoGeralAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show']
]);

Route::resource('newsletter', 'InscricaoNewsletterAPIController');

Route::resource('expedicoes.inscricoes', 'InscricaoExpedicaoAPIController');
Route::resource('experiencias.inscricoes', 'InscricaoExperienciaAPIController');

