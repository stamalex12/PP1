<?php

namespace App\Http\Controllers\Admin;

use App\Subscribers;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
use TijsVerkoyen\CssToInlineStyles\Exception;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles->lists('id')->toArray();
        return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
    }

    public function update($id, UserEditFormRequest $request)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if($password != "") {
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->saveRoles($request->get('role'));

        $role= Role::where('id', $request->get('role'))->first();

        if(!($role->name == 'Visitor'))
        {
            try{
                $subscriber = Subscribers::where('userId', $user->id)->first();
                if($subscriber == null)
                {
                    throw new Exception();
                }
                if($subscriber)
                {
                    Subscribers::destroy($subscriber->id);
                    $user->subscriber = 0;
                    $user->save();
                }
            }
            catch(Exception $e)
            {
                //only here because Subscriber doesnt exist
            }

        }
        else
        {
            $newSubscriber = new Subscribers(array(
                'userId' => $user->id,
                'email' => $user->email,
            ));
            $newSubscriber->save();
        }

        return redirect(action('Admin\UsersController@edit', $user->id))->with('status', 'The user has been updated!');
    }
}
