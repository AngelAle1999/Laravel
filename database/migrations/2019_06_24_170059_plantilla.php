<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Plantilla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('plantilla', function (Blueprint $table) {
            $table->increments('id_plantilla');
            $table->string('name');
            $table->string('type');
            $table->char('baja',1);
            $table->text('content');
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
