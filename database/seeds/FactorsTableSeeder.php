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
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Edad',
            'descripcion'=>'',
            'type'=>'O',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Género',
            'descripcion'=>'',
            'type'=>'O',
            'imagen'=>''
        ]);

        // SÍNTOMAS
        Factor::create([
            'name'=>'Fiebre mayor a 39°C',
            'descripcion'=>'Fiebre',
            'type'=>'S',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 38°C',
            'descripcion'=>'Fiebre',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 37°C',
            'descripcion'=>'Fiebre',
            'type'=>'S',
            'imagen'=>''
        ]);

        Factor::create([
            'name'=>'Artromialgia',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Rash',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Hemorragia',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Dolor de espalda difuso',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>''
        ]);

        Factor::create([
            'name'=>'Erupción maculopapular',
            'descripcion'=>'',
            'type'=>'S',
            'imagen'=>''
        ]);

        //ANTECEDENTES
        Factor::create([
            'name'=>'Contacto con contagiados',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Viajes/Vivir a zonas endémicas',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Relaciones sexuales con contagiados',
            'descripcion'=>'',
            'type' => 'A',
            'imagen'=>''
        ]);
    }
}
