<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuleRecommendation extends Model
{
    protected $fillable = [
        'rule_id', 'medication_id'
    ];
}
