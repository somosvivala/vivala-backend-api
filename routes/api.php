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


Route::resource('cotacaoPacotes', 'CotacaoPacoteAPIController');
Route::resource('contatoAgentes', 'ContatoAgenteAPIController');
Route::resource('contatoCorporativos', 'ContatoCorporativoAPIController');
Route::resource('contatoGerals', 'ContatoGeralAPIController');
Route::resource('inscricaoNewsletters', 'InscricaoNewsletterAPIController');
Route::resource('expedicoes.inscricoes', 'InscricaoExpedicaoAPIController');
Route::resource('experiencias.inscricoes', 'InscricaoExperienciaAPIController');













