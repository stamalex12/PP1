<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonies;
use App\Http\Requests;
use Intervention\Image\Facades\Image;

class TestimoniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies= Testimonies::all();
        return view('backend.testimonies.index',compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateTestimoniesRequest $request)
    {
        $testimonie= new Testimonies(array(
            'name'=>$request->get('name'),
            'organisation'=>$request->get('organisation'),
            'description'=>$request->get('description')

        ));
        $testimonie->save();

        if( $request->hasFile('image') ) {

            $imageName = $testimonie->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/testimonies/', $imageName);

            $testimonie->imagePath = '/images/testimonies/' . $imageName;
            Image::make(public_path() . $testimonie->imagePath)->resize(370, 350)->save();
            $testimonie->save();
        }

        return redirect('admin/testimonies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $testimonies= Testimonies::where('status', '=', 'Active')->get();
        view('testimonies.index',compact('testimonies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonie= Testimonies::find($id);
        return view('backend/testimonies.edit',compact('testimonie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CreateTestimoniesRequest $request, $id)
    {
        $testimonie= Testimonies::findOrFail($id);
        $testimonie->update(array(
            'name'          =>  $request->get('name'),
            'organisation'   =>  $request->get('organisation'),
            'description'  =>  $request->get('description')
        ));

        if( $request->hasFile('image') ) {
            if (file_exists(public_path() . $testimonie->imagePath)) {
                Image::make(public_path() . $testimonie->imagePath)->destroy();
            }
            $imageName = $testimonie->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/testimonies/', $imageName);

            $testimonie->imagePath = '/images/testimonies/'. $imageName;
            Image::make(public_path() . $testimonie->imagePath)->resize(370,350)->save();
            $testimonie->save();
        }

        return redirect('admin/testimonies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonies::destroy($id);
        return redirect('admin/testimonies');
    }



    public function statusToggle($id){
        $testimonie = Testimonies::findOrFail($id);
        if($testimonie->status == "Active"){
            $status = "Disabled";
        }else{
            $status = "Active";
        }
        $testimonie->status = $status;
        $testimonie->save();
        return redirect('admin/testimonies');
    }
}
