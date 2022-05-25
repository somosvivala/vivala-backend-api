<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContatoGeralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato_gerals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_completo');
            $table->string('nome_preferencia')->nullable();
            $table->string('email');
            $table->string('telefone')->nullable();
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
        Schema::drop('contato_gerals');
    }
}
