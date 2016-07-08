<?php
/**
 * Created by PhpStorm.
 * User: Juarez
 * Date: 01/07/2016
 * Time: 1:52
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'symptom';

    public $timestamps = false;

    protected $fillable = [ 'name', 'descripcion', 'imagen'];

    public function diseases()
    {
        return $this->belongsToMany('App\Disease');
    }

}