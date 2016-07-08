<?php

namespace App\Http\Controllers;

use App\Disease;
use App\Http\Requests;
use App\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('diagnosis.index');
    }

    public function getAll(){
        $sintomas = Sintoma::All();
        return $sintomas;
    }

    public function diseases( $sintomas )
    {
        $string = '';
        $sintomas = str_replace(',', '', $sintomas);

        $string =Disease::where('');

        for( $i=0;$i< strlen($sintomas);$i++  )



        $sintomas = Sintoma::All();
        return $sintomas;
    }


}
