<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Ramos',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123')
        ]);
        User::create([
            'name' => 'Edilberto Soles',
            'email' => 'edilberto0905@gmail.com',
            'password' => bcrypt('3015')
        ]);

        User::create([
            'name' => 'Jorge Gonzales',
            'email' => 'joryes1894@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Miguel Juarez',
            'email' => 'mjuarez.mj3@gmail.com',
            'password' => bcrypt('123123')
        ]);

    }
}
