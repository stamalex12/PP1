<?php

namespace App\Http\Controllers\Admin;

use App\Donation;
use App\Child;
use App\ResourceNeed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = donation::all();
        return view('backend.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = resourceNeed::all('name');
        return view('backend.donations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateDonnationRequest $request)
    {

        $donnation = new Donation(array(
            'amount' => $request->get('amount'),
            'user_id' => $request->get('user'),
           // 'resourceNeed' => $request->get('resourceNeed'),
        ));
        $donnation->status = 'Complete';
        $donnation->donatable_id = 1;

        if (Child::where('name', '=', $request->get('resourceOrChild'))->exists()){
            $donnation->donatable_id = Child::where('name', '=', $request->get('resourceOrChild'))->first()->id;
            $donnation->donatable_type = 'App\Child';
        } else {
            $donnation->donatable_id = ResourceNeed::where('name', '=', $request->get('resourceOrChild'))->first()->id;
            $donnation->donatable_type = 'App\ResourceNeed';
        }

        $donnation->save();

        return redirect('admin/donations');
    }

    public function destroy($id)
    {
        donation::destroy($id);

        return redirect('admin/donations');

    }

    public function approve($id)
    {
        $donnation = donation::findorfail($id);
        $donnation->status = 'Complete';
        $donnation->save();

        return redirect('admin/donations');

    }

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
