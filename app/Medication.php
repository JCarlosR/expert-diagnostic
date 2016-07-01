<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'active_component', 'trade_name', 'description', 'image',
    ];
}
