<?php

use App\Sintoma;
use Illuminate\Database\Seeder;

class SintomasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sintoma::create([
            'name' => 'Dolor de Cabeza',
            'descripcion' => 'Se refiere a un dolor de cabeza comun.',
            'imagen' =>'algo.jpg'
        ]);
    }
}
