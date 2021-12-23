<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idParameter');
            $table->string('name');
            $table->string('ref')->nullable();
            $table->tinyInteger('state')->default(1);
            $table->timestamps();
        });

        Schema::create('parameter_values', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idValueParameter');
            $table->unsignedBigInteger('idParameter');
            $table->string('name');
            $table->string('parameter_values')->nullable();
            $table->string('ref')->nullable();
            $table->string('extra')->nullable();
            $table->tinyInteger('state')->default(1);
            $table->timestamps();

            $table->foreign('idParameter')->references('idParameter')->on('parameters');

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
