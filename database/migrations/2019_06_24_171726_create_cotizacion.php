<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->increments('id_cotizacion');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('n_adultos');
            $table->integer('n_ninos');
            $table->integer('id_cliente');
            $table->char('disponibilidad_fecha',1);
            $table->char('a_domicilio',1);
            $table->string('comentarios');
            $table->string('status');
            $table->string('pdf_src');
            $table->integer('actualizadas');
            $table->integer('enviadas');
            $table->dateTime('fecha_envio');
            $table->integer('id_user');
            $table->char('iva',1);
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
