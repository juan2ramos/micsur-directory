<?php

use Directory\Entities\Sector;
use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create(['name'=> 'Audiovisual',]);
        Sector::create(['name'=> 'Diseño',]);
        Sector::create(['name'=> 'Música',]);
        Sector::create(['name'=> 'Editorial',]);
        Sector::create(['name'=> 'Animación y Videojuegos',]);
        Sector::create(['name'=> 'Artes escénicas',]);
        Sector::create(['name'=> 'Organización privada',]);
        Sector::create(['name'=> 'Organización pública',]);
    }
}
