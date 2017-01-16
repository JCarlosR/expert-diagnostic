<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'name', 'descripcion', 'imagen'];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease');
    }

}
