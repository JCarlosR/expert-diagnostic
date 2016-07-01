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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'component'=>'required|min:3',
            'description'=>'required|min:3',
            'image'=>'image'
        ],[
            'image.image'=>'Solo se permiten imágenes',
            'name.required'=>'Es necesario ingresar el nombre del medicamento',
            'component.required'=>'Es necesario ingresar el prinicipio activo del medicamento',
            'description.required'=>'Es necesario ingresar la descripción del medicamento',
            'name.min'=>'El nombre del medicamento debe tener mas de 3 caracteres',
            'description.min'=>'La descripción del medicamento debe tener mas de 3 caracteres',
            'component.min'=>'El prinicipio activo del medicamento debe tener mas de 3 caracteres'
        ]);

        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
            return redirect('medicamentos')
                ->withInput($request->all())
                ->with($data);
        }

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

        return redirect('medicamentos');
    }

    public function edit( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'component'=>'required|min:3',
            'description'=>'required|min:3',
            'image'=>'image'
        ],[
            'image.image'=>'Solo se permiten imágenes',
            'name.required'=>'Es necesario ingresar el nombre del medicamento',
            'component.required'=>'Es necesario ingresar el prinicipio activo del medicamento',
            'description.required'=>'Es necesario ingresar la descripción del medicamento',
            'name.min'=>'El nombre del medicamento debe tener mas de 3 caracteres',
            'description.min'=>'La descripción del medicamento debe tener mas de 3 caracteres',
            'component.min'=>'El prinicipio activo del medicamento debe tener mas de 3 caracteres'
        ]);

        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
            return redirect('medicamentos')
                ->withInput($request->all())
                ->with($data);
        }

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

        return response()->json(['error' => false, 'message' => 'Enfermedad modificada correctamente']);
    }

    public function delete( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'id' => 'exists:medications,id'
        ],[
            'id.exists' => 'El medicamento no puede ser eliminado porque no existe.'
        ]);
        //Validacion que no exista en otra tabla
        //$customer_ = Output::where('customer_id', $request->get('id'))->first();
        //dd($customer_);
        if ($validator->fails())
        {
            $data['errors'] = $validator->errors();
//            if( $customer_ != null )
//                $data['errors']->add("id", "No puede eliminar el cliente seleccionado, porque tiene salidas registradase.");

            return redirect('medicamentos')
                ->withInput($request->all())
                ->with($data);
        }
        $medication = Medication::find($request->get('id'));
        $medication->delete();

        return redirect('medicamentos');
        
    }
}
