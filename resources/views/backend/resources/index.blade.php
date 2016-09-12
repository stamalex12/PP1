@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Resource Needs</h1>
                    {!!link_to_action('Admin\ResourceController@create', 'Create') !!}
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Amount Needed</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Amount Needed</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($resources as $resource)

                            <tr>
                                <th>{{$resource->name}}</th>
                                <th>{{$resource->description}}</th>
                                <th>{{$resource->status}}</th>
                                <th>{{$resource->amountNeeded}}</th>
                                <th>{!!link_to_action('Admin\ResourceController@edit', 'Edit', $resource->id) !!} |
                                @if($resource->status == "Active")
                                    {!! link_to_action('Admin\ResourceController@statusToggle','Disable', $resource->id) !!}
                                @else
                                    {!! link_to_action('Admin\ResourceController@statusToggle','Enable', $resource->id) !!}
                                @endif
                                    | {!! link_to_action('Admin\ResourceController@destroy','Remove', $resource->id) !!}</th>
                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

