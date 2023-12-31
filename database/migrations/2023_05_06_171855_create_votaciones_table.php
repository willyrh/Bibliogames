<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Tabla de las votaciones
    public function up()
    {
        Schema::create('votaciones', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->text("descripcion");
            $table->json("participantes")->nullable();
            $table->string("nombreopcion1");
            $table->string("nombreopcion2");
            $table->integer("valoropcion1")->nullable();
            $table->integer("valoropcion2")->nullable();
            $table->boolean("activo");
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
        Schema::dropIfExists('votaciones');
    }
};
