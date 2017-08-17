<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteraFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fotos', function (Blueprint $table) {
            $table->integer('ordem')->nullable();
            $table->string('cloudinary_id')->nullable();
            $table->string('image_name')->nullable()->change();
            $table->string('image_path')->nullable()->change();
            $table->string('image_extension')->nullable()->change();
            $table->integer('owner_id')->nullable()->change();
            $table->string('owner_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( Schema::hasColumn('fotos', 'ordem') ) {
            Schema::table('fotos', function (Blueprint $table) {
                $table->dropColumn('ordem')->nullable();
            });
        }

        if ( Schema::hasColumn('fotos', 'cloudinary_id') ) {
            Schema::table('fotos', function (Blueprint $table) {
                $table->dropColumn('cloudinary_id')->nullable();
            });
        }
        
        Schema::table('fotos', function (Blueprint $table) {
            $table->string('image_name')->change();
            $table->string('image_path')->change();
            $table->string('image_extension')->change();
            $table->integer('owner_id')->change();
            $table->string('owner_type')->change();
        });
    }
}
