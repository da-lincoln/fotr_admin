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


Route::get('/', 'HomeController@index')->name('home');

// Send to station page where only data from location matching name is shown


//Route::get('/login', function (){ return view('login'); });

//Route::resource('/station','StationsController');

Route::get('/station/{name}','StationsController@index');
Route::get('/station/{name}/create','StationsController@create');
Route::post('/station/{name}','StationsController@store');
Route::get('/station/{station}/view','StationsController@show');
Route::get('station/{station}/edit','StationsController@edit');
Route::patch('/station/{station}','StationsController@update');
Route::get('/station/{station}/image', 'StationsController@getImage');
Route::delete('/station/{name}', 'StationsController@destroy');



Auth::routes();


