<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_servicos', function (Blueprint $table) {
            $table->increments('id');

            //colunas
            $table->integer('video_volunturismo_id')->nullable();
            $table->integer('video_ecoturismo_id')->nullable();
            $table->integer('video_imersoes_id')->nullable();

            //fk's
            $table->foreign('video_volunturismo_id')->references('id')->on('videos');
            $table->foreign('video_ecoturismo_id')->references('id')->on('videos');
            $table->foreign('video_imersoes_id')->references('id')->on('videos');

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
        Schema::dropIfExists('videos_servicos');
    }
}
