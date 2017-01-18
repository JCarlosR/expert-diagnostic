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
            'image'=>'0.png',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>'El dengue hemorrágicoes una forma más severa del dengue. Esta puede ser fatal si no se reconoce o trata adecuadamente. El dengue hemorrágico es causado por infección con los mismos virus que causan el dengue.'
        ]);

        Disease::create([
            'name'=>'Dengue clásico',
            'image'=>'0.png',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>''
        ]);

        Disease::create([
            'name'=>'Chikungunya',
            'image'=>'0.png',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>'Es conocida además como artritis epidémica chikunguña o fiebre de chikunguña, es una enfermedad producida por el virus de tipo alfavirus del mismo nombre, que se transmite a las personas mediante la picadura de los mosquitos portadores Aedes; tanto el Aedes aegypti como el Aedes albopictus.'
        ]);

        Disease::create([
            'name'=>'Zika',
            'image'=>'0.png',
            'video'=>'https://www.youtube.com/embed/m_spiNknXN0',
            'description'=>'El virus de Zika se transmite a las personas principalmente a través de la picadura de mosquitos infectados del género Aedes, y sobre todo de Aedes aegypti en las regiones tropicales. Los mosquitos Aedes suelen picar durante el día, sobre todo al amanecer y al anochecer, y son los mismos que transmiten el dengue, la fiebre chikungunya y la fiebre amarilla.
            Asimismo, es posible la transmisión sexual, y se están investigando otros modos de transmisión, como las transfusiones de sangre.'
        ]);

    }
}
