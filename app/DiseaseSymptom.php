<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseSymptom extends Model
{
    protected $table = 'disease_symptom';
    protected $fillable = ['disease_id','symptom_id'];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease', 'id');
    }

    public function symptoms()
    {
        return $this->belongsToMany('App\Symptom', 'id');
    }
}
