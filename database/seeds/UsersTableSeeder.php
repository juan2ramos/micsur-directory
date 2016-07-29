<?php

use Directory\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'Juan',
            'last-name'=> 'Ramos',
            'identification-number'=> '80921505',
            'email'=>'juan2ramos@gmail.com',
            'password'=> bcrypt('123456789'),
            'password_2'=> md5('123456789'),
            'role_id'=> 1,
        ]);
        User::create([
            'name'=> 'Administrador',
            'last-name'=> 'Micsur',
            'identification-number'=> '',
            'email'=>'admin@micsur.org',
            'password'=> bcrypt('DirectorioMicsur2016&'),
            'password_2'=> md5('DirectorioMicsur2016&'),
            'role_id'=> 1,
        ]);
        User::create([
            'name'=> 'Cesar',
            'last-name'=> 'Valencia',
            'identification-number'=> '',
            'email'=>'cesarvalencia@circulart.org',
            'password'=> bcrypt('DirectorioMicsur2016&'),
            'password_2'=> md5('DirectorioMicsur2016&'),
            'role_id'=> 1,
        ]);
    }
}
