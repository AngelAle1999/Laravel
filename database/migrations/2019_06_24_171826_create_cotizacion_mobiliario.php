<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionMobiliario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_mobiliario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cotizacion');
            $table->integer('id_mobiliario');
            $table->integer('cantidad');
            $table->float('price');
            $table->float('total');
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
        //
    }
}
