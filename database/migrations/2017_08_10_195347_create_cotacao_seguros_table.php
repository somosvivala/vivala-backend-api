<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_seguros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origem');
            $table->string('destino');
            $table->date('data_ida');
            $table->date('data_volta');
            $table->boolean('esportes_radicais')->nullable();
            $table->string('solicitacoes')->nullable();
            $table->string('datas_nascimento_seguro_viagem')->nullable();
            $table->string('nome_completo');
            $table->string('nome_preferencia')->nullable();
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cotacao_seguros');
    }
}
