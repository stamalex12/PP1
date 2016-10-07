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

//For visitors

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/profile', function(){

//    TODO: put this in the controller

    Image::make(public_path() . '/images/profile-placeholder.jpg')->resize(191,240)->save();
    return view('profile.index');
});
Route::patch('/profile', 'ProfileController@update');
if(App\System::all()->first()->projects == 1)
{
    Route::get('/projects', 'PageController@projects');
    Route::get('projects/{resource}/resource-donation', ['as' => 'resource-donation', function (App\ResourceNeed $resource) {
        return view('projects/resourceNeeds.amount', compact('resource'));
    }]);
    Route::post('/donate', 'ProjectController@donate');
}
if(App\System::all()->first()->testimonies == 1)
{
    Route::get('/testimonies', 'PageController@testimonies');
}

//User Profile
Route::patch('profile/{user_id}', 'UsersController@updateProfile');

//For all Visitor access
Route::group(array('prefix' => 'visitor', 'namespace' => 'Visitor', 'middleware' => 'visitor'), function () {


});

//For all Administrator only access
Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('/roles', 'RolesController@index');
    Route::get('/roles/create', 'RolesController@create');
    Route::post('/roles/create', 'RolesController@store');
    Route::get('/users/{id?}/edit', 'UsersController@edit');
    Route::post('/users/{id?}/edit','UsersController@update');
    Route::get('/dashboard', 'PageController@dashboard');

    if(App\System::all()->first()->resourceneeds == 1)
    {
        Route::get('/resources', 'ResourceController@index');
        Route::get('/resources/create', 'ResourceController@create');
        Route::post('/resources', 'ResourceController@store');
        Route::get('/resources/editId={id}', 'ResourceController@edit');
        Route::get('/resources/disableId={id}', 'ResourceController@statusToggle');
        Route::get('/resources/deleteId={id}', 'ResourceController@destroy');
        Route::patch('/resources/{id}', 'ResourceController@update');
    }

    if(App\System::all()->first()->volunteerprograms == 1)
    {
        Route::get('/volunteering', 'VolunteerController@index');
        Route::get('/volunteering/create', 'VolunteerController@create');
        Route::post('/volunteering', 'VolunteerController@store');
        Route::get('/volunteering/editId={id}', 'VolunteerController@edit');
        Route::get('/volunteering/disableId={id}', 'VolunteerController@statusToggle');
        Route::get('/volunteering/deleteId={id}', 'VolunteerController@destroy');
        Route::patch('/volunteering/{id}', 'VolunteerController@update');
    }

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

    if(App\System::all()->first()->testimonies == 1)
    {
        Route::get('/testimonies', 'TestimoniesController@index');
        Route::get('/testimonies/create', 'TestimoniesController@create');
        Route::post('/testimonies', 'TestimoniesController@store');
        Route::get('/testimonies/editId={id}', 'TestimoniesController@edit');
        Route::get('/testimonies/deleteId={id}', 'TestimoniesController@destroy');
        Route::patch('/testimonies/{id}', 'TestimoniesController@update');
        Route::get('/testimonies/disableId={id}', 'TestimoniesController@statusToggle');
    }


    Route::get('/websiteinfo', 'WebsiteInfoController@index');
    Route::post('/websiteinfo', 'WebsiteInfoController@store');

    if(App\System::all()->first()->email == 1)
    {
        Route::get('/email/create', 'EmailController@create');
        Route::post('/email', 'EmailController@store');
        Route::get('/email-group/create', 'EmailGroupController@create');
        Route::post('/email-group', 'EmailGroupController@store');
    }



    Route::get('/settings', 'SystemController@index');
    Route::post('/settings', 'SystemController@store');
});




Route::get('/logout', 'Auth\AuthController@getLogout');


Route::auth();

//Route::get('/', 'PageController@index');
