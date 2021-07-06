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
    return view('welcome');
});

Route::get('/todoitems_show','\App\Http\Controllers\TodoitemsController@show');
Route::get('/todoitems_delete/{id}', '\App\Http\Controllers\TodoitemsController@destroy');
Route::get('/todoitems_create', '\App\Http\Controllers\TodoitemsController@create');
Route::post('/todoitems_submit', '\App\Http\Controllers\TodoitemsController@store');