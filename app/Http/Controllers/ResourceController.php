<?php

namespace App\Http\Controllers;

use App\ResourceNeed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Facades\Image;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = ResourceNeed::all();
        return view('dashboard.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateResourceRequest $request)
    {
        $resource = new ResourceNeed(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amountNeeded' => $request->get('amountNeeded')
        ));
        $resource->save();
        if( $request->hasFile('image') ) {

            $imageName = $resource->id . '.' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(base_path() . '/public/images/resources/', $imageName);

            $resource->imagePath = '/public/images/resources/'. $imageName;
        }
        $resource->save();

        return redirect('dashboard/resources');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $resources = ResourceNeed::where('status', '=', 'Active')->get();

        return view('projects.index', compact('resources'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resource = ResourceNeed::find($id);

        return view('dashboard/resources.edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateResourceRequest $request, $id)
    {
        $resource = ResourceNeed::findOrFail($id);

        $resource->update($request->all());

        return redirect('dashboard/resources');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ResourceNeed::destroy($id);

        return redirect('dashboard/resources');

    }

    public function statusToggle($id){
        $resource = ResourceNeed::findOrFail($id);
        if($resource->status == "Active"){
            $status = "Disabled";
        }else{
            $status = "Active";
        }
        $resource->status = $status;
        $resource->save();
        return redirect('dashboard/resources');
    }
}
