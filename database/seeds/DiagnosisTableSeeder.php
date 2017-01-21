<?php

use App\Rule;
use App\RuleFactor;
use Illuminate\Database\Seeder;

class DiagnosisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DENGUE HEMORRÁGICO
        Rule::create([
            'disease_id'=>1,
            'porcentage'=>90
        ]);

        //ZIKA
        Rule::create([
            'disease_id'=>4,
            'porcentage'=>95
        ]);

        //CHIKUNGUNYA
        Rule::create([
            'disease_id'=>3,
            'porcentage'=>99.9
        ]);

        // DENGUE HEMORRÁGICO 90%
        RuleFactor::create([
            'rule_id'=>1,
            'factor_id'=>5
        ]);
        RuleFactor::create([
            'rule_id'=>1,
            'factor_id'=>8
        ]);
        RuleFactor::create([
            'rule_id'=>1,
            'factor_id'=>9
        ]);
        RuleFactor::create([
            'rule_id'=>1,
            'factor_id'=>1
        ]);
        RuleFactor::create([
            'rule_id'=>1,
            'factor_id'=>10
        ]);


        // ZIKA 99.9 %
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>7
        ]);
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>8
        ]);
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>9
        ]);
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>13
        ]);
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>14
        ]);
        RuleFactor::create([
            'rule_id'=>2,
            'factor_id'=>15
        ]);

        // ZIKA 99.9 %
        RuleFactor::create([
            'rule_id'=>3,
            'factor_id'=>6
        ]);
        RuleFactor::create([
            'rule_id'=>3,
            'factor_id'=>8
        ]);
        RuleFactor::create([
            'rule_id'=>3,
            'factor_id'=>9
        ]);
        RuleFactor::create([
            'rule_id'=>3,
            'factor_id'=>12
        ]);
        RuleFactor::create([
            'rule_id'=>3,
            'factor_id'=>13
        ]);
    }
}
