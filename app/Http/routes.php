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

Route::group( [ 'middleware' => ['auth'] ], function () {

    Route::group(['prefix' => 'info'], function () {
        Route::get('/', ['as' => 'getInfo', 'uses' => 'ProfileController@register']);
        Route::post('/addKot', ['as' => 'addKot', 'uses' => 'KotController@addKot']);
    });


    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', ['as' => 'getProfile', 'uses' => 'ProfileController@getProfile']);
                Route::group(['prefix' => 'calendar'], function () {
                Route::get('/{id}', ['as' => 'calendar', 'uses' => 'CalendarController@Calendar']);
                Route::post('/reserve', ['as' => 'reserve', 'uses' => 'CalendarController@reserve']);
                Route::get('cancel/{id}', ['as' => 'cancel', 'uses' => 'CalendarController@cancel']);
            });
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/',['as'=>'realProfile',function(){

                return view('profile.realProfile');
        }]);
        Route::post('/add', ['as' => 'addInfo', 'uses' => 'ProfileController@addInfo']);
        Route::post('/add2', ['as' => 'addInfo2', 'uses' => 'ProfileController@addInfo2']);
        Route::post('/edit/post', ['as' => 'editpost', 'uses' => 'ProfileController@addInfo2']);
        Route::post('/info', ['as' => 'info', 'uses' => 'ProfileController@addInfo']);
        Route::get('/edit/', ['as' => 'editPicture', 'uses' => 'ProfileController@getedit']);
        Route::get('/crop', ['as' => 'crop', function () {
            return View('profile.functions.crop')->with('image', 'img/users/' . Session::get('image'));
        }]);
        Route::post('/postcrop', ['as' => 'postCrop', 'uses' => 'PhotoController@postCrop']);
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'admin', 'uses' => 'KotController@admin']);
        Route::get('/accept/{id}', ['as' => 'accept', 'uses' => 'KotController@accept']);
        Route::get('/decline/{id}', ['as' => 'decline', 'uses' => 'KotController@decline']);
        Route::get('/broken/{id}', ['as' => 'broken', 'uses' => 'KotController@broken']);
        Route::get('/edit/{id}', ['as' => 'editName', 'uses' => 'KotController@getedit']);
        Route::post('/edit/', ['as' => 'editDevice', 'uses' => 'KotController@editDevice']);
        Route::post('/addDevice', ['as' => 'addDevice', 'uses' => 'KotController@addDevice']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'KotController@deleteHabitant']);
    });



    Route::get('/stats', ['as' => 'stats', 'uses' => 'HomeController@stats']);

    route::get('/send', 'HomeController@send');

    route::get('/mail', function () {
        return view('mail.mailstyle');
    });
});

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::get('shower/{device_id}/{state}', 'ApiController@showerGet');
    Route::get('state/{koten_id}', 'ApiController@changeState');
    Route::get('calstate/{device_id}', 'ApiController@changecalState');
});
