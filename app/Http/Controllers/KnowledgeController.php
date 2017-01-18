<?php

namespace App\Http\Controllers;

use App\Disease;
use App\DiseaseMedication;
use App\DiseaseSymptom;
use App\Factor;
use App\Http\Requests;
use App\Medication;
use App\Patient;
use App\Rule;
use App\RuleFactor;
use App\RuleRecommendation;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class KnowledgeController extends Controller
{
    public function index()
    {
        $diseases = Disease::orderBy('id', 'asc')->paginate(4);
        //dd($patients);
        return view('knowledge.index')->with(compact('diseases'));
    }

    public function newRule()
    {

        return view('knowledge.newRule');
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

    public function getAssignRule($diseaseId){
        $disease = Disease::find($diseaseId);
        $antecedents = Factor::where('type', 'A')->lists('name')->toJson();
        $symptoms = Factor::where('type', 'S')->lists('name')->toJson();
        $others = Factor::where('type', 'O')->lists('name')->toJson();

        return view('knowledge.newRule')->with(compact('disease', 'antecedents', 'symptoms', 'others'));
    }

    public function postNewRule(Request $request){
        $factores = json_decode($request->get('factores'));
        $recomendaciones = json_decode($request->get('recomendaciones'));
        $peso = json_decode($request->get('peso'));
        $enfermedad = json_decode($request->get('enfermedad'));
        //dd($peso);
        if (sizeof($factores)==0)
        {
            return response()->json(['error' => true, 'message' => 'Se debe especificar factores a guardar.']);
        }

        if (sizeof($recomendaciones)==0)
        {
            return response()->json(['error' => true, 'message' => 'Se debe especificar recomendaciones a guardar.']);
        }

        if($enfermedad=="")
        {
            return response()->json(['error' => true, 'message' => 'Se debe especificar la enfermedad.']);
        }
        if($peso=="")
        {
            return response()->json(['error' => true, 'message' => 'Se debe especificar el peso de la regla.']);
        }

        $rule = Rule::where('disease_id', $enfermedad)->where('percentage', $peso)->where('enable', 1)->first();

        if ($rule)
        {
            return response()->json(['error' => true, 'message' => 'Ya existe una regla para la misma enfermedad con el mismo peso.']);
        }

        // Primero guardar la regla (emfermedad y porcentaje)
        $regla = Rule::create([
            'disease_id' => $enfermedad,
            'percentage' => $peso,
            'enable' => 1
        ]);

        foreach ($factores as $factor)
        {
            RuleFactor::create([
                'rule_id' => $regla->id,
                'factor_id' => $factor->id
            ]);
        }

        for ($i=0; $i<sizeof($recomendaciones); ++$i)
        {
            RuleRecommendation::create([
                'rule_id' => $regla->id,
                'medication_id' => $recomendaciones[$i]
            ]);
        }

        return response()->json(['error' => false, 'message' => 'Se ha registrado correctamente la regla de conocimiento']);
    }

    public function getRules($disease){
        $rules = Rule::where('disease_id', $disease)->where('enable', 1)->with('diseases')->get();
        //dd($rules);
        return $rules;
    }

    public function postDeleteRule(Request $request){
        //dd($request->get('nombreEliminar'));
        $rule = Rule::find($request->get('id'));

        if($rule == null)
            return response()->json(['error' => true, 'message' => 'No existe la regla de conocimiento especificada.']);

        $rule->enable = 0;
        $rule->save();

        return response()->json(['error' => false, 'message' => 'Regla de conocimiento eliminada correctamente']);

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
