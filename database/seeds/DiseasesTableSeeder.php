<?php

use App\Disease;
use Illuminate\Database\Seeder;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disease::create([
            'name'=>'Gastroenteritis',
            'image'=>'1.jpg',
            'description'=>'Es una inflamación de la membrana interna del intestino causada por un virus, una bacteria o parásitos.'
        ]);

        Disease::create([
            'name'=>'Diarrea',
            'image'=>'2.jpg',
            'description'=>'Alteración intestinal que se caracteriza por la mayor frecuencia, fluidez y, a menudo, volumen de las deposiciones.'
        ]);

        Disease::create([
            'name'=>'Disenteria',
            'image'=>'3.jpg',
            'description'=>'Enfermedad infecciosa que se caracteriza por la inflamación y ulceración del intestino grueso acompañada de fiebre, dolor abdominal y diarrea con deposiciones de mucosidades y sangre.'
        ]);

        Disease::create([
            'name'=>'Enfermedad de CROHN',
            'image'=>'4.jpg',
            'description'=>'Es una enfermedad por la cual resultan inflamadas partes del tubo digestivo.
                            Casi siempre compromete el extremo inferior del intestino delgado y el comienzo del intestino grueso.
                            También puede ocurrir en cualquier parte del tubo digestivo desde la boca hasta el extremo del recto (ano).
                            La enfermedad de Crohn es una forma de enfermedad intestinal inflamatoria (EII).'
        ]);

        Disease::create([
            'name'=>'Acidez gástrica',
            'image'=>'5.jpg',
            'description'=>'Es una sensación de ardor justo debajo o detrás del esternón. Generalmente proviene del esófago.
                            El dolor suele originarse en el pecho desde el estómago y puede irradiarse hacia el cuello o la garganta.'
        ]);

        Disease::create([
            'name'=>'Hepatisis A',
            'image'=>'6.jpg',
            'description'=>'Es la inflamación (irritación e hinchazón) del hígado por el virus de la hepatitis A.'
        ]);

        Disease::create([
            'name'=>'Colitis ulcerosa',
            'image'=>'7.jpg',
            'description'=>'Es una enfermedad inflamatoria del colon (el intestino grueso) y del recto.
                            Está caracterizada por la inflamación y ulceración de la pared interior del colon.'
        ]);

        Disease::create([
        'name'=>'Sangre en las evacuaciones',
        'image'=>'8.jpg',
        'description'=>'Son una señal de un problema en el tubo digestivo.
                        La sangre en las heces puede provenir de cualquier lugar a lo largo del tubo digestivo desde la boca hasta el ano.'
        ]);

        Disease::create([
            'name'=>'Intestino irritable',
            'image'=>'9.jpg',
            'description'=>'es un trastorno que lleva a dolor abdominal y cambios en el intestino.'
        ]);

        Disease::create([
            'name'=>'Dolor abdominal severo',
            'image'=>'10.jpg',
            'description'=>'Es el dolor que se siente en el área entre el pecho y la ingle, a menudo denominada región estomacal o vientre.'
        ]);

        Disease::create([
            'name'=>'Perdida de peso no intencional',
            'image'=>'11.jpg',
            'description'=>' Es la pérdida de peso involuntaria es la pérdida de 5 kg o el 5% de su peso corporal normal durante 6 a 12 meses o menos sin conocer la razón.'
        ]);

        Disease::create([
            'name'=>'Acidez',
            'image'=>'12.jpg',
            'description'=>'Es una sensación de ardor dolorosa en el pecho o la garganta. Ocurre cuando el ácido del estómago regresa hacia el esófago, el tubo que transporta la comida desde la boca hacia el estómago.'
        ]);
    }
}
