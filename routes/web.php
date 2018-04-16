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

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
 * ROTAS PARA TESTE DAS BLADES DE EMAILS
 */
Route::get('/exemplo-email-contato-geral', function () {
    return view('emails.contato-geral')->with('contatoGeral', App\Models\ContatoGeral::first());
});
Route::get('/exemplo-email-contato-agentes', function () {
    return view('emails.contato-agente')->with('contatoAgente', App\Models\ContatoAgente::first());
});
Route::get('/exemplo-email-contato-corporativo', function () {
    return view('emails.contato-corporativo')->with('contatoCorporativo', App\Models\ContatoCorporativo::first());
});
Route::get('/exemplo-email-inscricao-expedicao', function () {
    return view('emails.inscricao-expedicao')->with('inscricao', App\Models\InscricaoExpedicao::latest()->first());
});
Route::get('/exemplo-email-cotacao-pacote', function () {
    return view('emails.cotacao-pacote')->with('cotacao', App\Models\CotacaoPacote::latest()->first());
});
Route::get('/exemplo-email-cotacao-hospedagem', function () {
    return view('emails.cotacao-hospedagem')->with('cotacao', App\Models\CotacaoHospedagem::latest()->first());
});
Route::get('/exemplo-email-cotacao-aereo', function () {
    return view('emails.cotacao-aereo')->with('cotacao', App\Models\CotacaoAereo::latest()->first());
});
Route::get('/exemplo-email-cotacao-rodoviario', function () {
    return view('emails.cotacao-rodoviario')->with('cotacao', App\Models\CotacaoRodoviario::latest()->first());
});
Route::get('/exemplo-email-cotacao-cruzeiro', function () {
    return view('emails.cotacao-cruzeiro')->with('cotacao', App\Models\CotacaoCruzeiro::latest()->first());
});
Route::get('/exemplo-email-cotacao-carro', function () {
    return view('emails.cotacao-carro')->with('cotacao', App\Models\CotacaoCarro::latest()->first());
});
Route::get('/exemplo-email-cotacao-passeio', function () {
    return view('emails.cotacao-passeio')->with('cotacao', App\Models\CotacaoPasseio::latest()->first());
});
Route::get('/exemplo-email-cotacao-seguro', function () {
    return view('emails.cotacao-seguro')->with('cotacao', App\Models\CotacaoSeguro::latest()->first());
});

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

Route::get('expedicaos/{id}/create-descricoes', 'ExpedicaoController@getCreateDescricoes')->middleware('auth');
Route::get('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@getCreateMediasInterna')->middleware('auth');
Route::post('expedicaos/{id}/create-medias-interna', 'ExpedicaoController@postCreateMediasInterna')->middleware('auth');

Route::get('experiencias/{id}/foto-listagem', 'ExperienciaController@getFotoListagem')->middleware('auth');
Route::post('experiencias/{id}/foto-listagem', 'ExperienciaController@postFotoListagem')->middleware('auth');

Route::get('experiencias/{id}/create-descricoes', 'ExperienciaController@getCreateDescricoes')->middleware('auth');
Route::get('experiencias/{id}/create-medias-interna', 'ExperienciaController@getCreateMediasInterna')->middleware('auth');
Route::post('experiencias/{id}/create-medias-interna', 'ExperienciaController@postCreateMediasInterna')->middleware('auth');
