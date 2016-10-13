<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\VolunteeringNeed;
use App\Http\Requests;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Role;
use App\User;

class AdminApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $applications = Application::all();
        return view('backend.applications.index', compact('applications'));
    }

    public function approve($id)
    {
        $application = application::findorfail($id);
        $application->status = 'Approved';
        $application->save();

        $applications = Application::all();
        return view('backend.applications.index', compact('applications'));

    }

    public function download($id){
        $application = application::findorfail($id);
        return response()->download(public_path().$application->files);
    }


}
