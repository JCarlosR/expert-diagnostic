<?php

use App\DiseaseMedication;
use Illuminate\Database\Seeder;

class DiseaseMedicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiseaseMedication::create([ 'disease_id' => 1, 'medication_id' => 1 ]);
        DiseaseMedication::create([ 'disease_id' => 1, 'medication_id' => 3 ]);
        DiseaseMedication::create([ 'disease_id' => 1, 'medication_id' => 5 ]);

        DiseaseMedication::create([ 'disease_id' => 2, 'medication_id' => 3 ]);
        DiseaseMedication::create([ 'disease_id' => 2, 'medication_id' => 4 ]);

        DiseaseMedication::create([ 'disease_id' => 3, 'medication_id' => 5 ]);
        DiseaseMedication::create([ 'disease_id' => 3, 'medication_id' => 6 ]);
        DiseaseMedication::create([ 'disease_id' => 3, 'medication_id' => 7 ]);
        DiseaseMedication::create([ 'disease_id' => 3, 'medication_id' => 9 ]);
    }
}
