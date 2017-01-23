<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuleFactor extends Model
{
    protected $fillable = [
        'rule_id', 'factor_id'
    ];

    public function rules()
    {
        return $this->belongsTo('App\Rule', 'rule_id');
    }

    public function factors()
    {
        return $this->belongsTo('App\Factor', 'factor_id');
    }
}
