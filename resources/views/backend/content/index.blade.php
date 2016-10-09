@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Content</h1>
            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif
            <a href="content/create" class="btn btn-primary btn-raised">Create</a>
            <a href="content/createImage" class="btn btn-primary btn-raised">Create Image</a>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>SortOrder</th>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>SortOrder</th>
                    <th>Page</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($content as $contents)
                    @if($contents->type == 'image')
                        <tr>
                            <th>Image: {{$contents->title}}</th>
                            <th>{{$contents->image}}</th>
                            <th>{{$contents->sortOrder}}</th>

                            <th>{{\App\Page::find($contents->pageId)->name}}</th>
                            <th>{{$contents->status}}</th>
                            <th>{!!link_to_action('Admin\ContentImageController@edit', 'Edit', $contents->id) !!}
                                @if($contents->status == "Active")
                                    {!! link_to_action('Admin\ContentController@statusToggle','Disable', $contents->id) !!}
                                @else
                                    {!! link_to_action('Admin\ContentController@statusToggle','Enable', $contents->id) !!}
                                @endif
                                | {!! link_to_action('Admin\ContentController@destroy','Remove', $contents->id) !!}</th>
                        </tr>
                    @else
                        <tr>
                            <th>{{$contents->title}}</th>
                            <th>{{$contents->content}}</th>
                            <th>{{$contents->sortOrder}}</th>
                            <th>{{\App\Page::find($contents->pageId)->name}}</th>
                            <th>{{$contents->status}}</th>
                            <th>{!!link_to_action('Admin\ContentController@edit', 'Edit', $contents->id) !!}
                                @if($contents->status == "Active")
                                    {!! link_to_action('Admin\ContentController@statusToggle','Disable', $contents->id) !!}
                                @else
                                    {!! link_to_action('Admin\ContentController@statusToggle','Enable', $contents->id) !!}
                                @endif
                                | {!! link_to_action('Admin\ContentController@destroy','Remove', $contents->id) !!}</th>
                        </tr>
                    @endif
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="{{ action("Admin\PageController@dashboard") }}" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

