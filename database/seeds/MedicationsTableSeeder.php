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

        Medication::create([
            'active_component' => 'Paracetamol',
            'trade_name' => 'Panadol',
            'description' => 'Panadol Extra Fuerte proporciona alivio efectivo de dolores y molestias, tales como dolores de cabeza y dolor post tratamientos dentales / extracción dental.',
            'image' => '10.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metamizol Sódico Monohidrato',
            'trade_name' => 'Novalgina',
            'description' => 'Novalgina es un potente analgésico antipirético y antiinflamatorio con metamizol como principio activo. Este medicamento inhibe la producción de prostaglandinas, unas sustancias endógenas responsables del dolor, las reacciones inflamatorias y el aumento de la temperatura corporal.',
            'image' => '11.jpg'
        ]);

        Medication::create([
            'active_component' => 'Metamizol sódico',
            'trade_name' => 'Repriman',
            'description' => 'Fiebre alta de diversa etiología, antecedente de convulsiones febriles, dolor de origen tumoral, dolor intenso que no cede a otras medidas.',
            'image' => '12.jpg'
        ]);

        Medication::create([
            'active_component' => 'Solución Salina Normal',
            'trade_name' => 'Suero',
            'description' => 'El término suero es un término que se utiliza para designar a algunos tipos de líquidos con características y usos específicos. En este sentido, el suero puede ser una solución salina que se utiliza en la medicina como complemento nutriente para personas o animales convalecientes.',
            'image' => '13.jpg'
        ]);

        Medication::create([
            'active_component' => 'Glucosa, Cloruro de potasio, Cloruro de sodio, Citrato trisódico dihidratado.',
            'trade_name' => 'Suero Oral',
            'description' => 'Los Electrolitos son sales y minerales que se convierten en iones en agua y adquiere la capacidad de conducir electricidad. Estos iones producen un impulso eléctrico que viaja por nuestro cuerpo. Los electrolitos entran y salen de las células.',
            'image' => '14.jpg'
        ]);

        Medication::create([
            'active_component' => 'Hidróxido de Aluminio.',
            'trade_name' => 'Hidróxido de aluminio',
            'description' => 'El hidróxido de aluminio y el hidróxido de magnesio son los antiácidos usados juntos para aliviar la pirosis (acidez o calor estomacal), la indigestión ácida y los malestares estomacales. Pueden usarse para tratar estos síntomas en los pacientes con úlcera péptica, gastritis, esofagitis, hernia hiatal o demasiado ácido en el estómago (hiperacidez gástrica).',
            'image' => '15.jpg'
        ]);

        Medication::create([
            'active_component' => 'Hidróxido de magnesio, hidróxido de aluminio, simeticona.',
            'trade_name' => 'Mylanta',
            'description' => 'Es un antiácido. Los antiácidos actúan neutralizando el ácido suelto en el estómago, el ácido ya producido, brindando alivio rápido en sólo minutos.',
            'image' => '16.jpg'
        ]);

        Medication::create([
            'active_component' => 'Vitamina B1, Vitamina B2, Vitamina B6, Niacina, Vitamina B12, Ácido fólico, Ácido pantoténico.',
            'trade_name' => 'Complejo B',
            'description' => 'Es una fórmula nutritivamente equilibrada de siete vitaminas B esenciales, seis de ellas principalmente de origen natural.',
            'image' => '17.jpg'
        ]);

        Medication::create([
            'active_component' => 'Vitamina C.',
            'trade_name' => 'Vitamina C',
            'description' => 'Conocida como ácido ascórbico, es un nutriente hidrosoluble. Es la vitamina menos estable y es muy sensible a reaccionar con el oxígeno. Esto es importante ya que su potencia puede perderse cuando se oxida por exposición a la luz, el calor y el aire.',
            'image' => '18.jpg'
        ]);

        Medication::create([
            'active_component' => 'Silimarina, Tiamina HCl, Riboflavina, Nicotinamida, Piridoxina HCl, Pantotenato de calcio',
            'trade_name' => 'Higanatur B',
            'description' => 'Está indicado en casos de intoxicación por Amanita phalloides, coadyuvante en el tratamiento de la intoxicación por Tetracloruro de Carbono, y en casos de Hepatitis Alcohólica.',
            'image' => '19.jpg'
        ]);

        Medication::create([
            'active_component' => 'Glicerina',
            'trade_name' => 'Supositrios',
            'description' => 'Está indicado para la constipación ocasional.',
            'image' => '20.jpg'
        ]);

        Medication::create([
            'active_component' => 'Simeticona',
            'trade_name' => 'Gaseoved',
            'description' => 'Es un efectivo antiflatulento, a base de Simeticona, que es una silicona cuya acción es alterar la tensión superficial de las burbujas de gases que se forman en el tracto gastrointestinal, ya sea en el proceso digestivo mismo o por intolerancia a la lactosa.',
            'image' => '21.jpg'
        ]);

        Medication::create([
            'active_component' => 'Enzimas pancreáticas',
            'trade_name' => 'Frutenzima',
            'description' => 'Gastroparesia diabética aguda y recidivante. Profilaxis de náuseas y vómitos inducidos por la quimioterapia. Tratamiento a corto plazo de pirosis y del vaciado gástrico retardado, secundarios a la esofagitis por reflujo. Coadyuvante de la radiografía gastrointestinal.',
            'image' => '22.jpg'
        ]);

        Medication::create([
            'active_component' => 'Pancreatina, Simeticona',
            'trade_name' => 'Pankreoflat',
            'description' => 'Pankreoflat es útil para el alivio sintomático de las alteraciones digestivas en las que se produce aerofagia (deglución de aire) o flatulencia (gases), como pesadez de estómago y digestiones lentas relacionadas con insuciencia de enzimas pancreáticas.',
            'image' => '23.jpg'
        ]);

        Medication::create([
            'active_component' => 'Picosulfato sódico',
            'trade_name' => 'Dibrolax',
            'description' => 'Laxante estimulante de acción local. Aumenta el peristaltismo en intestino grueso y el contenido de agua y electrolitos en luz intestinal del colon.',
            'image' => '0.jpg'
        ]);

        Medication::create([
            'active_component' => 'Bisacodilo',
            'trade_name' => 'Dulcolax',
            'description' => 'Son ideales para las personas que buscan alivio del estreñimiento durante la noche. En todo el mundo se consideran como suaves, confiables y fáciles de tomar.',
            'image' => '24.jpg'
        ]);

        Medication::create([
            'active_component' => 'Simeticona',
            'trade_name' => 'Digestal',
            'description' => 'Está recomendada en el tratamiento sintomático del síndrome de mala absorción causado por insuficiencia pancreática de origen orgánico, en la fibrosis quística del páncreas, en pancreatitis crónica y en otros estados en que la insuficiencia pancreática desequilibre la digestión de grasas.',
            'image' => '25.jpg'
        ]);

    }
}
