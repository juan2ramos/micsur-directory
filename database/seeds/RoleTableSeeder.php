<?php

use Illuminate\Database\Seeder;
use Directory\Entities\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Administrador']);
        Role::create(['name'=>'Cliente']);
    }
}
