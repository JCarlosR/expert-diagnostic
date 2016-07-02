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
            'descripcion' => 'Dolor de cabeza',
            'imagen' =>'algo.jpg'
        ]);
    }
}
