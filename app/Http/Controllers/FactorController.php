<?php

namespace App\Http\Controllers;

use App\Factor;
use App\Http\Requests;
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

    public function postAntecedent(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del antecedente']);

        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del antecedente']);


        $antecedent = Factor::create([
            'name' => $request->get('name'),
            'descripcion' => $request->get('description'),
            'type' => 'A'
        ]);

        if( $request->file('image') )
        {
            $path = public_path().'/antecedente/images';
            if($request->get('oldImage') !='algo.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $antecedent->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $antecedent->imagen = $fileName;
        }
        else
            $antecedent->imagen = 'algo.jpg';

        $antecedent->save();

        return response()->json(['error' => false, 'message' => 'Antecedente registrado correctamente']);

    }

    public function putAntecedent(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del antecedent']);
        
        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripcion del antecedente']);

        $antecedent = Factor::find( $request->get('id') );
        $antecedent->name = $request->get('name');
        $antecedent->descripcion = $request->get('description');

        if( $request->file('image') )
        {
            $path = public_path().'/antecedente/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $antecedent->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $antecedent->imagen = $fileName;
        }

        $antecedent->save();

        return response()->json(['error' => false, 'message' => 'Antecedente modificado correctamente']);
    }

    public function deleteAntecedent(Request $request)
    {
        $antecedent = Factor::find($request->get('id'));

        if($antecedent == null)
            return response()->json(['error' => true, 'message' => 'No existe el antecedente especificado.']);

        $antecedent = Factor::find($request->get('id'));
        $antecedent->delete();

        return response()->json(['error' => false, 'message' => 'Antecedente eliminado correctamente.']);

    }

}
