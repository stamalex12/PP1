<?php

namespace App\Http\Controllers\Admin;

use App\VolunteeringNeed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;



class VolunteerController extends Controller
{
    public function index()
    {
        $volunteerNeeds = VolunteeringNeed::all();
        return view('backend.volunteering.index', compact('volunteerNeeds'));
    }

    /**
     * Show the form for creating a new volunteerNeed.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.volunteering.create');
    }

    /**
     * Store a newly created volunteerNeed in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateVolunteerNeedsRequest $request)
    {
        $volunteerNeed = new VolunteeringNeed(array(
            'name'          =>  $request->get('name'),
            'description'   =>  $request->get('description'),
            'startDate'     =>  $request->get('startDate'),
            'endDate'       =>  $request->get('endDate'),
            'skillsNeeded' => $request->get('skillsNeeded')
        ));
        $volunteerNeed->save();

        //Check if image was given
        if( $request->hasFile('image') ) {
            //Create file name based on the post id
            $imageName = $volunteerNeed->id . '.' . $request->file('image')->getClientOriginalExtension();

            //Move file to directory
            $request->file('image')->move(public_path() . '/images/volunteering/', $imageName);

            //Update the path to the database
            $volunteerNeed->imagePath = '/images/volunteering/'. $imageName;

            //Resize image
            Image::make(public_path() . $volunteerNeed->imagePath)->resize(370,350)->save();
            $volunteerNeed->save();
        }

        return redirect('admin/volunteering');
    }

    /**
     * Display the specified volunteerNeed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $volunteerNeeds = VolunteeringNeed::where('status', '=', 'Active')->get();

        return view('projects.index', compact('volunteerNeeds'));
    }

    /**
     * Show the form for editing the specified volunteerNeed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $volunteerNeed = VolunteeringNeed::find($id);

        return view('backend/volunteering.edit', compact('volunteerNeed'));
    }

    /**
     * Update the specified volunteerNeed in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateVolunteerNeedsRequest $request, $id)
    {
        $volunteerNeed = VolunteeringNeed::findOrFail($id);

        $volunteerNeed->update($request->all());

        return redirect('admin/volunteering');
    }

    /**
     * Remove the specified volunteerNeed from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VolunteeringNeed::destroy($id);

        return redirect('admin/volunteering');

    }

    public function statusToggle($id){
        $volunteerNeed = VolunteeringNeed::findOrFail($id);
        if($volunteerNeed->status == "Active"){
            $status = "Disabled";
        }else{
            $status = "Active";
        }
        $volunteerNeed->status = $status;
        $volunteerNeed->save();
        return redirect('admin/volunteering');
    }
}
