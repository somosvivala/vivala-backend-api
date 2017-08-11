<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_carros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cidade_retirada');
            $table->string('cidade_devolucao');
            $table->date('data_retirada');
            $table->date('data_devolucao');
            $table->string('hora_retirada');
            $table->string('hora_devolucao');
            $table->string('categorias_carro')->nullable();
            $table->string('itens_carro')->nullable();
            $table->string('solicitacoes_carro')->nullable();
            $table->float('preco_desejado_carro')->nullable();
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
        Schema::drop('cotacao_carros');
    }
}
