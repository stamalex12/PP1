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
Route::get('dashboard/content', 'ContentController@index');
Route::get('dashboard/content/create', 'ContentController@create');
Route::get('/contentEdit/{id}', 'ContentController@edit');
Route::get('/projects', 'PageController@projects');

Route::get('dashboard', 'PageController@dashboard');
Route::get('dashboard/resources', 'ResourceController@index');
Route::get('dashboard/resources/create', 'ResourceController@create');
Route::post('dashboard/resources', 'ResourceController@store');
Route::get('dashboard/resources/editId={id}', 'ResourceController@edit');
Route::get('dashboard/resources/disableId={id}', 'ResourceController@statusToggle');
Route::get('dashboard/resources/deleteId={id}', 'ResourceController@destroy');
Route::patch('dashboard/resources/{id}', 'ResourceController@update');

Route::post('/content', 'ContentController@store');
Route::patch('/content', array(
    'as' => 'content.update',
    'uses' => 'ContentController@update'
));

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('/roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');
    Route::get('users/{id?}/edit', 'UsersController@edit');
    Route::post('users/{id?}/edit','UsersController@update');
});




Route::get('/logout', 'Auth\AuthController@getLogout');


Route::auth();

//Route::get('/', 'PageController@index');
