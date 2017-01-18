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
            'name' => 'Mosquiteras',
            'description' => 'Colocar mosquiteras en puertas y ventanas',
        ]);
        Medication::create([
            'name' => 'Eliminación de posibles criaderos',
            'description' => 'Eliminación de las zonas de crías cercanas al domicilio del caso confirmado',
        ]);
        Medication::create([
            'name' => 'Prueba hematocrito',
            'description' => 'Prueba hematocrito',
        ]);
        Medication::create([
            'name' => 'Plaquetas',
            'description' => 'Plaquetas',
        ]);
        Medication::create([
            'name' => 'Recuento leucocitario',
            'description' => 'recuento leucocitario',
        ]);
        Medication::create([
            'name' => 'Asegurar acceso venoso',
            'description' => 'Asegurar acceso venoso',
        ]);
        Medication::create([
            'name' => 'Fluidoterapia con cristaloides',
            'description' => 'Fluidoterapia con cristaloides',
        ]);
        Medication::create([
            'name' => 'Descanso',
            'description' => 'Reposo en cama',
        ]);
        Medication::create([
            'name' => 'Hidratación',
            'description' => 'Ingesta de bastante líquido, jugos o rehidratantes.',
        ]);
        Medication::create([
            'name' => 'Paracetamol 1g/6h',
            'description' => 'Paracetamol 1g/6h',
        ]);
        Medication::create([
            'name' => 'Antitermicos, Analgesico',
            'description' => 'Antitermicos y/o Analgesico',
        ]);
        Medication::create([
            'name' => 'No se recomienda Acido Acetilsalicilico',
            'description' => 'INo se recomienda Acido Acetilsalicilico.',
        ]);
        Medication::create([
            'name' => 'Seguimiento adecuado y persistente',
            'description' => 'Seguimiento adecuado y persistente',
        ]);
        Medication::create([
            'name' => 'Usar perservativos en los hombres con antecedentes de ZIKA',
            'description' => 'Usar perservativos en los hombres con antecedentes de ZIKA',
        ]);

    }
}
