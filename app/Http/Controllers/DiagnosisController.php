<?php

namespace App\Http\Controllers;

use App\Disease;
use App\DiseaseMedication;
use App\DiseaseSymptom;
use App\Factor;
use App\Http\Requests;
use App\Medication;
use App\Patient;
use App\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
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
    public function index( $patientId )
    {
        $patient = Patient::find($patientId);
        $patientName = $patient->surname.', '.$patient->name;
        $antecedents = Factor::where('type', 'A')->lists('name')->toJson();
        $symptoms = Factor::where('type', 'S')->lists('name')->toJson();
        $others = Factor::where('type', 'O')->lists('name')->toJson();

        return view('diagnosis.index')->with(compact('patientName', 'antecedents', 'symptoms', 'others'));
    }

    public function getAll(){
        $sintomas = Symptom::All();
        return $sintomas;
    }

    public function symptomsByDisease($id) {
        $disease = Disease::find($id);
        $symptom_ids = $disease->symptoms()->getRelatedIds();
        $data['disease_id'] = $id;
        $data['symptom_ids'] = $symptom_ids;
        return $data;
    }

    public function diseases(Request $request)
    {
        $patient_symptoms = json_decode( $request->get('symptoms') );

        if( count($patient_symptoms)==0 ) {
            $data['error'] = true;
            $data['message'] = 'Seleccione síntomas';
            return $data;
        }

        $disease_symptoms = DiseaseSymptom::where('symptom_id',$patient_symptoms[0])->get();
        if( count($disease_symptoms)==0 ) {
            $data['error'] = true;
            $data['message'] = 'No existe enfermedad con dichos síntomas';
            return $data;
        }

        // Diseases associated with the first symptom
        $array_diseases = [];
        foreach ($disease_symptoms as $disease_symptom)
            $array_diseases [] = $disease_symptom->disease_id;

        // Filtered diseases with all their symptoms
        $array_disease_symptoms = [];
        foreach ($array_diseases as $array_disease)
            $array_disease_symptoms[$array_disease] = $this->get_symptoms($array_disease);

        // Diseases associated with the selected symptoms
        $answers = [];
        $iterator = 0;
        foreach ($array_disease_symptoms as $array_disease_symptom) {
            if( $this->symptoms_in_disease( $array_disease_symptom,$patient_symptoms ) )
                $answers [] = $array_diseases[$iterator];
            $iterator++;
        }

        if (count($answers) == 0) {
            $data['error'] = true;
            $data['message'] = 'No existe enfemedad con dichos síntomas *';
            return $data;
        } else {
            $ids    = [];
            $names  = [];
            $images = [];
            $videos = [];
            $description = [];

            foreach ($answers as $answer) {
                $disease = Disease::find($answer);
                $ids    [] = $disease->id;
                $names  [] = $disease->name;
                $images [] = $disease->image;
                $videos [] = $disease->video;
                $description [] = $disease->description;
            }
            $data['error'] = false;
            $data['id']    = $ids;
            $data['name']  = $names;
            $data['image'] = $images;
            $data['video'] = $videos;
            $data['description'] = $description;
            return $data;
        }
    }

    public function get_symptoms($disease_id)
    {
        $array_symptoms = [];
        $diseases = DiseaseSymptom::where('disease_id',$disease_id)->get();
        foreach ($diseases as $disease)
            $array_symptoms [] =  $disease->symptom_id;
        return $array_symptoms;
    }

    public function symptoms_in_disease($symptoms,$patient_symptoms)
    {
        for( $i=0;$i<count($patient_symptoms);$i++ )
            if( !$this->inside_array($symptoms,$patient_symptoms[$i]) )
                return false;
        return true;
    }

    public function inside_array($array,$element)
    {
        for( $i=0;$i<count($array);$i++ )
            if( $array[$i] == $element )
                return true;
        return false;
    }

    public function medication( $disease_id )
    {
        $disease_medications = DiseaseMedication::where('disease_id',$disease_id)->get();
        $medic_result = [];

        foreach ($disease_medications as $disease_medication) {
            $medication_test = Medication::find($disease_medication->medication_id);
            $medic_result [] = $medication_test->trade_name.' - '.$medication_test->active_component;
        }

        if (count($medic_result) == 0)
            $data['error'] = true;
        else {
            $data['error'] = false;
            $data['medication'] = $medic_result;
        }

        return $data;
    }

    //  EXPERT SYSTEM MODIFIED

    public function factorNombresId($factorName)
    {
        $factor = Factor::where('name',$factorName)->get(['id','name'])->first();

        if(  $factor== null )
            return ['success'=>'false','message'=>'No existe una factor con ese nombre, no puede ser agregado.'];
        return ['success'=>'true','data'=>$factor];
    }

    public function forwardChaining( Request $request )
    {
        $datos = json_decode($request->factors);
        foreach ( $datos as $dato ) {

        }
    }

}
