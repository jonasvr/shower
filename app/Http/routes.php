<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'info'],function(){
    Route::get('/', ['as'=>'getInfo', 'uses' => 'ProfileController@register']);
    Route::post('/add', ['as'=>'addInfo', 'uses' => 'ProfileController@addInfo']);
    Route::post('/addKot', ['as'=>'addKot', 'uses' => 'KotController@addKot']);
});


Route::group(['prefix' => 'profile'], function(){
    Route::get('/', ['as'=>'getProfile', 'uses' => 'ProfileController@getProfile']);
    Route::post('/addDevice', ['as'=>'addDevice', 'uses' => 'KotController@addDevice']);
    Route::get('/accept/{id}', ['as'=>'accept', 'uses' => 'KotController@accept']);
    Route::get('/decline/{id}', ['as'=>'decline', 'uses' => 'KotController@decline']);
    Route::get('/delete/{id}', ['as'=>'delete', 'uses' => 'KotController@deleteHabitant']);
});


Route::group(['prefix' => 'api','middleware' => 'api'], function () {
    Route::get('shower/{device_id}/{state}', 'ApiController@showerGet');
});

Route::group(['prefix'=>'calendar'],function(){
    Route::get('/{id}',['as'=>'calendar','uses'=>'CalendarController@Calendar']);
    Route::post('/reserve',['as'=>'reserve','uses'=>'CalendarController@reserve']);
    Route::get('cancel/{id}',['as'=>'cancel','uses'=>'CalendarController@cancel']);
});
