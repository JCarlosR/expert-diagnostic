<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// patient routes
Route::group(['middleware' => 'auth'], function () {

    Route::get('/pacientes', 'PatientController@index');
    Route::get('/pacientes/registrar', 'PatientController@create');
    Route::post('/pacientes/registrar', 'PatientController@store');
    Route::post('/pacientes/modificar', 'PatientController@edit');
    Route::post('/pacientes/eliminar', 'PatientController@delete');


// Symptom routes

// Medication routes

// Disease routes
    Route::get('enfermedades', 'DiseaseController@index');
    Route::get('enfermedad/nueva', 'DiseaseController@create');
    Route::post('enfermedad/registrar', 'DiseaseController@store');
    Route::post('enfermedad/editar', 'DiseaseController@edit');
    Route::post('enfermedad/eliminar', 'DiseaseController@delete');

// Diagnostic routes
});
