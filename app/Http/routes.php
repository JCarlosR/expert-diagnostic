<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Patient routes

// Symptom routes

// Medication routes

// Disease routes
    Route::get('enfermedades', 'DiseaseController@index');
    Route::get('enfermedad/nueva', 'DiseaseController@create');

// Diagnostic routes
