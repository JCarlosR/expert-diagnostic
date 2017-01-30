<?php

use App\Factor;
use App\Rule;
use App\RuleFactor;
use App\RuleRecommendation;
use Illuminate\Database\Seeder;

class RuleMedicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disease 1
        RuleRecommendation::create([
            'rule_id'=>'1',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'1',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'1',
            'medication_id'=>'5',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'1',
            'medication_id'=>'6',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'1',
            'medication_id'=>'7',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'3',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'4',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'2',
            'medication_id'=>'6',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'10',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'3',
            'medication_id'=>'6',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'3',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'4',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'5',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'4',
            'medication_id'=>'6',
        ]);



        // Disease 2
        RuleRecommendation::create([
            'rule_id'=>'5',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'5',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'5',
            'medication_id'=>'3',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'5',
            'medication_id'=>'4',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'5',
            'medication_id'=>'8',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'6',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'6',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'6',
            'medication_id'=>'3',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'6',
            'medication_id'=>'4',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'6',
            'medication_id'=>'8',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'7',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'7',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'7',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'7',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'7',
            'medication_id'=>'10',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'1',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'2',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'3',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'4',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'5',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'8',
            'medication_id'=>'9',
        ]);


        // Disease 3
        RuleRecommendation::create([
            'rule_id'=>'9',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'9',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'9',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'9',
            'medication_id'=>'12',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'9',
            'medication_id'=>'13',
        ]);


        RuleRecommendation::create([
            'rule_id'=>'10',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'10',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'10',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'10',
            'medication_id'=>'12',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'10',
            'medication_id'=>'13',
        ]);

        RuleRecommendation::create([
            'rule_id'=>'11',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'11',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'11',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'11',
            'medication_id'=>'12',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'11',
            'medication_id'=>'13',
        ]);

        RuleRecommendation::create([
            'rule_id'=>'12',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'12',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'12',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'12',
            'medication_id'=>'12',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'12',
            'medication_id'=>'13',
        ]);


        // Disease 4
        RuleRecommendation::create([
            'rule_id'=>'13',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'13',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'13',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'13',
            'medication_id'=>'13',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'13',
            'medication_id'=>'14',
        ]);

        RuleRecommendation::create([
            'rule_id'=>'14',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'14',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'14',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'14',
            'medication_id'=>'13',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'14',
            'medication_id'=>'14',
        ]);

        RuleRecommendation::create([
            'rule_id'=>'15',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'15',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'15',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'15',
            'medication_id'=>'13',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'15',
            'medication_id'=>'14',
        ]);

        RuleRecommendation::create([
            'rule_id'=>'16',
            'medication_id'=>'8',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'16',
            'medication_id'=>'9',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'16',
            'medication_id'=>'11',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'16',
            'medication_id'=>'13',
        ]);
        RuleRecommendation::create([
            'rule_id'=>'16',
            'medication_id'=>'14',
        ]);





    }
}
