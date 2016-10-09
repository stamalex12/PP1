<?php

namespace App\Http\Controllers;

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

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('user_id', '=', \Auth::user()->id)->get();
        return view('profile.applications.index', compact('applications'));
    }

    public function create($id)
    {
        $need = VolunteeringNeed::where('id', '=', $id)->get();
        return view('profile.applications.create', compact('need'));
    }

    public function store(Requests\CreateApplicationRequest $request)
    {
        $application = new Application(array(
            'need_id' => $request->get('need_id'),
            'user_id' => $request->get('user_id'),
            'taskName' => $request->get('taskName'),
            'skillsAndQuals' => $request->get('skillsAndQuals'),
            'startDate' => $request->get('startDate'),
            'endDate' => $request->get('endDate'),
            'files' => '',
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'status' => 'new'


        ));
        $application->save();

        return redirect('admin/expenses');
    }


}
