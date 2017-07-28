<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContatoAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_agentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('nome_preferencia')->nullable();
            $table->string('email');
            $table->string('telefone');
            $table->string('mensagem')->nullable();
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
        Schema::drop('contato_agentes');
    }
}
