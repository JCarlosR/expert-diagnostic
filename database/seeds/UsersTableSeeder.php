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
            'name' => 'Edilberto Soles',
            'email' => 'edilberto0905@gmail.com',
            'password' => bcrypt('3015')
        ]);

        User::create([
            'name' => 'Alejandro Correa',
            'email' => 'joryes1894@gmail.com',
            'password' => bcrypt('123456')
        ]);


    }
}
