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
            'name' => 'Gravol',
            'description' => 'Para la prevención y tratamiento activo del mareo producido por movimiento, náuseas y vómitos postoperatorios, vértigo de Ménière, jaqueca y perturbaciones producidas por electrochoque y radioterapia.',
        ]);

        Medication::create([
            'name' => 'Primperan',
            'description' => 'Para prevenir las náuseas y vómitos retardados que pueden aparecer después de la quimioterapia.',
        ]);

        Medication::create([
            'name' => 'Furoxona ',
            'description' => 'Como agente secundario en el tratamiento del cólera causado por Vibrio cholerae.Como agente secundario en el tratamiento de diarreas bacterianas causadas por microorganismos sensibles a la furazolidona: Campylobacter jejuni, Enterobacter aerogenes, Escherichia coli, Proteus, Salmonella, Shigella y Staphylococcus.',
        ]);

        Medication::create([
            'name' => 'Donamed',
            'description' => 'Antidiarreico que reduce los movimientos y secreciones intestinales, lo que produce una disminución de las deposiciones liquidas.',
        ]);

        Medication::create([
            'name' => 'Plidan compuesto',
            'description' => 'Analgésico en afecciones del aparato digestivo como: Síndrome Espástico doloroso, Esofágico, Gástrico, Pilórico y Colitis. Afecciones de las vías biliares: Colitis hepática, Colecistitis, Síndrome postcolecistectomía.',
        ]);

        Medication::create([
            'name' => 'Buscapina',
            'description' => 'Buscapina se utiliza para el tratamiento de los espasmos del tracto gastrointestinal, espasmos y trastornos de la motilidad (disquinesias) de las vías biliares y espasmos del tracto genitourinario, en adultos y niños mayores de 6 años.',
        ]);

        Medication::create([
            'name' => 'Metronidazol',
            'description' => 'Tratamiento de infecciones bacterianas graves por anaerobios susceptibles (infecciones aeróbicas y anaeróbicas mixtas, se podrá utilizar conjuntamente con un antimicrobiano para la infección aeróbica. Es eficaz en infecciones por Bacteroides fragilis, resistente a la clindamicina, cloranfenicol y penicilina).Infecciones intra-abdominales, peritonitis, abscesos intraabdominales, abscesos hepáticos, causados por Bacteroides sp, incluyendo el grupo de B. fragilis (B. fragilis, B. distasonis, B. ovatus, B. vul­gatus), Clostridium sp, Eubacterium sp, Peptococcus niger y Peptostreptococcus sp.',
        ]);

        Medication::create([
            'name' => 'Flagyl',
            'description' => 'Está indicado en la profilaxis de infecciones colónicas perioperatorias y en el tratamiento de infecciones bacterianas anaeróbicas, amebiasis y tricomoniasis.',
        ]);

        Medication::create([
            'name' => 'Antalgina',
            'description' => 'Es un analgésico y antipirético de gran efectividad. Su actividad antiflogística es semejante a la del ácido acetil salicílico. Su toxicidad es diez veces menor que la del piramidón y productos de esta serie. Antalgina es eficaz en todos lo estados patológicos que transcurren con fiebre o dolor, produciendo rápido alivio de estos síntomas, aún en los casos más rebeldes.',
        ]);

    }
}
