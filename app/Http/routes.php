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
Route::get('/projects', 'PageController@projects');
Route::get('/testimonies', 'PageController@testimonies');
Route::get('/room', 'PageController@room');

Route::get('/booking', function () {
    $data = [
        'page_title' => 'Room Booking',
    ];
    return view('roombooking/index', $data);
});

Route::resource('roombooking', 'RoomBookingController');

Route::get('/api', function () {
    $roombooking = DB::table('room_bookings')->select('id', 'userId', 'roomId', 'startDate as start', 'endDate as end','firstName','lastName')->get();
    foreach($roombooking as $event)
    {
        $event->url = url('roombooking/' . $event->id);
    }
    return $roombooking;
});


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

    Route::get('/testimonies', 'TestimoniesController@index');
    Route::get('/testimonies/create', 'TestimoniesController@create');
    Route::post('/testimonies', 'TestimoniesController@store');
    Route::get('/testimonies/editId={id}', 'TestimoniesController@edit');
    Route::get('/testimonies/deleteId={id}', 'TestimoniesController@destroy');
    Route::patch('/testimonies/{id}', 'TestimoniesController@update');
    Route::get('/testimonies/disableId={id}', 'TestimoniesController@statusToggle');


    Route::get('/room', 'RoomController@index');
    Route::get('/room/create', 'RoomController@create');
    Route::post('/room', 'RoomController@store');
    Route::get('/room/editId={id}', 'RoomController@edit');
    Route::get('/room/deleteId={id}', 'RoomController@destroy');
    Route::patch('/room/{id}', 'RoomController@update');
    Route::get('/room/disableId={id}', 'RoomController@statusToggle');


    Route::get('/websiteinfo', 'WebsiteInfoController@index');
    Route::post('/websiteinfo', 'WebsiteInfoController@store');

    Route::get('/email/create', 'EmailController@create');
    Route::post('/email', 'EmailController@store');
    Route::get('/email-group/create', 'EmailGroupController@create');
    Route::post('/email-group', 'EmailGroupController@store');

    Route::resource('roombooking', 'AdminBookingController');

});




Route::get('/logout', 'Auth\AuthController@getLogout');


Route::auth();

//Route::get('/', 'PageController@index');
