<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Patient routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/pacientes', 'PatientController@index');
    Route::post('/pacientes/registrar', 'PatientController@store');
    Route::post('/pacientes/modificar', 'PatientController@edit');
    Route::post('/pacientes/eliminar', 'PatientController@delete');

// symptom routes
Route::get('symptom', 'SymptomController@index');
Route::post('/symptom/registrar', 'SymptomController@postSymptom');
Route::post('/symptom/modificar', 'SymptomController@putSymptom');
Route::post('/symptom/eliminar', 'SymptomController@deleteSymptom');

// Medication routes
    Route::get('/medicamentos', 'MedicationController@index');
    Route::post('/medicamentos/registrar', 'MedicationController@store');
    Route::post('/medicamentos/modificar', 'MedicationController@edit');
    Route::post('/medicamentos/eliminar', 'MedicationController@delete');

// Disease routes
    Route::get('enfermedades', 'DiseaseController@index');
    Route::get('enfermedad/nueva', 'DiseaseController@create');
    Route::post('enfermedad/registrar', 'DiseaseController@store');
    Route::post('enfermedad/modificar', 'DiseaseController@edit');
    Route::get('enfermedad/eliminar/{id}', 'DiseaseController@delete');

// Diagnostic routes
});
