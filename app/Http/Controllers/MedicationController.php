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
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del medicamento.']);

        if($request->get('component') == null OR $request->get('component') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el principio activo del medicamento.']);

        if($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripción del medicamento.']);

        if ( strlen($request->get('name'))<4 )
            return response()->json(['error' => true, 'message' => 'El nombre del medicamento debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('component'))<4 )
            return response()->json(['error' => true, 'message' => 'El principio activo del medicamento debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('description'))<4 )
            return response()->json(['error' => true, 'message' => 'La descripción del medicamento debe tener mínimo 3 caracteres.']);


        $medication = Medication::create([
            'trade_name' => $request->get('name'),
            'active_component' => $request->get('component'),
            'description' => $request->get('description')
        ]);
        if( $request->file('image') )
        {
            $path = public_path().'/medication/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $medication->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $medication->image = $fileName;
        }
        else
            $medication->image = '0.jpg';

        $medication->save();

        return response()->json(['error' => false, 'message' => 'Medicamento registrado correctamente']);
    }

    public function edit( Request $request )
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del medicamento.']);
        
        if($request->get('component') == null OR $request->get('component') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el principio activo del medicamento.']);

        if($request->get('description') == null OR $request->get('description') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la descripción del medicamento.']);
        
        if ( strlen($request->get('name'))<4 )
            return response()->json(['error' => true, 'message' => 'El nombre del medicamento debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('component'))<4 )
            return response()->json(['error' => true, 'message' => 'El principio activo del medicamento debe tener mínimo 3 caracteres.']);

        if ( strlen($request->get('description'))<4 )
            return response()->json(['error' => true, 'message' => 'La descripción del medicamento debe tener mínimo 3 caracteres.']);
        
        $medication = Medication::find( $request->get('id') );
        $medication->trade_name = $request->get('name');
        $medication->active_component = $request->get('component');
        $medication->description = $request->get('description');

        if( $request->file('image') )
        {
            $path = public_path().'/medication/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $medication->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $medication->image = $fileName;
        }

        $medication->save();

        return response()->json(['error' => false, 'message' => 'Medicamento modificado correctamente']);
    }

    public function delete( Request $request )
    {
        $medicamento = Medication::find($request->get('id'));

        if($medicamento == null)
            return response()->json(['error' => true, 'message' => 'No existe el medicamento especificado.']);

        $medication = Medication::find($request->get('id'));
        $medication->delete();

        return response()->json(['error' => false, 'message' => 'Medicamento eliminado correctamente']);
        
    }
}
