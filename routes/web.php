<?php

use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
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

Route::post('users','FormController@getUsers');

Route::post('api-token-auth', 'FormController@authUser');

Route::post('form', 'FormController@store')->name('form.store');

Route::get('/', 'AdController@getAllAds')->name('main');
Route::post('/', 'AdController@filterAds')->name('filterAds');

Route::get('/places', 'PlaceController@getAllPlaces')->name('places');

Route::post('/fetchSchema', 'PlaceSchemaController@fetchSchema');
Route::post('/getSchemaById', 'PlaceController@getSchemaById');


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/myAds', 'AdController@getUserAds')->name('my-ads');

    Route::get('/createPlace', 'PlaceController@addPlace');

    Route::get('/createPlace', 'PlaceController@addPlace')->name('create');

    Route::post('/savePlace', 'PlaceController@savePlace')->name('place.save');
    Route::get('place/{id}', 'PlaceController@getPlace');
    Route::get('/editor/{id}', 'EditorController@index');
    Route::get('/addRooms/{id}', 'RoomController@addRooms');
    Route::post('/addRooms/{id}', 'RoomController@addRooms');
    Route::post('/saveRoom', 'RoomController@saveRoom');
    Route::post('/getInfoAboutRoom', 'RoomController@getIfExists');
});
Route::post('/filter', 'AdController@adScout')->name('filter');


Route::get('/ad/{id}', 'AdController@getAd');

Route::get('/place/{id}', 'PlaceController@getPlace');

Auth::routes();
