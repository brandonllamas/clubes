<?php

namespace Database\Seeders;

use App\Models\categorias;
use Illuminate\Database\Seeder;

class categoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new categorias();
        $categoria->categoria_name = "Comida";
        $categoria->descripcion = "";
        $categoria->save();

        $categoria = new categorias();
        $categoria->categoria_name = "Deporte";
        $categoria->descripcion = "";
        $categoria->save();

        $categoria = new categorias();
        $categoria->categoria_name = "Comida";
        $categoria->descripcion = "";
        $categoria->save();

        $categoria = new categorias();
        $categoria->categoria_name = "Recreacion";
        $categoria->descripcion = "";
        $categoria->save();

        $categoria = new categorias();
        $categoria->categoria_name = "Areas";
        $categoria->descripcion = "";
        $categoria->save();
    }
}
