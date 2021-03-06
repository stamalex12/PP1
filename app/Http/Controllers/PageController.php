<?php

namespace App\Http\Controllers;

use App\Content;
use App\Page;
use App\ResourceNeed;
use App\Room;
use App\RoomBooking;
use App\VolunteeringNeed;
use App\Testimonies;
use App\Child;
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

    public function profile()
    {
        return view('profile.index');
    }

    public function projects()
    {
        $resources = ResourceNeed::where('status', '=', 'Active')->get();
        $volunteerNeeds = VolunteeringNeed::where('status', '=', 'Active')->get();
        $children = Child::all();


        return view('projects.index', compact('resources', 'volunteerNeeds', 'children'));
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


    public function room()
    {
        $room = Room::where('status', '=', 'Active')->get();

        return view('room.index', compact('room'));
    }



    public function volunteerView($id)
    {
        $volunteer = VolunteeringNeed::where('id', '=', $id)->first();

        return view('projects.volunteer-view')->with('volunteer', $volunteer);
    }

}
