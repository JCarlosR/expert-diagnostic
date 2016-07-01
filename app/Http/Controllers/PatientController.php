<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('id', 'asc')->paginate(5);
        //dd($patients);
        return view('patient.index')->with(compact('patients'));;
    }
}
