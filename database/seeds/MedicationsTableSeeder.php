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
        // 1
        Medication::create([
            'name' => 'Mosquiteras',
            'description' => 'Colocar mosquiteras en puertas y ventanas',
        ]);

        // 2
        Medication::create([
            'name' => 'Eliminación de posibles criaderos',
            'description' => 'Eliminación de las zonas de crías cercanas al domicilio del caso confirmado',
        ]);

        // 3
        Medication::create([
            'name' => 'Prueba hematocrito',
            'description' => 'Prueba hematocrito',
        ]);

        // 4
        Medication::create([
            'name' => 'Plaquetas',
            'description' => 'Plaquetas',
        ]);

        // 5
        Medication::create([
            'name' => 'Recuento leucocitario',
            'description' => 'recuento leucocitario',
        ]);

        // 6
        Medication::create([
            'name' => 'Asegurar acceso venoso',
            'description' => 'Asegurar acceso venoso',
        ]);

        // 7
        Medication::create([
            'name' => 'Fluidoterapia con cristaloides',
            'description' => 'Fluidoterapia con cristaloides',
        ]);

        // 8
        Medication::create([
            'name' => 'Descanso',
            'description' => 'Reposo en cama',
        ]);

        // 9
        Medication::create([
            'name' => 'Hidratación',
            'description' => 'Ingesta de bastante líquido, jugos o rehidratantes.',
        ]);

        // 10
        Medication::create([
            'name' => 'Paracetamol 1g/6h',
            'description' => 'Paracetamol 1g/6h',
        ]);

        // 11
        Medication::create([
            'name' => 'Antitermicos, Analgesico',
            'description' => 'Antitermicos y/o Analgesico',
        ]);

        // 12
        Medication::create([
            'name' => 'No se recomienda Acido Acetilsalicilico',
            'description' => 'INo se recomienda Acido Acetilsalicilico.',
        ]);

        // 13
        Medication::create([
            'name' => 'Seguimiento adecuado y persistente',
            'description' => 'Seguimiento adecuado y persistente',
        ]);

        // 14
        Medication::create([
            'name' => 'Usar perservativos en los hombres con antecedentes de ZIKA',
            'description' => 'Usar perservativos en los hombres con antecedentes de ZIKA',
        ]);

    }
}
