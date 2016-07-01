<?php

use App\Medication;
use Illuminate\Database\Seeder;

class MedicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medication::create([
            'active_component' => 'Dimenhidrinato',
            'trade_name' => 'Gravol',
            'description' => 'Para la prevención y tratamiento activo del mareo producido por movimiento, náuseas y vómitos postoperatorios, vértigo de Ménière, jaqueca y perturbaciones producidas por electrochoque y radioterapia.',
            'image' => '1.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metoclopramida hidrocloruro',
            'trade_name' => 'Primperan',
            'description' => 'Para prevenir las náuseas y vómitos retardados que pueden aparecer después de la quimioterapia.',
            'image' => '2.jpg'
        ]);

        Medication::create([
            'active_component' => 'Furazolidona',
            'trade_name' => 'Furoxona ',
            'description' => 'Como agente secundario en el tratamiento del cólera causado por Vibrio cholerae.Como agente secundario en el tratamiento de diarreas bacterianas causadas por microorganismos sensibles a la furazolidona: Campylobacter jejuni, Enterobacter aerogenes, Escherichia coli, Proteus, Salmonella, Shigella y Staphylococcus.',
            'image' => '3.jpg'
        ]);

        Medication::create([
            'active_component' => 'Loperamida',
            'trade_name' => 'Donamed',
            'description' => 'Antidiarreico que reduce los movimientos y secreciones intestinales, lo que produce una disminución de las deposiciones liquidas.',
            'image' => '4.jpg'
        ]);

        Medication::create([
            'active_component' => 'Clorhidrato de pargeverina / Clonixinato de Lisina.',
            'trade_name' => 'Plidan compuesto',
            'description' => 'Analgésico en afecciones del aparato digestivo como: Síndrome Espástico doloroso, Esofágico, Gástrico, Pilórico y Colitis. Afecciones de las vías biliares: Colitis hepática, Colecistitis, Síndrome postcolecistectomía.',
            'image' => '5.jpg'
        ]);

        Medication::create([
            'active_component' => 'Butilbromuro de escopolamina',
            'trade_name' => 'Buscapina',
            'description' => 'Buscapina se utiliza para el tratamiento de los espasmos del tracto gastrointestinal, espasmos y trastornos de la motilidad (disquinesias) de las vías biliares y espasmos del tracto genitourinario, en adultos y niños mayores de 6 años.',
            'image' => '6.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metronidazol',
            'trade_name' => 'Metronidazol',
            'description' => 'Tratamiento de infecciones bacterianas graves por anaerobios susceptibles (infecciones aeróbicas y anaeróbicas mixtas, se podrá utilizar conjuntamente con un antimicrobiano para la infección aeróbica. Es eficaz en infecciones por Bacteroides fragilis, resistente a la clindamicina, cloranfenicol y penicilina).Infecciones intra-abdominales, peritonitis, abscesos intraabdominales, abscesos hepáticos, causados por Bacteroides sp, incluyendo el grupo de B. fragilis (B. fragilis, B. distasonis, B. ovatus, B. vul­gatus), Clostridium sp, Eubacterium sp, Peptococcus niger y Peptostreptococcus sp.',
            'image' => '7.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metronidazol',
            'trade_name' => 'Flagyl',
            'description' => 'Está indicado en la profilaxis de infecciones colónicas perioperatorias y en el tratamiento de infecciones bacterianas anaeróbicas, amebiasis y tricomoniasis.',
            'image' => '8.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metamizol sódico',
            'trade_name' => 'Antalgina',
            'description' => 'Es un analgésico y antipirético de gran efectividad. Su actividad antiflogística es semejante a la del ácido acetil salicílico. Su toxicidad es diez veces menor que la del piramidón y productos de esta serie. Antalgina es eficaz en todos lo estados patológicos que transcurren con fiebre o dolor, produciendo rápido alivio de estos síntomas, aún en los casos más rebeldes.',
            'image' => '9.jpg'
        ]);

    }
}
