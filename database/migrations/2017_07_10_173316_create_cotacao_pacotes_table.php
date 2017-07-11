<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotacaoPacotesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_pacotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origem');
            $table->string('destino');
            $table->dateTime('data_ida');
            $table->dateTime('data_volta');
            $table->boolean('datas_flexiveis');
            $table->integer('qnt_adultos');
            $table->integer('qnt_criancas');
            $table->integer('qnt_bebes');
            $table->string('periodo_voo_ida');
            $table->string('periodo_voo_volta');
            $table->string('aeroporto_origem');
            $table->string('aeroporto_retorno');
            $table->string('companias_aereas_preferenciais');
            $table->integer('numero_paradas');
            $table->string('tempo_voo');
            $table->float('aereo_preco_desejado');
            $table->string('hotel_ou_regiao');
            $table->integer('qnt_quartos');
            $table->string('tipo_quarto');
            $table->string('hospedagem_servicos');
            $table->string('hospedagem_tipo');
            $table->string('hospedagem_solicitacoes');
            $table->float('hospedagem_preco_desejado');
            $table->integer('transporte_interno');
            $table->integer('tipos_transfer');
            $table->string('categorias_carro');
            $table->string('itens_carro');
            $table->string('transporte_interno_solicitacoes');
            $table->float('transporte_interno_preco_desejado');
            $table->string('passeios_interesses');
            $table->string('passeios_outros');
            $table->float('passeios_preco_desejado');
            $table->string('nomes_seguro_viagem');
            $table->string('datas_nascimento_seguro_viagem');
            $table->string('contato_nome_completo');
            $table->string('contato_nome_preferencia');
            $table->string('contato_email');
            $table->string('contato_telefone');
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
        Schema::drop('cotacao_pacotes');
    }
}
