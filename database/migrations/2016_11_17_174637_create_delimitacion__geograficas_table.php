<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelimitacionGeograficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delimitacion_geografica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->timestamps();
            $table->integer('tipo_delimitacion_id');
            $table->foreign('tipo_delimitacion_id')->references('id')->on('tipo_delimitacion');
        });
        DB::statement('ALTER TABLE delimitacion_geografica ADD coordenadas POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('delimitacion_geografica');
    }
}
