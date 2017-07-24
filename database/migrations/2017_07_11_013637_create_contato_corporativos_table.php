<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContatoCorporativosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_corporativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->string('nome_empresa')->nullable();
            $table->string('mensagem')->nullable();
            $table->integer('numero_funcionarios')->nullable();
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
        Schema::drop('contato_corporativos');
    }
}
