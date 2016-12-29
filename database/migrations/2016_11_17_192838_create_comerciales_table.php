<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComercialesTable extends Migration
{
    public function up()
    {
        Schema::create('comerciales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruta');
            $table->string('tipo');
            $table->string('duracion');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('comerciales');
    }
}
