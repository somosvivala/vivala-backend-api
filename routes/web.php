<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

// Rotas de login / logout
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index');

//Newsletter
Route::resource('inscricaoNewsletters', 'InscricaoNewsletterController', ['middleware' => 'auth']);

//Blocos de descricao de experiencia / expedicao
Route::resource('blocoDescricaos', 'BlocoDescricaoController', ['middleware' => 'auth']);

//Fotos de experiencias / expedicoes / agentes
Route::resource('fotos', 'FotoController', ['middleware' => 'auth']);

//Experiencias e Expedicoes
Route::resource('experiencias', 'ExperienciaController', ['middleware' => 'auth']);
Route::resource('expedicaos', 'ExpedicaoController', ['middleware' => 'auth']);

//Datatables de Inscricoes de Experiencia/Expedicao pela Rota
Route::get('expedicaos/{id}/inscricoes', 'InscricaoExpedicaoController@getInscricoes')->middleware('auth');
Route::get('experiencias/{id}/inscricoes', 'InscricaoExperienciaController@getInscricoes')->middleware('auth');

//Inscricoes das Experiencias/Expedicoes
Route::resource('inscricaoExpedicaos', 'InscricaoExpedicaoController', ['middleware' => 'auth']);
Route::resource('inscricaoExperiencias', 'InscricaoExperienciaController', ['middleware' => 'auth']);

//Contatos
Route::resource('contatoAgentes', 'ContatoAgenteController', ['middleware' => 'auth']);
Route::resource('contatoCorporativo', 'ContatoCorporativoController', ['middleware' => 'auth']);
Route::resource('contatoGeral', 'ContatoGeralController', ['middleware' => 'auth']);

//Cotacoes
Route::resource('cotacaoHospedagems', 'CotacaoHospedagemController', ['middleware' => 'auth']);
Route::resource('cotacaoPacotes', 'CotacaoPacoteController', ['middleware' => 'auth']);
Route::resource('cotacaoAereos', 'CotacaoAereoController', ['middleware' => 'auth']);
Route::resource('cotacaoCarros', 'CotacaoCarroController', ['middleware' => 'auth']);
Route::resource('cotacaoRodoviarios', 'CotacaoRodoviarioController', ['middleware' => 'auth']);
Route::resource('cotacaoCruzeiros', 'CotacaoCruzeiroController', ['middleware' => 'auth']);
Route::resource('cotacaoPasseios', 'CotacaoPasseioController', ['middleware' => 'auth']);
Route::resource('cotacaoSeguros', 'CotacaoSeguroController', ['middleware' => 'auth']);

Route::resource('videos', 'VideoController', ['middleware' => 'auth']);
Route::resource('agentes', 'AgenteController', ['middleware' => 'auth']);

Route::get('agentes/{id}/foto', 'AgenteController@getFotoAgente')->middleware('auth');
Route::post('agentes/{id}/foto', 'AgenteController@postFotoAgente')->middleware('auth');

Route::get('expedicaos/{id}/foto-listagem', 'ExpedicaoController@getFotoListagem')->middleware('auth');
Route::post('expedicaos/{id}/foto-listagem', 'ExpedicaoController@postFotoListagem')->middleware('auth');
Route::post('expedicaos/{id}/ativa-listagem', 'ExpedicaoController@postAtivaListagem')->middleware('auth');
Route::post('expedicaos/{id}/remove-listagem', 'ExpedicaoController@postRemoveListagem')->middleware('auth');
Route::get('/volunturismo/foto-home', 'HomeController@index');
Route::get('/volunturismo/video', 'HomeController@index');

Route::get('experiencias/{id}/foto-listagem', 'ExperienciaController@getFotoListagem')->middleware('auth');
Route::post('experiencias/{id}/foto-listagem', 'ExperienciaController@postFotoListagem')->middleware('auth');
Route::post('experiencias/{id}/ativa-listagem', 'ExperienciaController@postAtivaListagem')->middleware('auth');
Route::post('experiencias/{id}/remove-listagem', 'ExperienciaController@postRemoveListagem')->middleware('auth');
Route::get('/ecoturismo/foto-home', 'HomeController@index');
Route::get('/ecoturismo/video', 'HomeController@index');

Route::resource('imersaos', 'ImersaoController');
Route::get('imersaos/{id}/foto-listagem', 'ImersaoController@getFotoListagem')->middleware('auth');
Route::post('imersaos/{id}/foto-listagem', 'ImersaoController@postFotoListagem')->middleware('auth');
Route::post('imersaos/{id}/ativa-listagem', 'ImersaoController@postAtivaListagem')->middleware('auth');
Route::post('imersaos/{id}/remove-listagem', 'ImersaoController@postRemoveListagem')->middleware('auth');
Route::get('/imersoes/foto-home', 'HomeController@index');
Route::get('/imersoes/video', 'HomeController@index');

/*
 * Removendo para V3

Route::get('expedicaos/{id}/create-descricoes', 'ExpedicaoController@getCreateDescricoes')->middleware('auth');
Route::get('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@getCreateMediasInterna')->middleware('auth');
Route::post('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@postCreateMediasInterna')->middleware('auth');

Route::get('experiencias/{id}/create-descricoes', 'ExperienciaController@getCreateDescricoes')->middleware('auth');
Route::get('experiencias/{id}/create-medias-interna', 'ExperienciaController@getCreateMediasInterna')->middleware('auth');
Route::post('experiencias/{id}/create-medias-interna', 'ExperienciaController@postCreateMediasInterna')->middleware('auth');

**/


