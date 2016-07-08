<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseSymptom extends Model
{
    protected $fillable = ['disease_id','symptom_id'];

    public function disease()
    {
        return $this->belongsToMany('App\Disease', 'id');
    }

    public function symptomp()
    {
        return $this->belongsToMany('App\Sintoma', 'id');
    }
}
