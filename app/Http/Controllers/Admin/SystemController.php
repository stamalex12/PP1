<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\System;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = System::all();
        return view('backend.settings.index')->with('settings', $settings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = System::all()->first();

        if(count($settings) == 0)
        {
            $newSetting = new System(array(
                'testimonies' => $request->get('testimonies'),
                'projects' => $request->get('projects'),
                'resourceneeds' => $request->get('resourceneeds'),
                'volunteerprograms' => $request->get('volunteerprograms'),
                'email' => $request->get('email'),
                'childdetails' => $request->get('childdetails'),
                'userprofiles' => $request->get('userprofiles'),
                'slider' => $request->get('slider'),
            ));
            $newSetting->save();
        }
        else
        {
            $input = $request->all();
            $settings->fill($input)->save();
        }
        return redirect('admin/dashboard')->with('status', 'Settings Successfully updated');
    }


}
