<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //cree admnistrador
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
        // \App\Models\User::factory(10)->create();
        $this->truncate();

        $this->call([
            ParametersSeeder::class, // Parametros
            ParameterValuesSeeder::class, // Valores parametros
            // userSeed::class, //Usuarios
            categoriaSeed::class //categoriaSeed
        ]);
        User::factory(20)->create();
    }

    private function truncate()
    {
        // Nombre de tablas para eliminar antes de accionarse el seeder
        $tables = [
            'parameters',
            'parameter_values',
            'users',
        ];
        DB::statement('SET foreign_key_checks=0');
        foreach ($tables as $key) {
            DB::table($key)->truncate();
        }
        DB::statement('SET foreign_key_checks=1');
    }
}
