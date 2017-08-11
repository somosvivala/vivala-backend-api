<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoPasseiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_passeios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destino');
            $table->date('data_ida');
            $table->date('data_volta')->nullable();
            $table->integer('qnt_adultos')->nullable();
            $table->integer('qnt_criancas')->nullable();
            $table->integer('qnt_bebes')->nullable();
            $table->string('passeios_interesses')->nullable();
            $table->string('solicitacoes')->nullable();
            $table->float('preco_desejado')->nullable();
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
        Schema::drop('cotacao_passeios');
    }
}
