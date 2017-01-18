<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuleFactor extends Model
{
    protected $fillable = [
        'rule_id', 'factor_id'
    ];
}
