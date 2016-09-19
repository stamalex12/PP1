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
Route::get('/projects', 'PageController@projects');


//For all Administrator only access
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('/roles', 'RolesController@index');
    Route::get('/roles/create', 'RolesController@create');
    Route::post('/roles/create', 'RolesController@store');
    Route::get('/users/{id?}/edit', 'UsersController@edit');
    Route::post('/users/{id?}/edit','UsersController@update');
    Route::get('/dashboard', 'PageController@dashboard');
    Route::get('/resources', 'ResourceController@index');
    Route::get('/resources/create', 'ResourceController@create');
    Route::post('/resources', 'ResourceController@store');
    Route::get('/resources/editId={id}', 'ResourceController@edit');
    Route::get('/resources/disableId={id}', 'ResourceController@statusToggle');
    Route::get('/resources/deleteId={id}', 'ResourceController@destroy');
    Route::patch('/resources/{id}', 'ResourceController@update');

    Route::get('/volunteering', 'VolunteerController@index');
    Route::get('/volunteering/create', 'VolunteerController@create');
    Route::post('/volunteering', 'VolunteerController@store');
    Route::get('/volunteering/editId={id}', 'VolunteerController@edit');
    Route::get('/volunteering/disableId={id}', 'VolunteerController@statusToggle');
    Route::get('/volunteering/deleteId={id}', 'VolunteerController@destroy');
    Route::patch('/volunteering/{id}', 'VolunteerController@update');

    Route::get('/content', 'ContentController@index' );
    Route::get('/content/create', 'ContentController@create');
    Route::get('/contentEdit/{id}', 'ContentController@edit');
    Route::post('/content', 'ContentController@store');
    Route::get('/content/disableId={id}', 'ContentController@statusToggle');
    Route::get('/content/deleteId={id}', 'ContentController@destroy');
    Route::patch('/content/{id}', array(
        'as' => 'content.update',
        'uses' => 'ContentController@update'
    ));

});




Route::get('/logout', 'Auth\AuthController@getLogout');


Route::auth();

//Route::get('/', 'PageController@index');
