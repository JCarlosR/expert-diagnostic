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
            'name'=>'Dengue hemorrágico',
            'image'=>'',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>''
        ]);

        Disease::create([
            'name'=>'Dengue clásico',
            'image'=>'',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>''
        ]);

        Disease::create([
            'name'=>'Chikungunya',
            'image'=>'',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>''
        ]);

        Disease::create([
            'name'=>'Zika',
            'image'=>'',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>''
        ]);

    }
}
