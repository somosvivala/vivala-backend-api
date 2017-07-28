<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoAereosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_aereos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origem')->nullable();
            $table->string('destino')->nullable();
            $table->dateTime('data_ida');
            $table->dateTime('data_volta')->nullable();
            $table->boolean('datas_flexiveis')->nullable();
            $table->integer('qnt_adultos')->nullable();
            $table->integer('qnt_criancas')->nullable();
            $table->integer('qnt_bebes')->nullable();
            $table->string('periodo_voo_ida')->nullable();
            $table->string('periodo_voo_volta')->nullable();
            $table->string('aeroporto_origem')->nullable();
            $table->string('aeroporto_retorno')->nullable();
            $table->string('companias_aereas_preferenciais')->nullable();
            $table->integer('numero_paradas')->nullable();
            $table->string('tempo_voo')->nullable();
            $table->float('aereo_preco_desejado')->nullable();
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
        Schema::drop('cotacao_aereos');
    }
}
