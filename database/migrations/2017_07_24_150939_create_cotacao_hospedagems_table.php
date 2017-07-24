<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotacaoHospedagemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_hospedagems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_ou_regiao');
            $table->dateTime('data_ida');
            $table->dateTime('data_volta')->nullable();
            $table->integer('qnt_adultos');
            $table->integer('qnt_criancas')->nullable();
            $table->integer('qnt_bebes')->nullable();
            $table->string('tipo_quarto')->nullable();
            $table->integer('qnt_quartos')->nullable();
            $table->string('hospedagem_servicos')->nullable();
            $table->string('hospedagem_tipo')->nullable();
            $table->string('hospedagem_solicitacoes')->nullable();
            $table->float('hospedagem_preco_desejado')->nullable();
            $table->string('nome_completo');
            $table->string('nome_preferencia')->nullable();
            $table->string('email');
            $table->string('telefone');
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
        Schema::drop('cotacao_hospedagems');
    }
}
