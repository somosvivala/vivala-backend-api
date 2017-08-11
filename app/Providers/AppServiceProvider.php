<?php

namespace App\Providers;

use App\Models\ContatoAgente;
use App\Models\ContatoCorporativo;
use App\Models\ContatoGeral;
use App\Models\CotacaoAereo;
use App\Models\CotacaoHospedagem;
use App\Models\CotacaoPacote;
use App\Models\CotacaoRodoviario;
use App\Models\InscricaoExpedicao;
use App\Models\InscricaoExperiencia;
use App\Observers\ContatoAgenteObserver;
use App\Observers\ContatoCorporativoObserver;
use App\Observers\ContatoGeralObserver;
use App\Observers\CotacaoAereoObserver;
use App\Observers\CotacaoHospedagemObserver;
use App\Observers\CotacaoPacoteObserver;
use App\Observers\CotacaoRodoviarioObserver;
use App\Observers\InscricaoExpedicaoObserver;
use App\Observers\InscricaoExperienciaObserver;
use Illuminate\Support\ServiceProvider;

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
        CotacaoRodoviario::observe(CotacaoRodoviarioObserver::class);
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
