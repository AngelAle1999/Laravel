<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mobiliario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('mobiliario', function (Blueprint $table) {
            $table->increments('id_mobiliario');
            $table->string('name');
            $table->string('presentation');
            $table->string('description');
            $table->integer('stock');
            $table->string('img_src');
            $table->float('price');
            $table->char('baja',1);
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
