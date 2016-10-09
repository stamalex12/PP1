<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Child;
use File;
use Intervention\Image\Facades\Image;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $children = Child::all();

        return view('backend.children.index')->with('children', $children);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.children.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateChildRequest $request)
    {
        $child = new Child(array(
            'name' => $request->get('name'),
            'aspirations' => $request->get('aspirations'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender')

        ));
        $child->save();

        if( $request->hasFile('image') ) {

            $imageName = $child->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/children/', $imageName);

            $child->image = '/images/children/' . $imageName;
            Image::make(public_path() . $child->image)->save();
            $child->save();
        }

        return redirect('admin/children')->with('Status', 'Child created successfully');
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
        $child = Child::find($id);

        return view('backend.children.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateChildRequest $request, $id)
    {
        $child = Child::findOrFail($id);


        if( $request->hasFile('image') )
        {
            File::Delete(public_path().$child->image);
            $imageName = $child->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/children/', $imageName);
            Image::make(public_path() . $child->image)->save();

            $child->update(array(
                'name' => $request->get('name'),
                'aspirations' => $request->get('aspirations'),
                'age' => $request->get('age'),
                'gender' => $request->get('gender'),
                'image' => '/images/children/' . $imageName
            ));
        }
        else{
            $child->update(array(
                'name' => $request->get('name'),
                'aspirations' => $request->get('aspirations'),
                'age' => $request->get('age'),
                'gender' => $request->get('gender')
            ));
        }


        return redirect('admin/children')->with('Status', 'Child updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $child = Child::find($id);

        if($child->image != null)
        {
            File::Delete(public_path().$child->image);
        }

        Child::destroy($id);

        return redirect('admin/children')->with('Status', 'Child deleted successfully');
    }
}
