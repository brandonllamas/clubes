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
        $user = new User();
        $user->name = "Admin ";
        $user->lastname = "Global";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('123');
        $user->profile = 1;
        $user->state = 1;
        $user->save();
        // $user->assignRole('Admin_Global');

        //crear Usuario de prueba
        $user = new User();
        $user->name = "Brandon ";
        $user->lastname = "Llamas Larios";
        $user->email = "brandonllamaslarios@gmail.com";
        $user->password = Hash::make('123');
        $user->profile = 2;
        $user->state = 1;
        $user->save();

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
