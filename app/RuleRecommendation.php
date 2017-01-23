<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuleRecommendation extends Model
{
    protected $fillable = [
        'rule_id', 'medication_id'
    ];

    public function rules()
    {
        return $this->belongsTo('App\Rule', 'rule_id');
    }

    public function recommendations()
    {
        return $this->belongsTo('App\Medication', 'medication_id');
    }
}
