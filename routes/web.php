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
Route::resource('inscricaoNewsletters', 'InscricaoNewsletterController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit',
]]);

//Blocos de descricao de experiencia / expedicao
//Route::resource('blocoDescricaos', 'BlocoDescricaoController', ['middleware' => 'auth']);

//Fotos de experiencias / expedicoes / agentes
Route::resource('fotos', 'FotoController', ['middleware' => 'auth']);

//Experiencias e Expedicoes
Route::resource('experiencias', 'ExperienciaController', ['middleware' => 'auth']);
Route::resource('expedicaos', 'ExpedicaoController', ['middleware' => 'auth']);

//Datatables de Inscricoes de Experiencia/Expedicao pela Rota
//Route::get('expedicaos/{id}/inscricoes', 'InscricaoExpedicaoController@getInscricoes')->middleware('auth');
//Route::get('experiencias/{id}/inscricoes', 'InscricaoExperienciaController@getInscricoes')->middleware('auth');

//Inscricoes das Experiencias/Expedicoes
/** Desativado vivalá v3
Route::resource('inscricaoExpedicaos', 'InscricaoExpedicaoController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 'destroy',
]]);

Route::resource('inscricaoExperiencias', 'InscricaoExperienciaController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 'destroy',
]]);
**/

//Contatos
Route::resource('contatoAgentes', 'ContatoAgenteController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('contatoCorporativo', 'ContatoCorporativoController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('contatoGeral', 'ContatoGeralController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

//Cotacoes
Route::resource('cotacaoHospedagems', 'CotacaoHospedagemController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoPacotes', 'CotacaoPacoteController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoAereos', 'CotacaoAereoController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoCarros', 'CotacaoCarroController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoRodoviarios', 'CotacaoRodoviarioController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoCruzeiros', 'CotacaoCruzeiroController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoPasseios', 'CotacaoPasseioController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('cotacaoSeguros', 'CotacaoSeguroController', ['middleware' => 'auth', 'except' => [
    'create', 'store', 'update', 'edit', 
]]);

Route::resource('videos', 'VideoController', ['middleware' => 'auth']);
Route::resource('agentes', 'AgenteController', ['middleware' => 'auth']);

Route::get('agentes/{id}/foto', 'AgenteController@getFotoAgente')->middleware('auth');
Route::post('agentes/{id}/foto', 'AgenteController@postFotoAgente')->middleware('auth');

Route::get('expedicaos/{id}/foto-listagem', 'ExpedicaoController@getFotoListagem')->middleware('auth');
Route::post('expedicaos/{id}/foto-listagem', 'ExpedicaoController@postFotoListagem')->middleware('auth');
Route::post('expedicaos/{id}/ativa-listagem', 'ExpedicaoController@postAtivaListagem')->middleware('auth');
Route::post('expedicaos/{id}/remove-listagem', 'ExpedicaoController@postRemoveListagem')->middleware('auth');

Route::get('/volunturismo/foto-home', 'HomeController@getFotoVolunturismo');
Route::post('/volunturismo/foto-home', 'HomeController@postFotoVolunturismo');
Route::get('/volunturismo/video', 'VideosServicosController@getVideoVolunturismo');
Route::post('/volunturismo/video', 'VideosServicosController@postVideoVolunturismo')->name('video-volunturismo');

Route::get('experiencias/{id}/foto-listagem', 'ExperienciaController@getFotoListagem')->middleware('auth');
Route::post('experiencias/{id}/foto-listagem', 'ExperienciaController@postFotoListagem')->middleware('auth');
Route::post('experiencias/{id}/ativa-listagem', 'ExperienciaController@postAtivaListagem')->middleware('auth');
Route::post('experiencias/{id}/remove-listagem', 'ExperienciaController@postRemoveListagem')->middleware('auth');
Route::get('/ecoturismo/foto-home', 'HomeController@getFotoEcoturismo');
Route::post('/ecoturismo/foto-home', 'HomeController@postFotoEcoturismo');
Route::get('/ecoturismo/video', 'VideosServicosController@getVideoEcoturismo');
Route::post('/ecoturismo/video', 'VideosServicosController@postVideoEcoturismo')->name('video-ecoturismo');

Route::resource('imersaos', 'ImersaoController');
Route::get('imersaos/{id}/foto-listagem', 'ImersaoController@getFotoListagem')->middleware('auth');
Route::post('imersaos/{id}/foto-listagem', 'ImersaoController@postFotoListagem')->middleware('auth');
Route::post('imersaos/{id}/ativa-listagem', 'ImersaoController@postAtivaListagem')->middleware('auth');
Route::post('imersaos/{id}/remove-listagem', 'ImersaoController@postRemoveListagem')->middleware('auth');
Route::get('/imersoes/foto-home', 'HomeController@getFotoImersoes');
Route::post('/imersoes/foto-home', 'HomeController@postFotoImersoes');
Route::get('/imersoes/video', 'VideosServicosController@getVideoImersoes');
Route::post('/imersoes/video', 'VideosServicosController@postVideoImersoes')->name('video-imersoes');

//Foto da home do instituto
Route::get('/instituto/foto-home', 'HomeController@getFotoInstituto');
Route::post('/instituto/foto-home', 'HomeController@postFotoInstituto');

/*
 * Removendo para V3

Route::get('expedicaos/{id}/create-descricoes', 'ExpedicaoController@getCreateDescricoes')->middleware('auth');
Route::get('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@getCreateMediasInterna')->middleware('auth');
Route::post('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@postCreateMediasInterna')->middleware('auth');

Route::get('experiencias/{id}/create-descricoes', 'ExperienciaController@getCreateDescricoes')->middleware('auth');
Route::get('experiencias/{id}/create-medias-interna', 'ExperienciaController@getCreateMediasInterna')->middleware('auth');
Route::post('experiencias/{id}/create-medias-interna', 'ExperienciaController@postCreateMediasInterna')->middleware('auth');

**/
