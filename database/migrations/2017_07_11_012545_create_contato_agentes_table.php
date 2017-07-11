<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('nome_preferencia');
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
        Schema::drop('contato_agentes');
    }
}
