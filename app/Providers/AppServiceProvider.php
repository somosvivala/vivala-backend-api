<?php

namespace App\Providers;

use App\Models\ContatoAgente;
use App\Models\ContatoCorporativo;
use App\Models\ContatoGeral;
use App\Models\InscricaoExpedicao;
use App\Observers\ContatoAgenteObserver;
use App\Observers\ContatoCorporativoObserver;
use App\Observers\ContatoGeralObserver;
use App\Observers\InscricaoExpedicaoObserver;
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
        ContatoGeral::observe(ContatoGeralObserver::class);
        ContatoAgente::observe(ContatoAgenteObserver::class);
        ContatoCorporativo::observe(ContatoCorporativoObserver::class);
        InscricaoExpedicao::observe(InscricaoExpedicaoObserver::class);
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
