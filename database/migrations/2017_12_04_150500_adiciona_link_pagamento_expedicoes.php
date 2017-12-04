<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaLinkPagamentoExpedicoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expedicoes', function (Blueprint $table) {
            $table->string('url_pagamento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expedicoes', function (Blueprint $table) {
            $table->dropColumn('url_pagamento');
        });
    }
}
