<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionMobiliarioTable extends Migration
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
            $table->integer('id_cotizacion')->unsigned();
            $table->integer('id_mobiliario')->unsigned();
            $table->integer('cantidad');
            $table->float('price');
            $table->float('total');
            $table->timestamps();


            $table->foreign('id_mobiliario')->references('id_mobiliario')->on('mobiliario')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizacion')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_mobiliario');
    }
}
