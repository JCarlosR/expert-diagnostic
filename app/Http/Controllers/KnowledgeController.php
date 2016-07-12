<?php

namespace App\Http\Controllers;

use App\Disease;
use App\DiseaseMedication;
use App\DiseaseSymptom;
use App\Http\Requests;
use App\Medication;
use App\Patient;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KnowledgeController extends Controller
{
    public function index()
    {
        $diseases = Disease::orderBy('id', 'asc')->paginate(10);
        //dd($patients);
        return view('knowledge.index')->with(compact('diseases'));;
    }

    public function getAssign($id)
    {
        $details = DiseaseSymptom::where('disease_id',$id)->get();
        $array = $details->toArray();
        $array2 = [];
        //dd($array);
        foreach($array as $k => $detail) {
            $symptom = Symptom::find($detail['symptom_id']);
            $array[$k]['symptom_id'] = $detail['symptom_id'];
            $array[$k]['name'] = $symptom->name;
            $array[$k]['descripcion'] = $symptom->descripcion;
            $array[$k]['imagen'] = $symptom->imagen;
        }
        //dd($array);
        $symptoms = Symptom::all();
        foreach ($symptoms as $sympt) {
            if( !$this->encontrado($sympt->id, $array) )
                array_push($array2, $sympt->toArray());
        }
        //dd($array2);
        $data['asignados'] = $array;
        $data['no_asignados'] = $array2;
        //dd($data);
        return $data;
    }

    public function getAssignMed($id)
    {
        $details = DiseaseMedication::where('disease_id',$id)->get();
        $array = $details->toArray();
        $array2 = [];
        //dd($array);
        foreach($array as $k => $detail) {
            $medication = Medication::find($detail['medication_id']);
            $array[$k]['medication_id'] = $detail['medication_id'];
            $array[$k]['trade_name'] = $medication->trade_name;
            $array[$k]['descripcion'] = $medication->description;
            $array[$k]['imagen'] = $medication->image;
        }
        //dd($array);
        $medications = Medication::all();
        foreach ($medications as $medicat) {
            if( !$this->encontrado2($medicat->id, $array) )
                array_push($array2, $medicat->toArray());
        }
        //dd($array2);
        $data['asignados'] = $array;
        $data['no_asignados'] = $array2;
        //dd($data);
        return $data;
    }

    protected function encontrado2($buscado, $array) {
        for ($i=0; $i<sizeof($array); ++$i)
            if ($array[$i]['medication_id'] == $buscado)
                return true;
        return false;
    }

    protected function encontrado($buscado, $array) {
        for ($i=0; $i<sizeof($array); ++$i)
            if ($array[$i]['symptom_id'] == $buscado)
                return true;
        return false;
    }

    public function getAssignSymptom($disease, $symptom){
        $enfermedad = Disease::find($disease);
        $enfermedad->symptoms()->attach($symptom);
    }

    public function getNotAssignSymptom($disease, $symptom){
        $enfermedad = Disease::find($disease);
        $enfermedad->symptoms()->detach($symptom);
    }

    public function getAssignMedication($disease, $medication){
        $enfermedad = Disease::find($disease);
        $enfermedad->medications()->attach($medication);
    }

    public function getNotAssignMedication($disease, $medication){
        $enfermedad = Disease::find($disease);
        $enfermedad->medications()->detach($medication);
    }

}
