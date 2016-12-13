<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/',['uses'=>'PeticionesController@index','as'=>'index']);

Route::get('/interes/compuesto',['uses'=>'PeticionesController@formInteresCompuesto','as'=>'interes']);
Route::post('/interes/compuesto',['uses'=>'PeticionesController@postInteresCompuesto','as'=>'interes.post']);

Route::get('/anualidades',['uses'=>'PeticionesController@formAnualidades','as'=>'anualidades']);
Route::post('/anualidades',['uses'=>'PeticionesController@postAnualidades','as'=>'anualidades.post']);

Route::get('/amortizacion',['uses'=>'PeticionesController@formAmortizacion','as'=>'amortizacion']);
Route::post('/amortizacion',['uses'=>'PeticionesController@postAmortizacion','as'=>'amortizacion.post']);

Route::get('/gradientes',['uses'=>'PeticionesController@formGradientes','as'=>'gradientes']);
Route::post('/gradientes',['uses'=>'PeticionesController@postGradientes','as'=>'gradientes.post']);
