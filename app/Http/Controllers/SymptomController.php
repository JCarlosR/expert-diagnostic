<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Sintoma;
use Illuminate\Http\Request;

class SymptomController extends Controller
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
        $v = 0;
        $sintomas = Sintoma::All();

        return view('layouts.symptom')->with(compact(['sintomas', 'v']));
    }

    public function postSymptom(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255|min:5'
        ]);

        // Luego hacer más complejo con ctrl de versiones para el perfil de trab

        $symptom = Sintoma::create([
            'descripcion' => $request->get('description')
        ]);

        return response()->json($symptom);
    }

    public function putSkill(Request $request)
    {
        $this->validate($request, [
            'id' => 'exists:skills',
            'name' => 'required|max:55|unique:skills,name,'.$request->get('id').',id',
            'description' => 'required|max:255|min:5'
        ]);

        $skill = Skill::find($request->get('id'));
        $skill->name = $request->get('name');
        $skill->description = $request->get('description');
        $skill->save();

        return response()->json($skill);
    }

    public function deleteSkill(Request $request)
    {
        $this->validate($request, [
            'id' => 'exists:skills'
        ]);

        $skill = Skill::find($request->get('id'));
        $skill->delete();

        return response()->json($skill);
    }

}
