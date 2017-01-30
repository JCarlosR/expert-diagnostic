<?php

use App\Factor;
use App\Rule;
use Illuminate\Database\Seeder;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rule::create([
            'disease_id'=>'1',
            'percentage'=>'99.9%.',
        ]);
        Rule::create([
            'disease_id'=>'1',
            'percentage'=>'95%.',
        ]);
        Rule::create([
            'disease_id'=>'1',
            'percentage'=>'90%.',
        ]);
        Rule::create([
            'disease_id'=>'1',
            'percentage'=>'80%.',
        ]);

        Rule::create([
            'disease_id'=>'2',
            'percentage'=>'99.9%.',
        ]);
        Rule::create([
            'disease_id'=>'2',
            'percentage'=>'95%.',
        ]);
        Rule::create([
            'disease_id'=>'2',
            'percentage'=>'90%.',
        ]);
        Rule::create([
            'disease_id'=>'2',
            'percentage'=>'80%.',
        ]);

        Rule::create([
            'disease_id'=>'3',
            'percentage'=>'99.9%.',
        ]);
        Rule::create([
            'disease_id'=>'3',
            'percentage'=>'95%.',
        ]);
        Rule::create([
            'disease_id'=>'3',
            'percentage'=>'90%.',
        ]);
        Rule::create([
            'disease_id'=>'3',
            'percentage'=>'80%.',
        ]);

        Rule::create([
            'disease_id'=>'4',
            'percentage'=>'99.9%.',
        ]);
        Rule::create([
            'disease_id'=>'4',
            'percentage'=>'95%.',
        ]);
        Rule::create([
            'disease_id'=>'4',
            'percentage'=>'90%.',
        ]);
        Rule::create([
            'disease_id'=>'4',
            'percentage'=>'80%.',
        ]);
    }
}
