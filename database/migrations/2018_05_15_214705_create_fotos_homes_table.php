<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_homes', function (Blueprint $table) {
            $table->increments('id');

            //colunas
            $table->integer('foto_volunturismo_id')->nullable();
            $table->integer('foto_ecoturismo_id')->nullable();
            $table->integer('foto_imersoes_id')->nullable();
            $table->integer('foto_instituto_id')->nullable();

            //fk's
            $table->foreign('foto_volunturismo_id')->references('id')->on('fotos');
            $table->foreign('foto_ecoturismo_id')->references('id')->on('fotos');
            $table->foreign('foto_imersoes_id')->references('id')->on('fotos');
            $table->foreign('foto_instituto_id')->references('id')->on('fotos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_homes');
    }
}
