<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlocoDescricaosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloco_descricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('texto');
            $table->integer('owner_id');
            $table->string('owner_type');
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
        Schema::drop('bloco_descricaos');
    }
}
