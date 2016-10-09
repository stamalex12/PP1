@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Slider</h1>
            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div> @endif
            <a href="slider/create" class="btn btn-primary btn-raised">Create</a>


            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Sort Order</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($slider as $sliders)

                        <tr>
                            <th>{{$sliders->title}}</th>
                            <th>{{$sliders->image}}</th>
                            <th>{{$sliders->description}}</th>
                            <th>{{$sliders->sortOrder}}</th>
                            <th>{{$sliders->status}}</th>
                            <th>{!!link_to_action('Admin\SliderController@edit', 'Edit', $sliders->id) !!}
                                @if($sliders->status == "Active")
                                    {!! link_to_action('Admin\SliderController@statusToggle','Disable', $sliders->id) !!}
                                @else
                                    {!! link_to_action('Admin\SliderController@statusToggle','Enable', $sliders->id) !!}
                                @endif
                                | {!! link_to_action('Admin\SliderController@destroy','Remove', $sliders->id) !!}</th>
                        </tr>

                @endforeach


                </tbody>
            </table>
            <div class="divider"></div>
            <a href="{{ action("Admin\PageController@dashboard") }}" class="btn btn-default btn-raised">Back</a>
        </div>
    </div>
@endsection

