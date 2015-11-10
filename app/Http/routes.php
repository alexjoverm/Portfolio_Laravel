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
    return view('public.projects.index');
});


Route::group(['prefix' => 'api'], function()
{
    Route::get('authenticate', ['middleware' => 'jwt.auth', 'uses' => 'Auth\TokenBasedController@index']);
    Route::post('authenticate', 'Auth\TokenBasedController@authenticate');
});