<?php

namespace App\Http\Controllers;

use App\Factor;
use App\Http\Requests;
use App\Other;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OtherController extends Controller
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
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del factor']);

        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del factor']);


        $factor = Factor::create([
            'name' => $request->get('name'),
            'descripcion' => $request->get('description'),
            'type' => 'O'
        ]);

        if( $request->file('image') )
        {
            $path = public_path().'/factor/images';
            if($request->get('oldImage') !='algo.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $factor->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $factor->imagen = $fileName;
        }
        else
            $factor->imagen = 'algo.jpg';

        $factor->save();

        return response()->json(['error' => false, 'message' => 'Factor registrado correctamente']);

    }

    public function putFactor(Request $request)
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del factor']);
        
        if ($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripcion del factor']);

        $factor = Factor::find( $request->get('id') );
        $factor->name = $request->get('name');
        $factor->descripcion = $request->get('description');

        if( $request->file('image') )
        {
            $path = public_path().'/factor/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $factor->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $factor->imagen = $fileName;
        }

        $factor->save();

        return response()->json(['error' => false, 'message' => 'Factor modificado correctamente']);
    }

    public function deleteFactor(Request $request)
    {
        $factor = Factor::find($request->get('id'));

        if($factor == null)
            return response()->json(['error' => true, 'message' => 'No existe el factor especificado.']);

        $factor = Factor::find($request->get('id'));
        $factor->delete();

        return response()->json(['error' => false, 'message' => 'Factor eliminado correctamente.']);

    }

}
