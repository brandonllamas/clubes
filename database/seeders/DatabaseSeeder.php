<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->truncate();

        $this->call([
            ParametersSeeder::class, // Parametros
            ParameterValuesSeeder::class, // Valores parametros
            userSeed::class, //Usuarios
            categoriaSeed::class //categoriaSeed
        ]);
        User::factory(20)->create();

    }

    private function truncate(){
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
