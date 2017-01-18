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
            'descripcion'=>'La prueba de Rumpel-Leede, del lazo o de torniquete es una técnica que ofrece información sobre la fragilidad capilar, usada por ejemplo como diagnóstico diferencial para enfermedades como el dengue y otros trastornos hemorrágicos por aumento de la fragilidad.',
            'type'=>'O',
            'imagen'=>'1.jpg'
        ]);
        Factor::create([
            'name'=>'Edad mayor a 50 años',
            'descripcion'=>'Edad mayor a 50 años',
            'type'=>'O',
            'imagen'=>'2.jpg'
        ]);
        Factor::create([
            'name'=>'Género femenino',
            'descripcion'=>'Género femenino',
            'type'=>'O',
            'imagen'=>'3.jpg'
        ]);
        Factor::create([
            'name'=>'Género masculino',
            'descripcion'=>'Género femenino',
            'type'=>'O',
            'imagen'=>'4.jpg'
        ]);

        // SÍNTOMAS
        Factor::create([
            'name'=>'Fiebre mayor a 39°C',
            'descripcion'=>'Fiebre mayor a 39°C',
            'type'=>'S',
            'imagen'=>'5.jpg'
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 38°C',
            'descripcion'=>'Fiebre mayor a 38°C',
            'type'=>'S',
            'imagen'=>'6.jpg'
        ]);
        Factor::create([
            'name'=>'Fiebre mayor a 37°C',
            'descripcion'=>'Fiebre mayor a 37°C',
            'type'=>'S',
            'imagen'=>'7.jpg'
        ]);

        Factor::create([
            'name'=>'Artromialgia',
            'descripcion'=>'Se define como artromialgias a la presencia de dolor a nivel muscular y articular de carácter inespecífico, son de carácter intermitente, cambiantes, no asociadas a ningún esfuerzo físico o traumatismo.',
            'type'=>'S',
            'imagen'=>'8.jpg'
        ]);
        Factor::create([
            'name'=>'Rash',
            'descripcion'=>'El rash es una erupción que se manifiesta con cambios en el color o la textura de la piel.',
            'type'=>'S',
            'imagen'=>'9.png'
        ]);
        Factor::create([
            'name'=>'Hemorragia',
            'descripcion'=>'Ees la salida de sangre desde el aparato circulatorio, provocada por la ruptura de vasos sanguíneos como venas, arterias o capilares.',
            'type'=>'S',
            'imagen'=>'10.jpg'
        ]);
        Factor::create([
            'name'=>'Dolor de espalda difuso',
            'descripcion'=>'Se siente en un lado de la espalda o en el otro, aunque también puede ser bilateral. Los síntomas más frecuentes de la dorsalgia se encuentran en la zona superior de la espalda, entre los omóplatos, lo que muchos pacientes describen coloquialmente como "paletillas"',
            'type'=>'S',
            'imagen'=>'11.jpg'
        ]);

        Factor::create([
            'name'=>'Erupción maculopapular',
            'descripcion'=>'Es un tipo de erupción, que no se eleva por encima de la superficie de la piel. Contiene máculas, que són unas mancha en la piel descoloridas y las pápulas, que són unas protuberancias pequeñas sólidas, que causan la inflamación de la piel. No contienen pús y són eritematosas, ya que hacen que la piel se vuelva de un color rojo.',
            'type'=>'S',
            'imagen'=>'12.jpg'
        ]);

        //ANTECEDENTES
        Factor::create([
            'name'=>'Contacto con contagiados',
            'descripcion'=>'Contacto con contagiados',
            'type' => 'A',
            'imagen'=>'13.jpg'
        ]);
        Factor::create([
            'name'=>'Viajes o Vivir a zonas endémicas',
            'descripcion'=>'Viajes o Vivir a zonas endémicas',
            'type' => 'A',
            'imagen'=>'14.jpg'
        ]);
        Factor::create([
            'name'=>'Relaciones sexuales con contagiados',
            'descripcion'=>'Relaciones sexuales con contagiados',
            'type' => 'A',
            'imagen'=>'15.jpg'
        ]);
    }
}
