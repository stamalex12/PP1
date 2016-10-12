<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\CreateEmailGroupRequest;
use App\Email;
use App\WebsiteInfo;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Email::all();

        return view('backend.emails.index')->with('email', $email);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.emails.create');
    }

    public function createGroupMessage()
    {
        return view('backend.emails.creategroupmessage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmailRequest $request)
    {
        $email = Email::insert(['emailTo' => $request['emailTo'], 'subject' => $request['subject'], 'message' => $request['body'], 'type' => 'single']);

        $data = ['email' => $request['emailTo'],'subject' => $request['subject'], 'bodyMessage' => $request['body']];

        $info = WebsiteInfo::all()->first();
        Mail::send('emails.emailTemplate', $data, function ($message) use ($data, $info)
        {
            $message->from($info->email, $info->companyName);

            $message->to($data['email'])->subject($data['subject']);
        });
        return redirect('/admin/email/create')->with('status', 'Email was sent successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   /* public function storeGroupMessage(CreateEmailGroupRequest $request)
    {
        $email = Email::insert(['emailTo' => 'subscribers', 'subject' => $request['subject'], 'message' => $request['body'], 'type' => 'group']);

        $data = ['subject' => $request['subject'], 'bodyMessage' => $request['body']];

        $users = User::all();

        foreach($users as $user)
        {
            Mail::send('emails.emailTemplate', $data, function ($message) use ($data, $user)
            {
                $message->from('kikssrilanka@gmail.com', 'KIKS');

                $message->to($user->email)->subject($data['subject']);
            });
        }

        return redirect('/admin/email/create-group')->with('status', 'Group Email was sent successfully');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
