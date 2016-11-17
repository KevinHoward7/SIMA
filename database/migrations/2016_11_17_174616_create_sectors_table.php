<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_sector');
            $table->timestamps();
            $table->integer('zona_id')->unisgned();
            $table->foreign('zona_id')->references('id')->on('sector');
        });
        DB::statement('ALTER TABLE sectors ADD coordenadas POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sectors');
    }
}
