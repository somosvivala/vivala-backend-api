<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotacaoRodoviariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotacao_rodoviarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origem');
            $table->string('destino');
            $table->date('data_ida');
            $table->date('data_volta')->nullable();
            $table->boolean('sem_volta')->nullable();
            $table->boolean('datas_flexiveis')->nullable();
            $table->integer('qnt_passageiros')->nullable();
            $table->string('hora_ida')->nullable();
            $table->string('hora_volta')->nullable();
            $table->string('companias_preferenciais')->nullable();
            $table->string('duracao_maxima')->nullable();
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
        Schema::drop('cotacao_rodoviarios');
    }
}
