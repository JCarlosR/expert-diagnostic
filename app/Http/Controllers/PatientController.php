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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname'=>'required|min:3',
            'address'=>'required|min:3',
            'city'=>'required|min:2',
            'country'=>'required|min:3',
            'image'=>'image'
        ],[
            'image.image'=>'Solo se permiten imágenes',
            'name.required'=>'Es necesario ingresar el nombre del paciente',
            'surname.required'=>'Es necesario ingresar el apellido del paciente',
            'address.required'=>'Es necesario ingresar la dirección del paciente',
            'city.required'=>'Es necesario ingresar la ciudad del paciente',
            'country.required'=>'Es necesario ingresar el país del paciente',
            'name.min'=>'El nombre del paciente debe tener mas de 3 caracteres',
            'surname.min'=>'El apellido del paciente debe tener mas de 3 caracteres',
            'address.min'=>'La dirección del paciente debe tener mas de 3 caracteres',
            'city.min'=>'La ciudad del paciente debe tener mas de 2 caracteres',
            'country.min'=>'El país del paciente debe tener mas de 3 caracteres'
        ]);

        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
            return redirect('pacientes')
                ->withInput($request->all())
                ->with($data);
        }

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

        return redirect('pacientes');
    }

    public function edit( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname'=>'required|min:3',
            'address'=>'required|min:3',
            'city'=>'required|min:2',
            'country'=>'required|min:3',
            'image'=>'image'
        ],[
            'image.image'=>'Solo se permiten imágenes',
            'name.required'=>'Es necesario ingresar el nombre del paciente',
            'surname.required'=>'Es necesario ingresar el apellido del paciente',
            'address.required'=>'Es necesario ingresar la dirección del paciente',
            'city.required'=>'Es necesario ingresar la ciudad del paciente',
            'country.required'=>'Es necesario ingresar el país del paciente',
            'name.min'=>'El nombre del paciente debe tener mas de 3 caracteres',
            'surname.min'=>'El apellido del paciente debe tener mas de 3 caracteres',
            'address.min'=>'La dirección del paciente debe tener mas de 3 caracteres',
            'city.min'=>'La ciudad del paciente debe tener mas de 2 caracteres',
            'country.min'=>'El país del paciente debe tener mas de 3 caracteres'
        ]);

        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
            return redirect('pacientes')
                ->withInput($request->all())
                ->with($data);
        }

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

        return redirect('pacientes');
    }

    public function delete( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'id' => 'exists:patients,id'
        ],[
            'id.exists' => 'El paciente no puede ser eliminado porque no existe.'
        ]);
        //Validacion que no exista en otra tabla
        //$customer_ = Output::where('customer_id', $request->get('id'))->first();
        //dd($customer_);
        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
//            if( $customer_ != null )
//                $data['errors']->add("id", "No puede eliminar el cliente seleccionado, porque tiene salidas registradase.");

            return redirect('pacientes')
                ->withInput($request->all())
                ->with($data);
        }
        $patient = Patient::find($request->get('id'));
        $patient->delete();

        return redirect('pacientes');
        
    }
}
