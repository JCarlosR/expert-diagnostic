<?php

use App\Factor;
use Illuminate\Database\Seeder;

class FactorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // OTROS FACTORES
        Factor::create([
            'name'=>'Prueba del torniquete',
            'descripcion'=>'',
            'type'=>'O',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Edad',
            'descripcion'=>'',
            'type'=>'O',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Género',
            'descripcion'=>'',
            'type'=>'O',
            'imagen'=>'0.png'
        ]);

        // SÍNTOMAS
        Factor::create([
            'name'=>'Fiebre mayor a 39°C',
            'descripcion'=>'Fiebre',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 38°C',
            'descripcion'=>'Fiebre',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 37°C',
            'descripcion'=>'Fiebre',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);

        Factor::create([
            'name'=>'Artromialgia',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Rash',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Hemorragia',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Dolor de espalda difuso',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);

        Factor::create([
            'name'=>'Erupción maculopapular',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>'0.png'
        ]);

        //ANTECEDENTES
        Factor::create([
            'name'=>'Contacto con contagiados',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Viajes o Vivir a zonas endémicas',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>'0.png'
        ]);
        Factor::create([
            'name'=>'Relaciones sexuales con contagiados',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>'0.png'
        ]);
    }
}
