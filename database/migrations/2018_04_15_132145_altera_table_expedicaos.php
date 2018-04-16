<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteraTableExpedicaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expedicaos', function (Blueprint $table) {
            $table->string('descricao_listagem')->nullable()->change();
            $table->date('data_inicio')->nullable()->change();
            $table->date('data_fim')->nullable()->change();

            $table->string('link_destino')->nullable();
            $table->boolean('ativo_listagem')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expedicaos', function (Blueprint $table) {
            $table->string('descricao_listagem')->change();
            $table->date('data_inicio')->change();
            $table->date('data_fim')->change();

            $table->dropColumn('link_destino');
            $table->dropColumn('ativo_listagem');
            
        });
    }
}
