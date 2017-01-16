<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'name', 'descripcion', 'imagen'];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease');
    }

}
