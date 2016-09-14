<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;
use App\Http\Requests\CreateContentRequest;
use App\Page;


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
        return view('backend/content.index')->with('content', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContentRequest $request)
    {
        if($request['page'] == 'home')
        {
            $page = '1';
        }
        else
        {
            $page = '2';
        }

        Content::insert(['pageId' => $page, 'title' => $request['title'], 'content' => $request['content'], 'sortOrder' => $request['sortOrder'], 'status' => "Active"]);
        $content = Content::all();

        return view('backend.content.index')->with('content', $content);
        //return redirect()->back();
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
        $page = Page::where('id', '=', $content->pageId)->get();
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

        /* $this->validate($request, [
             'title' => 'required',
             'description' => 'required'
         ]);*/

        $input = $request->all();

        $content->fill($input)->save();

        //Session::flash('flash_message', 'Task successfully added!');

        $contentReturn = Content::all();

        //return $content;
        return view('backend.content.index')->with('content', $contentReturn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
