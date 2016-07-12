<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseMedication extends Model
{
    protected $table = 'disease_medication';
    protected $fillable = ['disease_id','medication_id'];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease', 'id');
    }

    public function medications()
    {
        return $this->belongsToMany('App\Medication', 'id');
    }
}
