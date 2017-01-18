<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = ['name','description','image','video'];

    public function symptoms()
    {
        return $this->belongsToMany('App\Symptom');
    }

    public function medications()
    {
        return $this->belongsToMany('App\Medication');
    }

}
