<?php

Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

// Patient routes
    Route::get('/pacientes', 'PatientController@index');
    Route::post('/pacientes/registrar', 'PatientController@store');
    Route::post('/pacientes/modificar', 'PatientController@edit');
    Route::post('/pacientes/eliminar', 'PatientController@delete');

// Symptom routes
    Route::get('factores', 'SymptomController@index');
    Route::post('/symptom/registrar', 'SymptomController@postSymptom');
    Route::post('/symptom/modificar', 'SymptomController@putSymptom');
    Route::post('/symptom/eliminar', 'SymptomController@deleteSymptom');

// General Factor routes
    Route::get('/factor/nombre/{sintoma}', 'SymptomController@getSymptom');

// Antecedente routes
    Route::post('/antecedente/registrar', 'FactorController@postAntecedent');
    Route::post('/antecedente/modificar', 'FactorController@putAntecedent');
    Route::post('/antecedente/eliminar', 'FactorController@deleteAntecedent');

// Antecedente routes
    Route::post('/factor/registrar', 'OtherController@postFactor');
    Route::post('/factor/modificar', 'OtherController@putFactor');
    Route::post('/factor/eliminar', 'OtherController@deleteFactor');

// Medication routes
    Route::get('/recomendaciones', 'MedicationController@index');
    Route::post('/medicamentos/registrar', 'MedicationController@store');
    Route::post('/medicamentos/modificar', 'MedicationController@edit');
    Route::post('/medicamentos/eliminar', 'MedicationController@delete');

    Route::get('/recomendaciones/nombres', 'MedicationController@recomendationNames');
    Route::get('/recomendaciones/{name}', 'MedicationController@recomendationName');

// Disease routes
    Route::get('enfermedades', 'DiseaseController@index');
    Route::post('enfermedad/registrar', 'DiseaseController@store');
    Route::post('enfermedad/modificar', 'DiseaseController@edit');
    Route::get('enfermedad/eliminar/{id}', 'DiseaseController@delete');

// Diagnostic routes
    Route::get('diagnostico-{patientId}','DiagnosisController@index');
    Route::get('diagnostico/all','DiagnosisController@getAll');
    Route::get('diagnostico/enfermedades','DiagnosisController@diseases');
    Route::get('enfermedades/medicamentos/{disease_id}','DiagnosisController@medication');
    Route::get('enfermedades/{id}/sintomas','DiagnosisController@symptomsByDisease');
    
// Knowledge-base routes
    Route::get('conocimiento','KnowledgeController@index');
    Route::get('asignar/sintomas/{id}','KnowledgeController@getAssign');
    Route::get('asignar/sintoma/{disease}/{symptom}','KnowledgeController@getAssignSymptom');
    Route::get('desasignar/sintoma/{disease}/{symptom}','KnowledgeController@getNotAssignSymptom');
    
    Route::get('asignar/reglas/{disease}','KnowledgeController@getAssignRule');

    Route::get('asignar/medicamentos/{id}','KnowledgeController@getAssignMed');
    Route::get('asignar/medicamento/{disease}/{medication}','KnowledgeController@getAssignMedication');
    Route::get('desasignar/medicamento/{disease}/{medication}','KnowledgeController@getNotAssignMedication');

    Route::get('nueva-regla','KnowledgeController@newRule');

    // Ayuda en línea
    Route::get('ayuda','HomeController@helpExpert');

});

