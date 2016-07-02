<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Patient routes

// Symptom routes
Route::get('/symptom', 'SymptomController@index');
Route::post('/registrar/symptom', 'SymptomController@postSymptom');
Route::put('/modificar/symptom', 'SymptomController@putSymptom');
Route::post('/eliminar/symptom', 'SymptomController@deleteSymptom');

// Medication routes

// Disease routes

// Diagnostic routes
