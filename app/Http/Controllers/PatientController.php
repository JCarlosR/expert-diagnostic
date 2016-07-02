<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('id', 'asc')->paginate(5);
        //dd($patients);
        return view('patient.index')->with(compact('patients'));;
    }

    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del paciente']);

        if ($request->get('surname') == null OR $request->get('surname') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el apellido del paciente']);

        if($request->get('address') == null OR $request->get('address') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la dirección del paciente']);

        if($request->get('city') == null OR $request->get('city') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la ciudad del paciente']);

        if($request->get('country') == null OR $request->get('country') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el país del paciente']);

        if ( strlen($request->get('name'))<3 )
            return response()->json(['error' => true, 'message' => 'El nombre del paciente debe tener como mínimo 3 caracteres']);

        if ( strlen($request->get('surname'))<4 )
            return response()->json(['error' => true, 'message' => 'El apellido del paciente debe tener como mínimo 3 caracteres']);

        if ( strlen($request->get('address'))<4 )
            return response()->json(['error' => true, 'message' => 'La dirección del paciente debe tener como mínimo 3 caracteres']);

        if ( strlen($request->get('city'))<3 )
            return response()->json(['error' => true, 'message' => 'La ciudad del paciente debe tener como mínimo 2 caracteres']);

        if ( strlen($request->get('country'))<3 )
            return response()->json(['error' => true, 'message' => 'El país del paciente debe tener como mínimo 2 caracteres']);

        $patient = Patient::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'comment' => $request->get('comment'),
            'birthdate' => $request->get('birthdate')
        ]);
        if( $request->file('image') )
        {
            $path = public_path().'/patient/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $patient->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $patient->image = $fileName;
        }
        else
            $patient->image = '0.jpg';

        $patient->save();

        return response()->json(['error' => false, 'message' => 'Paciente registrado correctamente']);
    }

    public function edit( Request $request )
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ($request->get('name') == null OR $request->get('name') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el nombre del paciente']);

        if ($request->get('surname') == null OR $request->get('surname') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el apellido del paciente']);

        if($request->get('address') == null OR $request->get('address') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la dirección del paciente']);

        if($request->get('city') == null OR $request->get('city') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar la ciudad del paciente']);

        if($request->get('country') == null OR $request->get('country') == "")
            return response()->json(['error' => true, 'message' => 'Es necesario ingresar el país del paciente']);

        if ( strlen($request->get('name'))<3 )
            return response()->json(['error' => true, 'message' => 'El nombre del paciente debe tener como mínimo 2 caracteres']);

        if ( strlen($request->get('surname'))<4 )
            return response()->json(['error' => true, 'message' => 'El apellido del paciente debe tener como mínimo 3 caracteres']);

        if ( strlen($request->get('address'))<4 )
            return response()->json(['error' => true, 'message' => 'La dirección del paciente debe tener como mínimo 3 caracteres']);

        if ( strlen($request->get('city'))<3 )
            return response()->json(['error' => true, 'message' => 'La ciudad del paciente debe tener como mínimo 2 caracteres']);

        if ( strlen($request->get('country'))<3 )
            return response()->json(['error' => true, 'message' => 'El país del paciente debe tener como mínimo 2 caracteres']);

        $patient = Patient::find( $request->get('id') );
        $patient->name = $request->get('name');
        $patient->surname = $request->get('surname');
        $patient->address = $request->get('address');
        $patient->city = $request->get('city');
        $patient->country = $request->get('country');
        $patient->comment = $request->get('comment');
        $patient->birthdate = $request->get('birthdate');

        if( $request->file('image') )
        {
            $path = public_path().'/patient/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $patient->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $patient->image = $fileName;
        }

        $patient->save();

        return response()->json(['error' => false, 'message' => 'Paciente modificado correctamente']);
    }

    public function delete( Request $request )
    {
        $paciente = Patient::find($request->get('id'));

        if($paciente == null)
            return response()->json(['error' => true, 'message' => 'No existe el paciente especificado.']);

        $patient = Patient::find($request->get('id'));
        $patient->delete();

        return response()->json(['error' => false, 'message' => 'Paciente eliminado correctamente.']);
        
    }
}
