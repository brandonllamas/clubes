<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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

    }
}
