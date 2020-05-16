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

Route::get('/', 'AdController@getAllAds');

Route::post('/test', 'PlaceController@test');
Route::post('/getSchemaById', 'PlaceController@getSchemaById');

Route::get('/editor', 'EditorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function (){
    Route::get('/myAds', 'AdController@getUserAds')->name('my-ads');
    Route::get('/createAd',function () {
        echo 'Создание объявления';
    })->name('create-ad');
});
Route::post('/filter', function (){
    echo 'Romchik detected';
})->name('filter');


Route::get('/ad/{id}', function ($id) {
    echo $id;
});


