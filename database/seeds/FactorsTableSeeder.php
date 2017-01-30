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
        // 1
        Factor::create([
            'name'=>'Prueba del torniquete',
            'descripcion'=>'La prueba de Rumpel-Leede, del lazo o de torniquete es una técnica que ofrece información sobre la fragilidad capilar, usada por ejemplo como diagnóstico diferencial para enfermedades como el dengue y otros trastornos hemorrágicos por aumento de la fragilidad.',
            'type'=>'O',
            'imagen'=>'1.jpg'
        ]);
        
        // 2
        Factor::create([
            'name'=>'Edad mayor a 50 años',
            'descripcion'=>'Edad mayor a 50 años',
            'type'=>'O',
            'imagen'=>'2.jpg'
        ]);
        
        // 3
        Factor::create([
            'name'=>'Género femenino',
            'descripcion'=>'Género femenino',
            'type'=>'O',
            'imagen'=>'3.jpg'
        ]);

        // 4
        Factor::create([
            'name'=>'Género masculino',
            'descripcion'=>'Género masculino',
            'type'=>'O',
            'imagen'=>'4.jpg'
        ]);

        // 5
        Factor::create([
            'name'=>'Leucopenia',
            'descripcion'=>'Disminución del número de globulos blancos en la sangre, por debajo de 4 000 por milímetro cúbico.',
            'type'=>'O',
            'imagen'=>'4.jpg'
        ]);

        // 6
        Factor::create([
            'name'=>'Aumento hematocrito',
            'descripcion'=>'Aumento de globulos blancos en la sangre.',
            'type'=>'O',
            'imagen'=>'4.jpg'
        ]);

        // 7
        Factor::create([
            'name'=>'Disminución plaquetas',
            'descripcion'=>'Disminución plaquetas en la sangre.',
            'type'=>'O',
            'imagen'=>'4.jpg'
        ]);

        // SÍNTOMAS
        // 8
        Factor::create([
            'name'=>'Fiebre mayor a 39°C',
            'descripcion'=>'Fiebre mayor a 39°C',
            'type'=>'S',
            'imagen'=>'5.jpg'
        ]);

        // 9
        Factor::create([
            'name'=>'Artromialgia grave ',
            'descripcion'=>'Dolor fuerte de las articulaciones',
            'type'=>'S',
            'imagen'=>'6.jpg'
        ]);

        // 10
        Factor::create([
            'name'=>'Erupción máculopapular',
            'descripcion'=>'Erupciones rojizas en la piel como sarpullido',
            'type'=>'S',
            'imagen'=>'7.jpg'
        ]);

        // 11
        Factor::create([
            'name'=>'Dolor de espalda difuso',
            'descripcion'=>'Dolor en la espalda que puede disminuir o aumentar paulatinamente.',
            'type'=>'S',
            'imagen'=>'8.jpg'
        ]);

        // 12
        Factor::create([
            'name'=>'Rash',
            'descripcion'=>'Erupción que se manifiesta con cambios en el color o la textura de la piel.',
            'type'=>'S',
            'imagen'=>'9.png'
        ]);

        // 13
        Factor::create([
            'name'=>'Temperatura superior a 38ºC',
            'descripcion'=>'Temperatura superior a 38ºC.',
            'type'=>'S',
            'imagen'=>'12.jpg'
        ]);

        // 14
        Factor::create([
            'name'=>'Hemorragias',
            'descripcion'=>'Sangrado por diferentes ludares del cuerpo',
            'type'=>'S',
            'imagen'=>'12.jpg'
        ]);

        //ANTECEDENTES
        // 15
        Factor::create([
            'name'=>'Contacto con contagiados',
            'descripcion'=>'Contacto con contagiados',
            'type' => 'A',
            'imagen'=>'13.jpg'
        ]);

        // 16
        Factor::create([
            'name'=>'Viajes o Vivir a zonas endémicas',
            'descripcion'=>'Viajes o Vivir a zonas endémicas',
            'type' => 'A',
            'imagen'=>'14.jpg'
        ]);

        // 17
        Factor::create([
            'name'=>'Relaciones sexuales con contagiados',
            'descripcion'=>'Relaciones sexuales con contagiados',
            'type' => 'A',
            'imagen'=>'15.jpg'
        ]);

        // 18
        Factor::create([
            'name'=>'Fiebre mayor a 37°C',
            'descripcion'=>'Fiebre mayor a 37°C',
            'type'=>'S',
            'imagen'=>'5.jpg'
        ]);
    }
}
