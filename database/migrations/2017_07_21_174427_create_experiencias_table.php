<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao_listagem');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->integer('media_listagem_id')->nullable();
            $table->string('media_listagem_type')->nullable();
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
        Schema::drop('experiencias');
    }
}
