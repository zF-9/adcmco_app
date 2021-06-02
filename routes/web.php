<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::post('/selected_agency', 'updateController@select_agency');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('home_alternate');
});

Route::get('/form', function () {
    return view('Form_surveilance');
});

Route::get('/proto', function () {
    return view('agency_select');
});

//Route::get('/selected/{id}/{agency}', 'updateController@add_record');

Route::post('/selected','updateController@select_agency');
Route::post('/active_cases', 'updateController@update_active');
Route::post('/surveilance_cases', 'updateController@update_surveilance');

Route::get('/surveilance/{id}/{name}/{time}', 'updateController@surveilances');



