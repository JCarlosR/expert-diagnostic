<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::orderby('name','asc')->paginate(3);
        return view('diseases.index')->with(compact('diseases'));
    }
    
    public function store( Request $request )
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        if ( strlen($request->get('name'))<4 )
            return response()->json(['error' => true, 'message' => 'El nombre de la enfermedad debe tener mínimo 3 caracteres']);

        if ( strlen($request->get('name'))<1 )
            return response()->json(['error' => true, 'message' => 'Es obligatorio ingresar el nombre de la enfermedad']);

        $disease_test = Disease::where('name',$request->get('name'))->first();

        if($disease_test != null)
            return response()->json(['error' => true, 'message' => 'Ya existe una enfermedad registrada con ese nombre']);

        $pos = 0;
        $string = $request->get('video');

        for( $i=0;$i<strlen($string); $i++)
            if( substr($string,$i,1) == '=')
                $pos=$i;

        $ulr_part = substr($string,$pos+1,strlen($string)-$pos);

        $disease = Disease::create([
            'name'=>$request->get('name'),
            'video'=>'https://www.youtube.com/embed/'.$ulr_part,
            'description'=>$request->get('description')
        ]);

        if( $request->file('image') )
        {
            $path = public_path().'/diseases/images';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $disease->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $disease->image = $fileName;
        }
        else
            $disease->image = '0.png';

        $disease->save();

        return response()->json(['error' => false, 'message' => 'Enfermedad registrada correctamente']);
    }

    public function edit( Request $request )
    {
        $validator = Validator::make($request->all(), [ 'image'=>'image' ]);

        if ( $validator->fails() )
            return response()->json(['error' => true, 'message' => 'Solo se permiten imágenes']);

        $disease_test = Disease::where('name',$request->get('name'))->first();

        if($disease_test != null)
            if( $disease_test->id != $request->get('id') )
                return response()->json(['error' => true, 'message' => 'Ya existe una enfermedad registrada con ese nombre']);

        if ( strlen($request->get('name'))<4 )
            return response()->json(['error' => true, 'message' => 'El nomnre de la enfermedad debe tener mínimo 3 caracteres']);

        if ( strlen($request->get('name'))<1 )
            return response()->json(['error' => true, 'message' => 'Es obligatorio ingresar el nombre de la enfermedad']);

        if ( strlen($request->get('video'))<1 )
            return response()->json(['error' => true, 'message' => 'Es obligatorio ingresar el url del vídeo']);

        $disease = Disease::find( $request->get('id'));

        $flag = 0;
        $pos = 0;
        $string = $request->get('video');

        for( $i=0;$i<strlen($string); $i++)
            if( substr($string,$i,1) == '=')
                $flag = 1;

        if( $flag ==1 )
        {
            for ($i = 0; $i < strlen($string); $i++)
                if (substr($string, $i, 1) == '=')
                    $pos = $i;
            $ulr_part = substr($string, $pos + 1, strlen($string) - $pos);
            $disease->video = 'https://www.youtube.com/embed/'.$ulr_part;
        }else
            $disease->video = $string;

        $disease->name = $request->get('name');
        $disease->description = $request->get('description');

        if( $request->file('image') )
        {
            $path = public_path().'/diseases/images';
            if($request->get('oldImage') !='0.png' )
                File::delete($path.'/'.$request->get('oldImage'));
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $disease->id . '.' . $extension;
            $request->file('image')->move($path, $fileName);
            $disease->image = $fileName;
        }
        $disease->save();

        return response()->json(['error' => false, 'message' => 'Enfermedad modificada correctamente']);
    }

    public function delete( $id )
    {
        $disease = Disease::find($id);
        $fileName = $disease->image;
        $path = public_path().'/diseases/images';

        if($disease->image != '0.png' )
            File::delete($path.'/'.$fileName);

        $disease->delete();

        return response()->json(['error' => false, 'message' => 'Enfermedad eliminada correctamente']);
    }
}