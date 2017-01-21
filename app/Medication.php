<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease');
    }

    public function rule_recommendations()
    {
        return $this->hasMany('App\RuleRecommendation');
    }
}
