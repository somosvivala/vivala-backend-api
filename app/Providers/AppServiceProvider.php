<?php

namespace App\Providers;

use App\Models\ContatoGeral;
use App\Models\CotacaoAereo;
use App\Models\ContatoAgente;
use App\Models\CotacaoPacote;
use App\Models\CotacaoHospedagem;
use App\Models\ContatoCorporativo;
use App\Models\InscricaoExpedicao;
use App\Models\InscricaoExperiencia;
use App\Observers\ContatoGeralObserver;
use App\Observers\CotacaoAereoObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\ContatoAgenteObserver;
use App\Observers\CotacaoPacoteObserver;
use App\Observers\CotacaoHospedagemObserver;
use App\Observers\ContatoCorporativoObserver;
use App\Observers\InscricaoExpedicaoObserver;
use App\Observers\InscricaoExperienciaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Disparando emails das tentativas de Contato
        ContatoGeral::observe(ContatoGeralObserver::class);
        ContatoAgente::observe(ContatoAgenteObserver::class);
        ContatoCorporativo::observe(ContatoCorporativoObserver::class);

        //Disparando emails de Inscricoes de Exps
        InscricaoExpedicao::observe(InscricaoExpedicaoObserver::class);
        InscricaoExperiencia::observe(InscricaoExperienciaObserver::class);

        //Disparando emails de Pedidos de Cotacao
        CotacaoPacote::observe(CotacaoPacoteObserver::class);
        CotacaoHospedagem::observe(CotacaoHospedagemObserver::class);
        CotacaoAereo::observe(CotacaoAereoObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('pt_BR');
        });

        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }
}
