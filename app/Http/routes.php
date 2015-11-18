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
    Route::get('authenticate', ['middleware' => ['jwt.auth'/*, 'jwt.refresh'*/], 'uses' => 'Auth\TokenBasedController@index']);
    Route::get('invalidate', ['middleware' => 'jwt.auth', 'uses' => 'Auth\TokenBasedController@invalidate']);
    Route::post('authenticate', 'Auth\TokenBasedController@authenticate');
});



Route::get('dashboard', ['middleware' => 'jwt.auth', 'uses' => 'Dashboard\DashboardController@index']);


// Authentication routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::group(['middleware' => 'config.registration'], function(){
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'Auth\AuthController@confirm'
    ]);
});


// Password routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Route::get('sendemail', function () {
//
//    Mail::send('email.verify', ['confirmation_code' => str_random(30)], function ($message) {
//
//        $message->to('kandel_agost89@hotmail.com')->subject('Learning Laravel test email');
//
//    });
//
//    return "Your email has been sent successfully";
//
//});