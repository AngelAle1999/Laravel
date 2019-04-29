<?php

use Illuminate\Database\Seeder;
use Laravel\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role->nombre = "Administrador";
        $role->save();

         $role = new Roles();
        $role->nombre = "Usuario";
        $role->save();
    }
}
