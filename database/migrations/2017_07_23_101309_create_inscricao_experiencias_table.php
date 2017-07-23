<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscricaoExperienciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao_experiencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->integer('cod_status')->nullable();
            $table->string('nome_status')->nullable();
            $table->integer('experiencia_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('experiencia_id')->references('id')->on('experiencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscricao_experiencias');
    }
}
