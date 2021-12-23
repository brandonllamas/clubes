<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('intent_pay', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('id_user');
            //si compro un recurso tendra este id
            $table->string('id_recurso')->nullable();
            //si alquilo un area
            $table->string('id_area')->nullable();
            //tipo 4 es que esta pagando la mensualidad
            $table->string('name');
            $table->longText('descripcion');
            $table->string('tipo');
            $table->string('id_operation_mc')->nullable();
            $table->longText('data_after')->nullable();
            $table->longText('data_before')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('state')->default(1);
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
