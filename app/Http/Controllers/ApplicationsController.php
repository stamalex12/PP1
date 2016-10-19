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
        return view('profile.applications.applications', compact('applications'));
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
            'status' => 'new',
        ));

        $user = \Auth::user();
        if ($request->hasFile('wwc')) {
            if ($user->wwc != "" && file_exists(public_path() . $user->wwc)) {
                Image::make(public_path() . $user->wwc)->destroy();
            }
            $fileName = $user->id . '.' . $request->file('wwc')->getClientOriginalExtension();

            $request->file('wwc')->move(public_path() . '/images/profile/wwc/', $fileName);

            $user->wwc = '/images/profile/wwc/' . $fileName;
            $user->save();
        }

        $application->files = \Auth::user()->wwc;
        $application->save();

        $applications = Application::where('user_id', '=', \Auth::user()->id)->get();
        return view('profile.applications.applications', compact('applications'));
    }

    public function cancel($id)
    {
        $application = application::findorfail($id);
        $user = user::findorfail($application->user_id);
        $application->status = 'Cancelled';
        $application->save();

        $applications = Application::where('user_id', '=', \Auth::user()->id)->get();
        return redirect('applications');
       // return view('profile.applications.applications', compact('applications'));

    }


}
