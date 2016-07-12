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
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>'Es una inflamación de la membrana interna del intestino causada por un virus, una bacteria o parásitos.'
        ]);

        Disease::create([
            'name'=>'Diarrea',
            'image'=>'2.jpg',
            'video'=>'https://www.youtube.com/embed/lRTm6JIZ1JM',
            'description'=>'Alteración intestinal que se caracteriza por la mayor frecuencia, fluidez y, a menudo, volumen de las deposiciones.'
        ]);

        Disease::create([
            'name'=>'Disenteria',
            'image'=>'3.jpg',
            'video'=>'https://www.youtube.com/embed/TbuklNmF2wg',
            'description'=>'Enfermedad infecciosa que se caracteriza por la inflamación y ulceración del intestino grueso acompañada de fiebre, dolor abdominal y diarrea con deposiciones de mucosidades y sangre.'
        ]);

        Disease::create([
            'name'=>'Enfermedad de CROHN',
            'image'=>'4.jpg',
            'video'=>'https://www.youtube.com/embed/Nkbhc7KyS68',
            'description'=>'Es una enfermedad por la cual resultan inflamadas partes del tubo digestivo.'.
                           'Casi siempre compromete el extremo inferior del intestino delgado y el comienzo del intestino grueso.'.
                           'También puede ocurrir en cualquier parte del tubo digestivo desde la boca hasta el extremo del recto (ano).'.
                           'La enfermedad de Crohn es una forma de enfermedad intestinal inflamatoria (EII).'
        ]);

        Disease::create([
            'name'=>'Acidez gástrica',
            'image'=>'5.jpg',
            'video'=>'https://www.youtube.com/embed/SPUR4ZKoOF8',
            'description'=>'Es una sensación de ardor justo debajo o detrás del esternón. Generalmente proviene del esófago.'.
                           'El dolor suele originarse en el pecho desde el estómago y puede irradiarse hacia el cuello o la garganta.'
        ]);

        Disease::create([
            'name'=>'Hepatisis A',
            'image'=>'6.jpg',
            'video'=>'https://www.youtube.com/embed/qgbvWDaIRpE',
            'description'=>'Es la inflamación (irritación e hinchazón) del hígado por el virus de la hepatitis A.'
        ]);

        Disease::create([
            'name'=>'Colitis ulcerosa',
            'image'=>'7.jpg',
            'video'=>'https://www.youtube.com/embed/fqREaRKG_GM',
            'description'=>'Es una enfermedad inflamatoria del colon (el intestino grueso) y del recto.'.
                           'Está caracterizada por la inflamación y ulceración de la pared interior del colon.'
        ]);

        Disease::create([
            'name'=>'Sangre en las evacuaciones',
            'image'=>'8.jpg',
            'video'=>'https://www.youtube.com/embed/7AczCi4UQA8',
            'description'=>'Son una señal de un problema en el tubo digestivo.'.
                           'La sangre en las heces puede provenir de cualquier lugar a lo largo del tubo digestivo desde la boca hasta el ano.'
        ]);

        Disease::create([
            'name'=>'Intestino irritable',
            'image'=>'9.jpg',
            'video'=>'https://www.youtube.com/embed/B3Wk60-hS_c',
            'description'=>'es un trastorno que lleva a dolor abdominal y cambios en el intestino.'
        ]);

        Disease::create([
            'name'=>'Dolor abdominal',
            'image'=>'10.jpg',
            'video'=>'https://www.youtube.com/embed/OErbAK_girE',
            'description'=>'Es el dolor que se siente en el área entre el pecho y la ingle, a menudo denominada región estomacal o vientre.'
        ]);

        Disease::create([
            'name'=>'Perdida de peso no intencional',
            'image'=>'11.jpg',
            'video'=>'https://www.youtube.com/embed/u5XWTI-Dh2E',
            'description'=>' Es la pérdida de peso involuntaria es la pérdida de 5 kg o el 5% de su peso corporal normal durante 6 a 12 meses o menos sin conocer la razón.'
        ]);

        Disease::create([
            'name'=>'Gastritis',
            'image'=>'12.jpg',
            'video'=>'https://www.youtube.com/embed/0sOZNV2-24M',
            'description'=>'La gastritis ocurre cuando el revestimiento del estómago resulta hinchado o inflamado.'.
                           'La gastritis puede durar sólo por un corto tiempo (gastritis aguda). También puede perdurar durante meses o años (gastritis crónica).'
        ]);
    }
}
