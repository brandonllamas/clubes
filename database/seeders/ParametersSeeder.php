<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Seeder;

class ParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $parameter = new Parameter();
        $parameter->name = "Tipo Usuarios";
        $parameter->save();


        $parameter = new Parameter();
        $parameter->name = "Monedas";
        $parameter->save();

        $parameter = new Parameter();
        $parameter->name = "Ajustes";
        $parameter->save();

        $parameter = new Parameter();
        $parameter->name = "Tipo venta";
        $parameter->save();
    }
}
