@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Content</h1>
            <a href="content/create" class="btn btn-primary btn-raised">Create</a>

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>SortOrder</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>SortOrder</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($content as $contents)

                    <tr>
                        <th>{{$contents->title}}</th>
                        <th>{{$contents->content}}</th>
                        <th>{{$contents->sortOrder}}</th>
                        <th>{{$contents->status}}</th>
                        <th>{!!link_to_action('Admin\ContentController@edit', 'Edit', $contents->id) !!}
                            @if($contents->status == "Active")
                                {!! link_to_action('Admin\ContentController@statusToggle','Disable', $contents->id) !!}
                            @else
                                {!! link_to_action('Admin\ContentController@statusToggle','Enable', $contents->id) !!}
                            @endif
                            | {!! link_to_action('Admin\ContentController@destroy','Remove', $contents->id) !!}</th>
                    </tr>
                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="dashboard" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

