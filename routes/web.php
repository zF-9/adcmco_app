<?php

use Illuminate\Support\Facades\Route;
use App\Agencies;

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
    //return view('welcome');
    return view('home_alternate');
});

Route::get('/test', function () {
    return view('home_alternate');
});

Route::get('/form', function () {
    return view('Form_surveilance');
});

Route::get('/proto', function () {
    $list_all = Agencies::all(['id_n', 'Nama_agency']);
    return view('agency_select', ['list'=>$list_all]);
});

//Route::get('/selected/{id}/{agency}', 'updateController@add_record');

Route::post('/selected','updateController@select_agency');
Route::post('/active_cases', 'updateController@update_active');
Route::post('/surveilance_cases', 'updateController@update_surveilance');

Route::get('/surveilance/{id}/{name}', 'updateController@surveilances');

Route::get('/debug/{id_a}', 'updateController@debug_page');
