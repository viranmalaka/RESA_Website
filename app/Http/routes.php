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

Route::get('/contact' , 'ContactMessageController@create');
Route::post('/contact', 'ContactMessageController@store');
//Route::get('/seed' , 'EnvController@seedKeys');


Route::group(['middleware' => ['web']], function(){
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    // Registration Routes
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');


    Route::resource('answers', 'AnswerController');
    Route::resource('tags', 'TagController');
    Route::resource('kuppi', 'KuppiController');
    Route::resource('seminar', 'SeminarController');
});
Route::resource('questions', 'QuestionController');

