<?php

namespace App\Http\Controllers;

use App\Factor;
use App\Factors;
use App\Http\Requests;
use App\Others;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FactorController extends Controller
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
    }

    public function postFactor(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del antecedente']);

        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del antecedente']);


        $symptom = Factor::create([
            'name' => $request->get('name'),
            'descripcion' => $request->get('description')
        ]);

        if( $request->file('image') )
        {
            $path = public_path().'/factor/images';
            if($request->get('oldImage') !='algo.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $symptom->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $symptom->imagen = $fileName;
        }
        else
            $symptom->imagen = 'algo.jpg';

        $symptom->save();

        return response()->json(['error' => false, 'message' => 'Antecedente registrado correctamente']);

    }

    public function putSymptom(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del síntoma']);
        
        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripcion del síntoma']);

        $symptom = Symptom::find( $request->get('id') );
        $symptom->name = $request->get('name');
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

        return response()->json(['error' => false, 'message' => 'Síntoma modificado correctamente']);
    }

    public function deleteSymptom(Request $request)
    {
        $symptom = Symptom::find($request->get('id'));

        if($symptom == null)
            return response()->json(['error' => true, 'message' => 'No existe el síntoma especificado.']);

        $symptom = Symptom::find($request->get('id'));
        $symptom->delete();

        return response()->json(['error' => false, 'message' => 'Síntoma eliminado correctamente.']);

    }

}
