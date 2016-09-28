<?php

namespace App\Http\Controllers;

use App\Content;
use App\ResourceNeed;
use App\VolunteeringNeed;
use App\Testimonies;
use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $content = Content::where('pageId', '=', 1)->where('status', "=", 'Active')->orderBy('sortOrder', 'ASC')->get();
    return view('home.index')->with('content', $content);
}


    public function about()
    {
        $content = Content::where('pageId', '=', 2)->where('status', "=", 'Active')->get();
        return view('home.about')->with('content', $content);
    }

    public function projects()
    {
        $resources = ResourceNeed::where('status', '=', 'Active')->get();
        $volunteerNeeds = VolunteeringNeed::where('status', '=', 'Active')->get();

        return view('projects.index', compact('resources', 'volunteerNeeds'));
    }

    public function dashboard()
    {
        return view('backend.index');
    }


    public function testimonies()
    {
        $testimonies = Testimonies::where('status', '=', 'Active')->get();

        return view('testimonies.index', compact('testimonies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    //
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
