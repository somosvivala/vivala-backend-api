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




//Rotas para mostrar os emails:
Route::get('/exemplo-email-contato-geral', function () {
    return view('emails.contato-geral')->with('contato', App\Models\ContatoGeral::first());
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



Route::resource('inscricaoNewsletters', 'InscricaoNewsletterController');



Route::resource('experiencias', 'ExperienciaController');

Route::resource('blocoDescricaos', 'BlocoDescricaoController');

Route::resource('fotos', 'FotoController');





Route::resource('expedicaos', 'ExpedicaoController');



Route::resource('inscricaoExpedicaos', 'InscricaoExpedicaoController');


Route::resource('inscricaoExperiencias', 'InscricaoExperienciaController');



Route::resource('cotacaoHospedagems', 'CotacaoHospedagemController');





Route::resource('cotacaoPacotes', 'CotacaoPacoteController');