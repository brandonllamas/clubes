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
        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->string('name_servicio');
            $table->longText('descripcion');
            $table->integer('id_horario')->nullable();
            $table->string('aforo')->nullable();
            $table->string('price');//precio del area
            $table->string('foto_logo')->nullable();
            $table->string('foto_back')->nullable();
            $table->integer('state')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('area', function (Blueprint $table) {
            $table->id();
            $table->string('area_name');
            $table->longText('descripcion');
            $table->integer('id_horario')->nullable();
            $table->string('aforo')->nullable();
            $table->string('price');//precio del area
            $table->string('foto_logo')->nullable();
            $table->string('foto_back')->nullable();
            //1 es abierto 2 cerrado
            $table->integer('cerrado')->default(1);
            $table->integer('state')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        //
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->string('recurso_name');
            $table->longText('descripcion');
            $table->integer('id_area')->nullable();
            //si es por compra unica o por alquiler
            $table->integer('tipo_pago');
            $table->string('price');
            $table->string('foto_logo')->nullable();
            $table->string('foto_back')->nullable();
            $table->integer('state')->default(1);
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
    }
}
