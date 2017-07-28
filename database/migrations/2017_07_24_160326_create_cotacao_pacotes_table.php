<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('aeroporto_destino')->nullable();
            $table->string('companias_aereas_preferenciais')->nullable();
            $table->integer('numero_paradas')->nullable();
            $table->string('tempo_voo')->nullable();
            $table->float('aereo_preco_desejado')->nullable();
            $table->string('hotel_ou_regiao')->nullable();
            $table->integer('qnt_quartos')->nullable();
            $table->string('tipo_quarto')->nullable();
            $table->string('hospedagem_servicos')->nullable();
            $table->string('hospedagem_tipo')->nullable();
            $table->string('hospedagem_solicitacoes')->nullable();
            $table->float('hospedagem_preco_desejado')->nullable();
            $table->integer('transporte_interno')->nullable();
            $table->string('tipos_transfer')->nullable();
            $table->string('categorias_carro')->nullable();
            $table->string('itens_carro')->nullable();
            $table->string('transporte_interno_solicitacoes')->nullable();
            $table->float('transporte_interno_preco_desejado')->nullable();
            $table->string('passeios_interesses')->nullable();
            $table->string('passeios_outros')->nullable();
            $table->float('passeios_preco_desejado')->nullable();
            $table->string('nomes_seguro_viagem')->nullable();
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
        Schema::drop('cotacao_pacotes');
    }
}
