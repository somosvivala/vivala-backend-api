<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImersaosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imersaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('media_listagem_id')->nullable();
            $table->string('media_listagem_type')->nullable();
            $table->string('link_destino')->nullable();
            $table->boolean('ativo_listagem')->default(false);
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
        Schema::drop('imersaos');
    }
}
