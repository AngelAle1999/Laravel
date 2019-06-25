<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatilloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platillo', function (Blueprint $table) {
            $table->increments('Id_platillo');
            $table->string('name');
            $table->string('img_url');
            $table->string('status');
            $table->string('descripcion');
            $table->float('price');
            $table->integer('amount');
            $table->float('infant_price');
            $table->integer('type_id');
            $table->integer('condition_number_people_1');
            $table->float('price_number_people_1');
            $table->integer('condition_number_people_2');
            $table->float('price_number_people_2');
            $table->integer('condition_amount_1');
            $table->float('price_amount_1');
            $table->integer('condition_amount_2');
            $table->float('price_amount_2');
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
        Schema::dropIfExists('platillo');
    }
}
