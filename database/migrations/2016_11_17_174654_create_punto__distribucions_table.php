<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntoDistribucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punto_distribucion', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE punto_distribucion ADD coordenadas POINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('punto_distribucion');
    }
}
