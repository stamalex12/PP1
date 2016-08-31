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


Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/content', 'ContentController@index');
Route::get('/content/create', 'ContentController@create');
Route::get('/contentEdit/{id}', 'ContentController@edit');

Route::post('/content', 'ContentController@store');
Route::patch('/content', array(
    'as' => 'content.update',
    'uses' => 'ContentController@update'
));