<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use App\Http\Requests\CreateContentRequest;
use App\Page;
use File;
use Intervention\Image\Facades\Image;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::all();
        $page = Page::all();
        return view('backend.content.index', compact('content', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = Page::all();
        return view('backend/content.create', compact('page', $page));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContentRequest $request)
    {
        $newContent = new Content(array(
        'pageId' => $request->get('page'),
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'sortOrder' => $request->get('sortOrder'),
        'status' => "Active",
        'type' => "information"
    ));
        $newContent->save();

        if( $request->hasFile('image') ) {

            $imageName = $newContent->id . '.' . $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(public_path() . '/images/content/', $imageName);

            $newContent->image = '/images/content/' . $imageName;
            Image::make(public_path() . $newContent->image)->save();
            $newContent->save();
        }

        return redirect('admin/content');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);

        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$content = Content::with(['page'])->find($id);
        $content = Content::find($id);
        $page = Page::all(['id', 'name']);
        return view('backend.content.edit', compact('content', 'page'));
        //return content;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, Requests\EditContentRequest $request)
    {
        $content = Content::findOrFail($id);


        if( $request->hasFile('image') )
        {
            File::Delete(public_path().$content->image);
            $imageName = $content->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/images/content/', $imageName);
            Image::make(public_path() . $content->image)->save();

            $content->update(array(
                'title' => $request->get('title'),
                'pageId' => $request->get('pageId'),
                'content' => $request->get('content'),
                'sortOrder' => $request->get('sortOrder'),
                'image' => '/images/content/' . $imageName
            ));
        }
        else{
            $content->update(array(
                'title' => $request->get('title'),
                'pageId' => $request->get('pageId'),
                'content' => $request->get('content'),
                'sortOrder' => $request->get('sortOrder')
            ));
        }

      /*  $input = $request->all();

        $content->fill($input)->save();*/

        //Session::flash('flash_message', 'Task successfully added!');

        $contentReturn = Content::all();

        //return $content;
        return redirect('admin/content')->with('Status', 'content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        if($content->image != null)
        {
            File::Delete(public_path().$content->image);
        }

        Content::destroy($id);

        return redirect('admin/content');
    }


    public function statusToggle($id){
        $content = Content::findOrFail($id);
        if($content->status == "Active"){
            $status = "Disabled";
        }else{
            $status = "Active";
        }
        $content->status = $status;
        $content->save();
        return redirect('admin/content');
    }

}
