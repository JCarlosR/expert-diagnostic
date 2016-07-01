<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'surname', 'address', 'city', 'country', 'comment', 'birthdate',
    ];

}
