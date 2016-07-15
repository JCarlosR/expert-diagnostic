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

        DiseaseMedication::create([ 'disease_id' => 4, 'medication_id' => 3 ]);
        DiseaseMedication::create([ 'disease_id' => 4, 'medication_id' => 4 ]);
        DiseaseMedication::create([ 'disease_id' => 4, 'medication_id' => 13 ]);
        DiseaseMedication::create([ 'disease_id' => 4, 'medication_id' => 14 ]);

        DiseaseMedication::create([ 'disease_id' => 5, 'medication_id' => 16 ]);
        DiseaseMedication::create([ 'disease_id' => 5, 'medication_id' => 15 ]);
        DiseaseMedication::create([ 'disease_id' => 5, 'medication_id' => 14 ]);

        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 6 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 5 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 1 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 2 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 18 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 17 ]);
        DiseaseMedication::create([ 'disease_id' => 6, 'medication_id' => 7 ]);

        DiseaseMedication::create([ 'disease_id' => 7, 'medication_id' => 7 ]);
        DiseaseMedication::create([ 'disease_id' => 7, 'medication_id' => 8 ]);
        DiseaseMedication::create([ 'disease_id' => 7, 'medication_id' => 10 ]);
        DiseaseMedication::create([ 'disease_id' => 7, 'medication_id' => 11 ]);
        DiseaseMedication::create([ 'disease_id' => 7, 'medication_id' => 6 ]);

        DiseaseMedication::create([ 'disease_id' => 8, 'medication_id' => 20 ]);
        DiseaseMedication::create([ 'disease_id' => 8, 'medication_id' => 7 ]);
        DiseaseMedication::create([ 'disease_id' => 8, 'medication_id' => 8 ]);

        DiseaseMedication::create([ 'disease_id' => 9, 'medication_id' => 6 ]);
        DiseaseMedication::create([ 'disease_id' => 9, 'medication_id' => 5 ]);
        DiseaseMedication::create([ 'disease_id' => 9, 'medication_id' => 21 ]);
        DiseaseMedication::create([ 'disease_id' => 9, 'medication_id' => 22 ]);

/*        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 1 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 4 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 24 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 25 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 7 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 9 ]);

        DiseaseMedication::create([ 'disease_id' => 11, 'medication_id' => 14 ]);
        DiseaseMedication::create([ 'disease_id' => 11, 'medication_id' => 5 ]);
        DiseaseMedication::create([ 'disease_id' => 11, 'medication_id' => 13 ]);*/

        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 1 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 22 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 26 ]);
        DiseaseMedication::create([ 'disease_id' => 10, 'medication_id' => 11 ]);

    }
}
