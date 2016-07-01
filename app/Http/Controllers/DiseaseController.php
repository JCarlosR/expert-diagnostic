<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;

use App\Http\Requests;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::paginate(4);
        return view('diseases.index')->with(compact('diseases'));
    }

    public function create()
    {
        return view('diseases.create');
    }
}
