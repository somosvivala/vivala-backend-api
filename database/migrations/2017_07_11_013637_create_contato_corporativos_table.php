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
            $table->string('nome_contato');
            $table->string('email');
            $table->string('telefone');
            $table->string('nome_empresa');
            $table->integer('numero_funcionarios');
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
