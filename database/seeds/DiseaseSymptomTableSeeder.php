<?php

use App\DiseaseSymptom;
use Illuminate\Database\Seeder;

class DiseaseSymptomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiseaseSymptom::create([ 'disease_id' => 1, 'symptom_id' => 30 ]);
        DiseaseSymptom::create([ 'disease_id' => 1, 'symptom_id' => 45 ]);
        DiseaseSymptom::create([ 'disease_id' => 1, 'symptom_id' => 6 ]);
        DiseaseSymptom::create([ 'disease_id' => 1, 'symptom_id' => 29 ]);

        DiseaseSymptom::create([ 'disease_id' => 2, 'symptom_id' => 19 ]);
        DiseaseSymptom::create([ 'disease_id' => 2, 'symptom_id' => 20 ]);

        DiseaseSymptom::create([ 'disease_id' => 3, 'symptom_id' => 40 ]);
        DiseaseSymptom::create([ 'disease_id' => 3, 'symptom_id' => 36 ]);
        DiseaseSymptom::create([ 'disease_id' => 3, 'symptom_id' => 14 ]);
        DiseaseSymptom::create([ 'disease_id' => 3, 'symptom_id' => 17 ]);
        DiseaseSymptom::create([ 'disease_id' => 3, 'symptom_id' => 38 ]);

        DiseaseSymptom::create([ 'disease_id' => 4, 'symptom_id' => 6 ]);
        DiseaseSymptom::create([ 'disease_id' => 4, 'symptom_id' => 3 ]);

        DiseaseSymptom::create([ 'disease_id' => 5, 'symptom_id' => 1 ]);
        DiseaseSymptom::create([ 'disease_id' => 5, 'symptom_id' => 32 ]);
        DiseaseSymptom::create([ 'disease_id' => 5, 'symptom_id' => 8 ]);
        DiseaseSymptom::create([ 'disease_id' => 5, 'symptom_id' => 43 ]);
        DiseaseSymptom::create([ 'disease_id' => 5, 'symptom_id' => 42 ]);
    }
}
