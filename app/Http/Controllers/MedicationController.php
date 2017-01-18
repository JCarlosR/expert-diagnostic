<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MedicationController extends Controller
{
    public function index()
    {
        $medications = Medication::orderBy('id', 'asc')->paginate(5);
        //dd($patients);
        return view('medication.index')->with(compact('medications'));;
    }

    public function store( Request $request )
    {
        if($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre de la recomendación.']);

        if($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripción de la recomendación.']);

        if ( strlen($request->get('name'))<3 )
            return response()->json(['error' => true, 'message' => 'El nombre de la descripción debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('description'))<3 )
            return response()->json(['error' => true, 'message' => 'La descripción de la recomendación debe tener mínimo 3 caracteres.']);


        $medication = Medication::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        $medication->save();

        return response()->json(['error' => false, 'message' => 'Recomendación registrada correctamente']);
    }

    public function edit( Request $request )
    {
        if($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre de la recomendación.']);

        if($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripción de la recomendación.']);
        
        if ( strlen($request->get('name'))<3 )
            return response()->json(['error' => true, 'message' => 'El nombre de la recomendación debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('description'))<3 )
            return response()->json(['error' => true, 'message' => 'La descripción de la recomendación debe tener mínimo 3 caracteres.']);
        
        $medication = Medication::find( $request->get('id') );
        $medication->name = $request->get('name');
        $medication->description = $request->get('description');

        $medication->save();

        return response()->json(['error' => false, 'message' => 'Recomendación modificado correctamente']);
    }

    public function delete( Request $request )
    {
        $recomendación = Medication::find($request->get('id'));

        if($recomendación == null)
            return response()->json(['error' => true, 'message' => 'No existe la recomendación especificada.']);

        $medication = Medication::find($request->get('id'));
        $medication->delete();

        return response()->json(['error' => false, 'message' => 'Recomendación eliminada correctamente']);
        
    }

    public function recomendationNames()
    {
        $medications = Medication::lists('name');
        return $medications;
    }

    public function recomendationName($name)
    {
        $medication = Medication::where('name',$name)->get(['id','name'])->first();
        if(  $medication== null )
            return ['success'=>'false','message'=>'No existe una recomendación con ese nombre, no puede ser agregada.'];
        return ['success'=>'true','data'=>$medication];
    }
}
