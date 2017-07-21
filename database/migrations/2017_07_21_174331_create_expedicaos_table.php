<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpedicaosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedicaos', function (Blueprint $table) {
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
        Schema::drop('expedicaos');
    }
}
