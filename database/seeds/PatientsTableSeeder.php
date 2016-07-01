<?php

use App\Patient;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'name' => 'Jose',
            'surname' => 'Santos Hernandez',
            'address' => 'Av. Los Ángeles',
            'city' => 'La Libertad',
            'country' => 'Perú',
            'image' => '1.jpg',
            'comment' => 'Comentario 1',
            'birthdate' => '1994/08/01'
        ]);

        Patient::create([
            'name' => 'Josue',
            'surname' => 'Santos Carbajal',
            'address' => 'Av. Los Ángeles',
            'city' => 'La Libertad',
            'country' => 'Perú',
            'image' => '2.jpg',
            'comment' => 'Comentario 2',
            'birthdate' => '1994/08/02'
        ]);

        Patient::create([
            'name' => 'Luis',
            'surname' => 'Santos Fernandez',
            'address' => 'Av. Los Laureles',
            'city' => 'La Libertad',
            'country' => 'Perú',
            'image' => '3.jpg',
            'comment' => 'Comentario 3',
            'birthdate' => '1994/08/03'
        ]);

        Patient::create([
            'name' => 'Juana',
            'surname' => 'Sabogal alvarez',
            'address' => 'Av. Los Heroes',
            'city' => 'Ayacucho',
            'country' => 'Perú',
            'image' => '4.jpg',
            'comment' => 'Comentario 4',
            'birthdate' => '1994/08/04'
        ]);

        Patient::create([
            'name' => 'Esteban',
            'surname' => 'Broncales Gago',
            'address' => 'Av. El Sol',
            'city' => 'Ica',
            'country' => 'Perú',
            'image' => '5.jpg',
            'comment' => 'Comentario 5',
            'birthdate' => '1994/08/05'
        ]);

        Patient::create([
            'name' => 'Jaime',
            'surname' => 'Gomez Castro',
            'address' => 'Av. Los Warys',
            'city' => 'Loreto',
            'country' => 'Perú',
            'image' => '6.jpg',
            'comment' => 'Comentario 6',
            'birthdate' => '1994/08/06'
        ]);

        Patient::create([
            'name' => 'Richard',
            'surname' => 'Gonzales Hernandez',
            'address' => 'Av. Hipólito Unane',
            'city' => 'La Libertad',
            'country' => 'Perú',
            'image' => '7.jpg',
            'comment' => 'Comentario 7',
            'birthdate' => '1994/08/07'
        ]);

        Patient::create([
            'name' => 'Carlos',
            'surname' => 'Santos Perez',
            'address' => 'Av. Los Húsares',
            'city' => 'Cajamarca',
            'country' => 'Perú',
            'image' => '8.jpg',
            'comment' => 'Comentario 8',
            'birthdate' => '1994/08/08'
        ]);

        Patient::create([
            'name' => 'Pedro',
            'surname' => 'Rojas Hernandez',
            'address' => 'Av. Los Tulipanes',
            'city' => 'Lima',
            'country' => 'Perú',
            'image' => '9.jpg',
            'comment' => 'Comentario 9',
            'birthdate' => '1994/08/09'
        ]);

    }
}
