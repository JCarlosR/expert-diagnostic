<?php

use App\Factor;
use App\Other;
use App\Symptom;
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
        Other::create([
            'name'=>'Prueba del torniquete',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Other::create([
            'name'=>'Edad',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Other::create([
            'name'=>'Género',
            'descripcion'=>'',
            'imagen'=>''
        ]);

        // SÍNTOMAS
        Symptom::create([
            'name'=>'Fiebre mayor a 39°C',
            'descripcion'=>'Fiebre',
            'imagen'=>''
        ]);
        Symptom::create([
            'name'=>'Fiebre mayor a 38°C',
            'descripcion'=>'Fiebre',
            'imagen'=>''
        ]);
        Symptom::create([
            'name'=>'Fiebre mayor a 37°C',
            'descripcion'=>'Fiebre',
            'imagen'=>''
        ]);

        Symptom::create([
            'name'=>'Artromialgia',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Symptom::create([
            'name'=>'Rash',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Symptom::create([
            'name'=>'Hemorragia',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Symptom::create([
            'name'=>'Dolor de espalda difuso',
            'descripcion'=>'',
            'imagen'=>''
        ]);

        Symptom::create([
            'name'=>'Erupción maculopapular',
            'descripcion'=>'',
            'imagen'=>''
        ]);

        //ANTECEDENTES
        Factor::create([
            'name'=>'Contacto con contagiados',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Viajes/Vivir a zonas endémicas',
            'descripcion'=>'',
            'imagen'=>''
        ]);
        Factor::create([
            'name'=>'Relaciones sexuales con contagiados',
            'descripcion'=>'',
            'imagen'=>''
        ]);
    }
}
