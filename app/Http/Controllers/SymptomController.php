<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        $sintomas = Sintoma::orderBy('id', 'asc')->paginate(5);

        return view('layouts.symptom')->with(compact(['sintomas']));
    }

    public function postSymptom(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del paciente']);


        $symptom = Sintoma::create([
            'descripcion' => $request->get('description')
        ]);

        if( $request->file('image') )
        {
            $path = public_path().'/symptoms/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $symptom->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $symptom->imagen = $fileName;
        }
        else
            $symptom->imagen = '0.jpg';

        $symptom->save();

        return response()->json(['error' => false, 'message' => 'Paciente registrado correctamente']);

    }

    public function putSymptom(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del paciente']);

        $symptom = Sintoma::find( $request->get('id') );
        $symptom->descripcion = $request->get('description');

        if( $request->file('image') )
        {
            $path = public_path().'/symptoms/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $symptom->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $symptom->imagen = $fileName;
        }

        $symptom->save();

        return response()->json(['error' => false, 'message' => 'Paciente modificado correctamente']);
    }

    public function deleteSymptom(Request $request)
    {
        $this->validate($request, [
            'id' => 'exists:symptom'
        ]);

        $symptom = Sintoma::find($request->get('id'));
        $symptom->delete();

        return response()->json($symptom);
    }

}
