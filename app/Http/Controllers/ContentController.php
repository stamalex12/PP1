<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\CreateContentRequest;
use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;



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
        return view('content.index')->with('content', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContentRequest $request)
    {
        $content = new Content();
        $content->title = $request['title'];
        $content->content = $request['content'];
        $content->sortOrder = $request['sortOrder'];

        $content = $content->save();

        //Content::find($content->id)->page()->save($page);

       /* if($request['page'] == 'home')
        {
            $page = '1';
        }
        else
        {
            $page = '2';
        }

        Content::insert(['pageId' => $page, 'title' => $request['title'], 'content' => $request['content'], 'sortOrder' => $request['sortOrder']]);
        $content = Content::all();*/
        return view('content.index')->with('content', $content);
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
        return view('content.edit', compact('content', 'page'));

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
        $content = Content::find($id);
        $page = Page::find($request->get('pageId'));
        $input = array($request->get('title'), $request->get('content'), $request->get('sortOrder'));
        $content->fill($input);
        $page->content()->save($content);

        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
