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

/*
 * Cotações -- Rotas das resources relacionadas as cotacoes
 */
Route::resource('cotacoes/pacote', 'CotacaoPacoteAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);
Route::resource('cotacoes/hospedagem', 'CotacaoHospedagemAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);
Route::resource('cotacoes/aereo', 'CotacaoAereoAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);

/*
 * Contatos -- Rotas das resources relacionadas aos contatos
 */
Route::resource('contatos/agente', 'ContatoAgenteAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);
Route::resource('contatos/corporativo', 'ContatoCorporativoAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);
Route::resource('contatos/geral', 'ContatoGeralAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);

/*
 * Newsletter -- Rotas da newsletter
 */
Route::resource('newsletter', 'InscricaoNewsletterAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);

/*
 * Expedições -- Rotas das expedicoes (inscricoes)
 */
Route::resource('expedicoes.inscricoes', 'InscricaoExpedicaoAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);

/*
 * Experiências -- Rotas das experiencias (inscricoes)
 */
Route::resource('experiencias.inscricoes', 'InscricaoExperienciaAPIController', [
    'except' => ['update', 'destroy', 'edit', 'create', 'show'],
]);
