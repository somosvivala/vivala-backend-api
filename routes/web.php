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

/**
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



//newsletter
Route::resource('inscricaoNewsletters', 'InscricaoNewsletterController');

//Blocos de descricao de experiencia / expedicao
Route::resource('blocoDescricaos', 'BlocoDescricaoController');

//Fotos de experiencias / expedicoes / agentes
Route::resource('fotos', 'FotoController');

//Experiencias e Expedicoes
Route::resource('experiencias', 'ExperienciaController');
Route::resource('expedicaos', 'ExpedicaoController');

//Inscricoes das Experiencias/Expedicoes
Route::resource('inscricaoExpedicaos', 'InscricaoExpedicaoController');
Route::resource('inscricaoExperiencias', 'InscricaoExperienciaController');

//Contatos
Route::resource('contatoAgentes', 'ContatoAgenteController');
Route::resource('contatoCorporativo', 'ContatoCorporativoController');
Route::resource('contatoGeral', 'ContatoGeralController');

//Cotacoes
Route::resource('cotacaoHospedagems', 'CotacaoHospedagemController');
Route::resource('cotacaoPacotes', 'CotacaoPacoteController');
Route::resource('cotacaoAereos', 'CotacaoAereoController');




Route::resource('experiencias', 'ExperienciasController');

Route::resource('experiencias', 'ExperienciaController');
