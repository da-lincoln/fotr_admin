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

Route::get('/', function () {
    return view('home');
});

// Send to station page where only data from location matching name is shown


Route::get('/login', function (){
    return view('login');
});

Route::get('/station','StationsController@index');
Route::get('/station/new','StationsController@create');
