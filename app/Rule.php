<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'disease_id', 'percentage', 'enable'
    ];

    public function diseases()
    {
        return $this->belongsTo('App\Disease', 'disease_id');
    }

}
