@extends('layouts.master')

@section('content')
    <div class="text-inter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>View Testimonies</h1>
                    {!!link_to_action('Admin\TestimoniesController@create', 'Create') !!}
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Organisation</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Organisation</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($testimonies as $testimony)

                            <tr>
                                <th>{{$testimony->name}}</th>
                                <th>{{$testimony->description}}</th>
                                <th>{{$testimony->status}}</th>
                                <th>{{$testimony->organisation}}</th>
                                <th>{!!link_to_action('Admin\TestimoniesController@edit', 'Edit', $testimony->id) !!} |
                                    @if($testimony->status == "Active")
                                        {!! link_to_action('Admin\TestimoniesController@statusToggle','Disable', $testimony->id) !!}
                                    @else
                                        {!! link_to_action('Admin\TestimoniesController@statusToggle','Enable', $testimony->id) !!}
                                    @endif
                                    | {!! link_to_action('Admin\TestimoniesController@destroy','Remove', $testimony->id) !!}</th>
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

