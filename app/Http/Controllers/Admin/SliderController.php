<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use Intervention\Image\Facades\Image;
use Intervention\Image\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();

        return view('backend.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateSliderRequest $request)
    {
        $slider = new Slider(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => "Active",
            'sortOrder' => $request->get('sortOrder')
        ));
        $slider->save();

        if ($request->hasFile('image')) {

            $imageName = $slider->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/slider/', $imageName);

            $slider->image = 'images/slider/' . $imageName;
            Image::make(public_path() . "/" . $slider->image)->save();
            $slider->save();
        }

        return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);

        return view('backend/slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EditSliderRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);


        $slider->update(array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'sortOrder' => $request->get('sortOrder')
        ));

        if ($request->hasFile('image')) {
            if (file_exists(public_path() . $slider->image)) {
                Image::make(public_path() . $slider->image)->destroy();
            }
            $imageName = $slider->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/slider/', $imageName);

            $slider->image = 'images/slider/' . $imageName;
            Image::make(public_path() . "/" . $slider->image)->save();
            $slider->save();
        }


        return redirect('admin/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect('admin/slider');

    }

    public function statusToggle($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->status == "Active") {
            $status = "Disabled";
        } else {
            $status = "Active";
        }
        $slider->status = $status;
        $slider->save();
        return redirect('admin/slider');
    }
}
