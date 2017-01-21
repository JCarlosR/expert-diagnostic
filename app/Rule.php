<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'disease_id', 'percentage', 'enable'
    ];

    protected $appends = ['disease_name'];

    public function getDiseaseNameAttribute()
    {
        $diseaseId = $this->attributes['disease_id'];
        $disease = Disease::find($diseaseId);

        return $disease->name;
    }

    public function diseases()
    {
        return $this->belongsTo('App\Disease', 'disease_id');
    }

    public function rule_recommendations()
    {
        return $this->hasMany('App\RuleRecommendation', 'rule_id');
    }

    public function rule_factors()
    {
        return $this->hasMany('App\RuleFactor', 'rule_id');
    }
    
    

}
