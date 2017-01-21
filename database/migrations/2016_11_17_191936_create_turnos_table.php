<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('tikets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sucursal')->length(255);
            $table->integer('turno')->length(255);
            $table->integer('fk_caja')->length(11);
            $table->integer('estado')->length(11);
            $table->string('tiempo',255);
            $table->string('asunto',255);
            $table->string('subasunto',255);
            $table->rememberToken();
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
        Schema::drop('tikets');
    }
}
