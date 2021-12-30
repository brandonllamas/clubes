<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('producto_name');
            $table->longText('descripcion');
            // $table->integer('id_horario')->nullable();
            $table->string('aforo')->nullable();
            //si es por compra unica o por alquiler
            $table->integer('tipo_pago')->nullable();;
            $table->integer('id_categoria')->nullable();
            $table->string('price'); //precio del area
            $table->string('foto_logo')->nullable();
            $table->string('foto_back')->nullable();
            //1 es abierto 2 cerrado
            $table->integer('cerrado')->default(1);
            $table->integer('state')->default(1);
            $table->timestamps();
        });
        //

        Schema::create('categorias_productos', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_name');
            $table->longText('descripcion');
            $table->integer('state')->default(1);
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
