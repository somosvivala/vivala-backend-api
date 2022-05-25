<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotacaoCruzeirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_cruzeiros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origem');
            $table->string('destino')->nullable();
            $table->date('data_ida');
            $table->date('data_volta')->nullable();
            $table->boolean('datas_flexiveis')->nullable();
            $table->integer('qnt_adultos')->nullable();
            $table->integer('qnt_criancas')->nullable();
            $table->integer('qnt_bebes')->nullable();
            $table->float('preco_desejado')->nullable();
            $table->string('companias_preferenciais')->nullable();
            $table->integer('max_dias')->nullable();
            $table->string('solicitacoes')->nullable();
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
        Schema::drop('cotacao_cruzeiros');
    }
}
