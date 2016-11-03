<?php
/*
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
Route::get('/home', 'PageController@index');
Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');

try {

    if (App\System::all()->first()->rooms == 1) {
        Route::get('/room', 'PageController@room');
        Route::resource('roombooking', 'RoomBookingController');
        Route::get('/booking', function () {
            $data = [
                'page_title' => 'Room Booking',
            ];
            return view('roombooking/index', $data);
        });
        Route::get('/api', function () {
            $roombooking = DB::table('room_bookings')->select('id', 'userId', 'roomId', 'startDate as start', 'endDate as end', 'firstName', 'lastName')->get();
            foreach ($roombooking as $event) {
                $event->url = url('roombooking/' . $event->id);
                $room = \App\Room::where('id', $event->roomId)->first();
                $event->title = $room->name;
            }
            return $roombooking;
        });
    }


    if (App\System::all()->first()->projects == 1) {
        Route::get('/projects', 'PageController@projects');

        Route::get('/volunteerview={id}', 'PageController@volunteerView');
        Route::get('projects/{resource}/resource-donation', ['as' => 'resource-donation', function (App\ResourceNeed $resource) {
            return view('projects/resourceNeeds.amount', compact('resource'));
        }]);
        Route::post('/donate', 'ProjectController@donate');
    }

    if (App\System::all()->first()->testimonies == 1) {

        Route::get('/testimonies', 'PageController@testimonies');
    }

//User Profile

//For all Visitor access
    Route::group(array('middleware' => 'visitor'), function () {

        Route::patch('profile/{user_id}', 'UsersController@updateProfile');
        Route::get('profile', 'ProfileController@index');
        Route::patch('/profile', 'ProfileController@update');
        Route::get('/applications', 'ApplicationsController@index');
        Route::get('/applications/create={id}', 'ApplicationsController@create');

        Route::post('/applications', 'ApplicationsController@store');
        Route::get('/applications/cancel={id}', 'ApplicationsController@cancel');
        Route::get('/report', 'ReportController@generateReport');
        Route::get('/my-donations', 'ProfileController@donations');
        Route::get('/my-volunteering', 'ApplicationsController@index');


        Route::get('/my-donations/{id}/cancel', 'ProfileController@cancelDonation');
        Route::get('/my-donations/{id}/recover', 'ProfileController@recoverDonation');
        Route::get('/my-donations/{id}/delete', 'ProfileController@deleteDonation');
    });

    Route::group(array('middleware' => 'auditor'), function () {
        Route::get('/getMPDF', 'ReportController@getMPDF');
        Route::get('/getIEPDF', 'ReportController@getIEPDF');
        Route::get('/getICPDF', 'ReportController@getICPDF');
        Route::get('/getIEExport', 'ReportController@getIEExport');
        Route::get('/getICExport', 'ReportController@getICExport');
        Route::get('/getMExport', 'ReportController@getMExport');

        Route::get('/genChildReport', 'ReportController@genChildReport');
    });

//For all Administrator only access
    Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function () {
        // For all manager only access
        Route::group(array('middleware' => 'manager'), function () {

            Route::get('/users', ['as' => 'admin.user.index', 'uses' => 'UsersController@index']);
            Route::get('/roles', 'RolesController@index');
            Route::get('/roles/create', 'RolesController@create');
            Route::post('/roles/create', 'RolesController@store');
            Route::get('/users/{id?}/edit', 'UsersController@edit');
            Route::post('/users/{id?}/edit', 'UsersController@update');

            Route::get('/settings', 'SystemController@index');
            Route::post('/settings', 'SystemController@store');
        });

            Route::get('/dashboard', 'PageController@dashboard');

            if (App\System::all()->first()->resourceneeds == 1) {
                Route::get('/resources', 'ResourceController@index');
                Route::get('/resources/create', 'ResourceController@create');
                Route::post('/resources', 'ResourceController@store');
                Route::get('/resources/editId={id}', 'ResourceController@edit');
                Route::get('/resources/disableId={id}', 'ResourceController@statusToggle');
                Route::get('/resources/deleteId={id}', 'ResourceController@destroy');
                Route::patch('/resources/{id}', 'ResourceController@update');
            }

            if (App\System::all()->first()->volunteerprograms == 1) {
                Route::get('/volunteering', 'VolunteerController@index');
                Route::get('/volunteering/create', 'VolunteerController@create');
                Route::post('/volunteering', 'VolunteerController@store');
                Route::get('/volunteering/editId={id}', 'VolunteerController@edit');
                Route::get('/volunteering/disableId={id}', 'VolunteerController@statusToggle');
                Route::get('/volunteering/deleteId={id}', 'VolunteerController@destroy');
                Route::patch('/volunteering/{id}', 'VolunteerController@update');

            }

            Route::get('/content', 'ContentController@index');
            Route::get('/content/create', 'ContentController@create');
            Route::post('/content', 'ContentController@store');
            Route::get('/content/createImage', 'ContentImageController@create');
            Route::post('/contentImage', 'ContentImageController@store');
            Route::get('/contentEdit/{id}', 'ContentController@edit');
            Route::get('/contentEditImage/{id}', 'ContentImageController@edit');


            Route::get('/content/disableId={id}', 'ContentController@statusToggle');
            Route::get('/content/deleteId={id}', 'ContentController@destroy');
            Route::patch('/content/{id}', array(
                'as' => 'content.update',
                'uses' => 'ContentController@update'
            ));
            Route::patch('/contentImage/{id}', array(
                'as' => 'content.updateImage',
                'uses' => 'ContentImageController@update'
            ));

            if (App\System::all()->first()->testimonies == 1) {
                Route::get('/testimonies', 'TestimoniesController@index');
                Route::get('/testimonies/create', 'TestimoniesController@create');
                Route::post('/testimonies', 'TestimoniesController@store');
                Route::get('/testimonies/editId={id}', 'TestimoniesController@edit');
                Route::get('/testimonies/deleteId={id}', 'TestimoniesController@destroy');
                Route::patch('/testimonies/{id}', 'TestimoniesController@update');
                Route::get('/testimonies/disableId={id}', 'TestimoniesController@statusToggle');
            }

            if (App\System::all()->first()->rooms == 1) {
                Route::get('/room', 'RoomController@index');
                Route::get('/room/create', 'RoomController@create');
                Route::post('/room', 'RoomController@store');
                Route::get('/room/editId={id}', 'RoomController@edit');
                Route::get('/room/deleteId={id}', 'RoomController@destroy');
                Route::patch('/room/{id}', 'RoomController@update');
                Route::get('/room/disableId={id}', 'RoomController@statusToggle');
                Route::resource('roombooking', 'AdminBookingController');
            }

            Route::get('/websiteinfo', 'WebsiteInfoController@index');
            Route::post('/websiteinfo', 'WebsiteInfoController@store');

            if (App\System::all()->first()->email == 1) {
                Route::get('/email/create', 'EmailController@create');
                Route::post('/email', 'EmailController@store');
                Route::get('/email-group/create', 'EmailGroupController@create');
                Route::post('/email-group', 'EmailGroupController@store');
            }


            Route::get('/expenses', 'ExpensesController@index');
            Route::get('/expenses/create', 'ExpensesController@create');
            Route::get('/expenses/deleteId={id}', 'ExpensesController@destroy');
            Route::get('/expenses/editId={id}', 'ExpensesController@edit');
            Route::patch('/expenses/{id}', 'ExpensesController@update');
            Route::post('/expenses', 'ExpensesController@store');
            Route::get('/expenses/summary{name}', 'ExpensesController@summary');

            Route::get('/donations/create', 'DonationsController@create');
            Route::post('/donations', 'DonationsController@store');
            Route::get('/donations', 'DonationsController@index');
            Route::get('/donations/deleteId={id}', 'DonationsController@destroy');
            Route::get('/donations/approveId={id}', 'DonationsController@approve');
            Route::post('/donations/create', 'DonationsController@store');
	
            Route::get('/applications', 'AdminApplicationsController@index');
        Route::get('/applications/show={id}', 'AdminApplicationsController@show');
            Route::get('/applications/approveId={id}', 'AdminApplicationsController@approve');
            Route::get('/applications/downloadId={id}', 'AdminApplicationsController@download');


            if (App\System::all()->first()->slider == 1) {
                Route::get('/slider', 'SliderController@index');
                Route::get('/slider/create', 'SliderController@create');
                Route::post('/slider', 'SliderController@store');
                Route::get('/slider/editId={id}', 'SliderController@edit');
                Route::get('/slider/disableId={id}', 'SliderController@statusToggle');
                Route::get('/slider/deleteId={id}', 'SliderController@destroy');
                Route::patch('/slider/{id}', 'SliderController@update');
            }

            if (App\System::all()->first()->childdetails == 1) {
                Route::get('/children', 'ChildrenController@index');
                Route::get('/children/create', 'ChildrenController@create');
                Route::post('/children', 'ChildrenController@store');
                Route::get('/children/editId={id}', 'ChildrenController@edit');
                Route::get('/children/disableId={id}', 'ChildrenController@statusToggle');
                Route::get('/children/deleteId={id}', 'ChildrenController@destroy');
                Route::patch('/children/{id}', 'ChildrenController@update');
            }



    });

} catch (Exception $e) {

}


Route::get('/logout', 'Auth\AuthController@getLogout');


Route::auth();

//Route::get('/', 'PageController@index');
