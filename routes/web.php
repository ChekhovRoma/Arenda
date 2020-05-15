<?php

use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
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
Route::get('form', 'FormController@create')->name('form.create');
Route::post('form', 'FormController@store')->name('form.store');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test', 'Place@test');
Route::post('/getSchemaById', 'Place@getSchemaById');

Route::get('/editor', 'EditorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
