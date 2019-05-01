<?php

use Illuminate\Database\Seeder;
use Laravel\Roles;
use Laravel\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$rol_usuario = Role::where('nombre','Usuario')->first();
    	$rol_admin = Role::where('nombre','Administrador')->first();

        $user = new User();
        $user->name = "User";
        $user->email = "user@hotmail.com";
        $user->password = bcrypt("query");
        $user->save();
        $user->roles()->attach($rol_usuario);

       $user = new User();
        $user->name = "Admin";
        $user->email = "Admin@hotmail.com";
        $user->password = bcrypt("query");
        $user->save();
        $user->roles()->attach($rol_admin);
    }
}
