<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\User;
use App\VolunteeringNeed;
use App\Http\Requests;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Role;
use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\CreateEmailGroupRequest;
use App\Email;
use App\WebsiteInfo;
use Illuminate\Support\Facades\Mail;

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
        $user = user::findorfail($application->user_id);
        $application->status = 'Approved';
        $application->save();

        $applications = Application::all();

        $message = 'Your appllication to assist us with '.$application->taskName.' between '.$application->startDate->format('dS F Y'). ' and '.$application->endDate->format('dS F Y'). ' has been approved. We will contact you with more informtion shortly.';

        $data = ['email' => $user->email,'subject' => 'Application Approved', 'bodyMessage' => $message];

        $info = WebsiteInfo::all()->first();
        Mail::send('emails.emailTemplate', $data, function ($message) use ($data, $info)
        {
            $message->from($info->email, $info->companyName);

            $message->to($data['email'])->subject($data['subject']);
        });

        return view('backend.applications.index', compact('applications'));

    }

    public function download($id){
        $application = application::findorfail($id);
        return response()->download(public_path().$application->files);
    }

    public function show($id)
    {
        $application = Application::find($id);
        $user = User::find($application->user_id);
        return view('backend.applications.show', compact('application', 'user'));
    }


}
